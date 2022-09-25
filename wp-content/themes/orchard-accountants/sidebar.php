<div class="copy copy__sidebar">

	<div class="sidebar__search">
		<?php get_search_form(); ?>
	</div>

	<h3>Recent Posts</h3>

	<ul class="sidebar__list">
	
	

	<?php 
	// WP_Query arguments
	$args = array(
		'post_type'			=> array( 'post' ),
		'orderby'       	=> 'rand',
		'order'        		=> 'DESC',
		'posts_per_page'        =>  10,
	);

	// The Query
	$query = new WP_Query( $args );

	// The Loop
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			// do something ?>

			<li class="sidebar__list-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

	<?php	}

	} else {
		
		echo "Sorry theres no testimonials";

	}

	// Restore original Post Data
	wp_reset_postdata();

	?>
</ul>



</div>
