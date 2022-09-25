<?php
/**
 * The template for displaying the footer within your theme.
 * @author  Adtrak
 * @package AdtrakChild
 * @version 1.1.0
 */
?>

	<div class="footer">
		
			
			<div class="footer__item">
				
				<p class="footer__title">Services</p>

				<?php wp_nav_menu([
					'menu' => 'Footer Menu 1',
					'menu_class' => "footer__nav",
					'container' => ''
				]); ?>

				<p class="footer__title">More information</p>

				<?php wp_nav_menu([
					'menu' => 'Footer Menu 2',
					'menu_class' => "footer__nav",
					'container' => ''
				]); ?>

			</div>

			

			<div class="footer__item">

				<p class="footer__title">Orchard Accountants</p>

				

				



				<?php if( have_rows('branches', 66) ): ?>
					
					<?php while( have_rows('branches', 66) ): the_row(); ?>

						<div class="footer__branch">

						<p class="footer__sub-title"><?php the_sub_field('branch_name'); ?></p>
						<?php 

						// check for rows (sub repeater)
						if( have_rows('address') ):

							while( have_rows('address') ): the_row(); ?>

								<span class="footer__address-line"><?php the_sub_field('address_line'); ?></span>

							<?php endwhile; ?>
							
						<?php endif; //if( get_sub_field('items') ): ?>


						<?php if( get_sub_field('telephone') ): ?>
						  	<p class="branch__item">Tel: <span><?php the_sub_field('telephone'); ?></span></p>
						<?php endif; ?>		

						<?php if( get_sub_field('email') ): ?>
						  	<p class="branch__item">Email: <span><?php the_sub_field('email'); ?></span></p>
						<?php endif; ?>	

						</div>

					<?php endwhile; // while( has_sub_field('to-do_lists') ): ?>

				<?php endif; // if( get_field('to-do_lists') ): ?>


			</div>

			<div class="footer__item">

				<p class="footer__title">Opening Hours</p>


				<p class="footer__oh-day">Monday - Friday <span class="footer__oh-time">8:30 - 17:00</span>

				<p class="footer__oh-day">Saturday <span class="footer__oh-time">By Appointment</span></p>

				<p class="footer__oh-day">Sunday <span class="footer__oh-time">Closed</span></p>

		        <img data-src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-acca.png" class="lazyload footer__acc footer__acc--pad-right">
		    </div>



		
	</div>

	<div class="footer footer--lower">

		<div class="footer__item footer__item--grow">
		

 			<p>&copy; <?php bloginfo('title'); ?> <?php echo date('Y'); ?>. All Rights Reserved.

			<?php if(get_field('reg_number', 'option')): ?>
			Registered Number: <?php the_field('reg_number', 'option'); ?>
			<?php endif; ?>

			<?php if(get_field('vat_number', 'option')): ?>
				VAT Number: <?php the_field('vat_number', 'option'); ?>
			<?php endif; ?>

			</p>

	        

	        

	

		</div>

		<div class="footer__item footer__item--alignright">

			<?php include locate_template('parts/social.php'); ?>
			
			<a href="https://www.adtrak.co.uk" class="footer__social-link"><span class="icon-adtrak-logo-brackets"></span></a>

		</div>

	</div>

	<!-- Back to top arrow -->
	<div class="back-top-wrap">
	    <p id="back-top">
	        <a><span class="icon-chevron-up"></span> Top</a>
	    </p>
	</div>

</div><!-- wrapper -->


<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/scripts/lazysizes.min.js" async=""></script>

<?php wp_footer(); ?>
	
</body>
</html>
