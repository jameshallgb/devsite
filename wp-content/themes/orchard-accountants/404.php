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
?>

	<main class="site-content">
		
		<div class="site-content__column site-content__column--large">
			<div class="copy">
				
				<h1>Sorry!</h1>

				<p>This page can't be found.</p>

				<p><a href="<?php echo site_url('/'); ?>">Please go home</a> or try one of the pages below instead.</p>



				<p class="footer__title">Services</p>

				<?php wp_nav_menu([
					'menu' => 'Footer Menu 1',
					'menu_class' => "",
					'container' => ''
				]); ?>

				<p class="footer__title">More information</p>

				<?php wp_nav_menu([
					'menu' => 'Footer Menu 2',
					'menu_class' => "",
					'container' => ''
				]); ?>

				<p class="get-in-touch">Get in touch for a <strong>FREE</strong> no obligation consultation on our accountancy services, call our friendly team on <?php do_action('ld_default'); ?> or contact us online</p>

			</div>

		</div>
	
	</main>

<?php get_footer(); ?>
