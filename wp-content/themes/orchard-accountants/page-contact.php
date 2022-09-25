<?php
/**
 * The template for rendering any single pages with no template.
 * @author  Adtrak
 * @package AdtrakChild
 * @version 1.0.0
 * Template Name: Contact
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
				<div class="copy copy--less-pad-right">
					
					<h1><?php the_field('h1'); ?></h1>
					<?php the_content(); ?>
						
					<?php echo do_shortcode("[ninja_form id=2]"); ?>
				</div>


			</div>

			<div class="site-content__column site-content__column--medium">

				<div class="copy copy--less-pad-left">
				
				<?php if( have_rows('branches') ): ?>
					
					<?php while( have_rows('branches') ): the_row(); ?>

					<div class="branch">
						
						<div class="branch__map">

						<?php $image = get_sub_field('map_image'); if( !empty($image) ): ?>

						<a href="<?php the_sub_field('map_link'); ?>"><img src="<?php echo $image['url']; ?>" target="_blank" alt="<?php echo $image['alt']; ?>" class="branch__img"/></a>

						<?php endif; ?>

						</div>

						<div class="branch__copy">
							<h3 class="branch__title"><?php the_sub_field('branch_name'); ?></h3>
							<?php 

							// check for rows (sub repeater)
							if( have_rows('address') ): ?>
								<ul class="branch__address">
								<?php 

								// loop through rows (sub repeater)
								while( have_rows('address') ): the_row(); ?>

									<li class="branch__address-line"><?php the_sub_field('address_line'); ?></li>

								<?php endwhile; ?>
								</ul>
							<?php endif; //if( get_sub_field('items') ): ?>

						


							<?php if( get_sub_field('telephone') ): ?>
							  	<p class="branch__item">Tel: <span><?php the_sub_field('telephone'); ?></span></p>
							<?php endif; ?>

							<?php if( get_sub_field('fax') ): ?>
							  	<p class="branch__item">Fax: <span><?php the_sub_field('fax'); ?></span></p>
							<?php endif; ?>

							<?php if( get_sub_field('email') ): ?>
							  	<p class="branch__item">Email: <span><?php the_sub_field('email'); ?></span></p>
							<?php endif; ?>

						</div>	

					</div>

					<?php endwhile; // while( has_sub_field('to-do_lists') ): ?>

					

				<?php endif; // if( get_field('to-do_lists') ): ?>

				</div>

			</div>

		<?php endwhile; endif; ?>


	
	
	</main>

<?php 
	get_footer();
?>
