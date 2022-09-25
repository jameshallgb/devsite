<?php
/**
 * The template for rendering any single pages with no template.
 * @author  Adtrak
 * @package AdtrakChild
 * @version 1.0.0
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
				<div class="copy">
					<h1><?php the_field('h1'); ?></h1>
					<?php the_content(); ?>

					<p class="get-in-touch">Get in touch for a <strong>FREE</strong> no obligation consultation on our accountancy services, call our friendly team on <?php do_action('ld_default'); ?> or contact us online</p>

				</div>


			</div>

			<div class="site-content__column site-content__column--medium">

				<?php include locate_template('parts/featured-post.php'); ?>

				<?php include locate_template('parts/testimonial.php'); ?>

        

			</div>

		<?php endwhile; endif; ?>

	</main>

<?php get_footer(); ?>
