<?php
/**
 * The template for rendering any single posts.
 * This is the template of single blog posts and custom post types. 
 * @author  Adtrak
 * @package AdtrakChild
 * @version 1.1.0
 */
?>

<?php
    get_header();
    include locate_template('parts/hero.php');
?>

	<main class="site-content site-content--no-bg">

		<div class="site-content__column site-content__column--large">
			
			<div class="copy">				
				<?php the_title('<h1>', '</h1>'); ?>
				<?php the_content(); ?>
			</div>

		</div>

		<div class="site-content__column site-content__column--medium">	

			<?php get_sidebar(); ?>			
			
		</div>

	</main>

<?php get_footer(); ?>

<?php if (is_single()) {   //  displaying a single blog post ?>
<script type="text/javascript">
  jQuery("a[href$='news/']").parent().addClass('current-menu-item');
</script>
<?php } ?>
