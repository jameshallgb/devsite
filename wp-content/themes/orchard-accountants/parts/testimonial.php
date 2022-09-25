<div class="testimonial">
	<span class="icon-left-quote testimonial__left-quote"></span>

	<?php 
	// WP_Query arguments
	$args = array(
		'post_type'			=> array( 'testimonials' ),
		'orderby'       	=> 'rand',
		'order'        		=> 'DESC',
		'posts_per_page'        =>  1,
	);

	// The Query
	$query = new WP_Query( $args );

	// The Loop
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			// do something ?>

			<div class="testimonial__quote"><?php the_content(); ?></div>
			<p class="testimonial__quote--client"><?php the_title(); ?></p>

	<?php	}

	} else {
		
		echo "Sorry theres no testimonials";

	}

	// Restore original Post Data
	wp_reset_postdata();

	?>

	<a href="<?php echo site_url(); ?>/client-feedback/" class="btn btn--gris">See more client feedback</a>

	<span class="icon-right-quote testimonial__right-quote"></span>

</div>