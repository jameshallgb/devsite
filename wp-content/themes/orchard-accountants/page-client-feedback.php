<?php
/**
 * The template for rendering any single pages with no template.
 * @author  Adtrak
 * @package AdtrakChild
 * @version 1.0.0
 * Template Name: Client Feedback
 */
?>

<?php
    get_header();
    include locate_template('parts/hero.php');
    include locate_template('parts/why.php');
?>

	<main class="site-content">
		
		<?php if (have_posts()): while (have_posts()): the_post(); ?>

			<div class="site-content__column site-content__column--large">
				<div class="copy copy__testimonials">

					<div class="testimonial testimonial--intro">
						<?php the_content(); ?>
					</div>
						
					<?php 
					// WP_Query arguments
					$args = array(
						'post_type'			=> array( 'testimonials' ),
						'orderby'       	=> 'rand',
						'order'        		=> 'DESC',
						'posts_per_page'        =>  -1,
					);

					// The Query
					$query = new WP_Query( $args );

					// The Loop
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
							// do something ?>

							<div class="testimonial testimonial--page">
								
								<span class="icon-left-quote testimonial__left-quote testimonial__left-quote--show"></span>

								<div class="testimonial__quote"><?php the_content(); ?></div>
								<p class="testimonial__quote--client"><?php the_title(); ?></p>

								<span class="icon-right-quote testimonial__right-quote testimonial__right-quote--show"></span>

							</div>

					<?php	}

					} else {
						
						echo "Sorry theres no testimonials";

					}

					// Restore original Post Data
					wp_reset_postdata();

					?>

						

						





					<p class="get-in-touch">Get in touch for a <strong>FREE</strong> no obligation consultation on our accountancy services, call our friendly team on <?php do_action('ld_default'); ?> or contact us online</p>


				</div>


			</div>

		<?php endwhile; endif; ?>


	<?php include locate_template('parts/buckets-footer.php'); ?>
	
	</main>

<?php 
	get_footer();
?>
