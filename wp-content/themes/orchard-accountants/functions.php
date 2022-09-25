<?php

/* ========================================================================================================================

Enqueue and register scripts the right way.

======================================================================================================================== */

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('production', get_theme_file_uri() . '/js/production-dist.js', ['jquery'], '', true);
});



/* ========================================================================================================================

Add defer attribute to scripts - ADD TO THIS AS REQUIRED

======================================================================================================================== */

function add_defer_attribute($tag, $handle) {
	// add script handles to the array below
	$scripts_to_defer = array('production','adtrak-cookie','location-dynamics-front');

	foreach($scripts_to_defer as $defer_script) {
	   if ($defer_script === $handle) {
		  return str_replace(' src', ' defer src', $tag);
	   }
	}
	return $tag;
 }
 add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);



/* ========================================================================================================================

Deactivate some plugins from some pages

======================================================================================================================== */

function remove_unwanted_plugins() {
	/*
	// Turn off map other than coverage area
    if (!is_page('coverage-area')) {
        remove_action('wp_head', 'bf_head');
        remove_action('wp_footer', 'bf_footer', 30);
	}
	*/

	// Remove datepicker script - ENABLE if your form has a datepicker field!
	wp_dequeue_script('jquery-ui-datepicker');
}

add_action('wp_head', 'remove_unwanted_plugins', 1);




/* ========================================================================================================================

Deregister Certain Stylesheets

======================================================================================================================== */

function my_deregister_styles() {
	wp_deregister_style('adtrak-cookie'); // Disable separate stylesheet for cookie notice (styles can be found in footer.scss)
	wp_deregister_style('wp-block-library'); // Gutenberg related stylesheet
}
add_action('wp_print_styles', 'my_deregister_styles', 100);



/* ========================================================================================================================

Disable Gutenberg

======================================================================================================================== */

add_filter('use_block_editor_for_post', '__return_false');



/* ========================================================================================================================

Remove jQuery Migrate form front-end

======================================================================================================================== */

add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );

function dequeue_jquery_migrate( &$scripts){
	if(!is_admin()){
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	}
}



/* ========================================================================================================================

Custom

======================================================================================================================== */

add_action('after_setup_theme', function () {

// Custom image sizes

    add_image_size( 'img-2000-1000', 2000, 1000, true );
	add_image_size( 'img-1200-600', 1200, 600, true );
	add_image_size( 'img-600-600', 600, 600, true );
	add_image_size( 'img-350-350', 350, 350, true );

	// More navs

	register_nav_menus([
		'secondary' => __('Secondary Menu', 'adtrak')
	]);

});



/* ========================================================================================================================

Allow excerpts on pages

======================================================================================================================== */

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

/* ========================================================================================================================

Custom Excerpt Length
 
======================================================================================================================== */ 

function custom_length_excerpt($word_count_limit) {
    $content = wp_strip_all_tags(get_the_content() , true );
    echo wp_trim_words($content, $word_count_limit);
}

/* ========================================================================================================================

Address - Stacked

======================================================================================================================== */

function address_stacked() {
	// loop through the rows of data
	while ( have_rows('site_address', 'options') ) : the_row();
		// display a sub field value
		the_sub_field('address_line', 'options');
		echo "<br/>";

	endwhile;
	the_field('site_postcode', 'option');
}

add_shortcode( 'address_stacked', 'address_stacked' );

/* ========================================================================================================================

Address - Inline

======================================================================================================================== */

function address_inline() {
	// loop through the rows of data
	while ( have_rows('site_address', 'options') ) : the_row();
		// display a sub field value
		the_sub_field('address_line', 'options');
		echo ",&nbsp;";
	endwhile;
	the_field('site_postcode', 'option');
}

add_shortcode('address_inline', 'address_inline');

/* ========================================================================================================================
 
Extra Option Pages
 
======================================================================================================================== */

if( function_exists('acf_add_options_page') ) {
 
	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Buckets',
		'menu_title' 	=> 'Buckets',
		'menu_slug' 	=> 'buckets-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false,
		'icon_url' => 'dashicons-grid-view',
		'position' => 20
	));		
 
}

/* ========================================================================================================================
    
Load Global Buckets
    
======================================================================================================================== */

function acf_load_choose_buckets_field_choices( $field ) {
	$field['choices'] = array();
	if( have_rows('buckets', 'option') ) {
		while( have_rows('buckets', 'option') ) {
			the_row();

			$label = get_sub_field('label');
			$field['choices'][ $label ] = $label;
		}
	}
	return $field;
}
add_filter('acf/load_field/name=choose_buckets', 'acf_load_choose_buckets_field_choices');



/* ========================================================================================================================

CPT - Testimonials

======================================================================================================================== */

function testimonials_post_type() {

	$labels = array(
		'name' 					=> _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
		'singular_name' 		=> _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
		'menu_name' 			=> __( 'Testimonials', 'text_domain' ),
		'name_admin_bar' 		=> __( 'Post Testimonial', 'text_domain' ),
		'parent_item_colon' 	=> __( 'Parent Testimonial:', 'text_domain' ),
		'all_items' 			=> __( 'All Testimonials', 'text_domain' ),
		'add_new_item' 			=> __( 'Add New Testimonial', 'text_domain' ),
		'add_new' 				=> __( 'New Testimonial', 'text_domain' ),
		'new_item' 				=> __( 'New Testimonial', 'text_domain' ),
		'edit_item' 			=> __( 'Edit Testimonial', 'text_domain' ),
		'update_item' 			=> __( 'Update Testimonial', 'text_domain' ),
		'view_item' 			=> __( 'View Testimonial', 'text_domain' ),
		'search_items' 			=> __( 'Search locations', 'text_domain' ),
		'not_found' 			=> __( 'No locations found', 'text_domain' ),
		'not_found_in_trash' 	=> __( 'No locations found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug' 					=> 'testimonials',
		'with_front' 			=> false,
		'pages' 				=> true,
		'feeds' 				=> true,
	);
	$args = array(
		'label' 				=> __( 'Testimonial', 'text_domain' ),
		'description' 			=> __( 'Testimonial pages', 'text_domain' ),
		'labels' 				=> $labels,
		'supports' 				=> array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', ),
		'hierarchical'			=> true,
		'public' 				=> true,
		'show_ui' 				=> true,
		'show_in_menu' 			=> true,
		'menu_position' 		=> 5,
		'menu_icon' 			=> 'dashicons-editor-quote',
		'show_in_admin_bar' 	=> true,
		'show_in_nav_menus' 	=> true,
		'can_export' 			=> true,
		'has_archive' 			=> false,
		'exclude_from_search' 	=> false,
		'publicly_queryable' 	=> false,
		'rewrite' 				=> $rewrite,
		'capability_type' 		=> 'page',
	);
	register_post_type( 'testimonials', $args );

}
add_action( 'init', 'testimonials_post_type', 0 );




/* ========================================================================================================================

shortcode in acf

======================================================================================================================== */
function my_acf_format_value( $value, $post_id, $field ) {
	
	// run do_shortcode on all textarea values
	$value = do_shortcode($value);
	
	
	// return
	return $value;
}

add_filter('acf/format_value/type=textarea', 'my_acf_format_value', 10, 3);