<?php
/**
 * The template for rendering any single pages with no template.
 * @author  Adtrak
 * @package AdtrakChild
 * @version 1.0.0
 * Template Name: Resource Centre
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

					<iframe id="iFrame1" frameborder="0" scrolling="no" src="https://orchard.je-hosting.co.uk/resource-centre/resource-centre.php" width="100%" height="1300"></iframe>


					

					<p class="get-in-touch">Get in touch for a <strong>FREE</strong> no obligation consultation on our accountancy services by calling our friendly team on <?php do_action('ld_default'); ?> or contact us online</p>

				</div>

			</div>

		<?php endwhile; endif; ?>
		
	</main>

<?php get_footer(); ?>
