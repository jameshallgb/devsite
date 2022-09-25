<?php if (is_front_page() ) { ?>

	<div class="hero">

	<div class="header">

		<div class="header__left">

			<a href="<?php echo home_url(); ?>">
				<?php $image = get_field('site_logo','option'); if( !empty($image) ): ?>
					<img class="logo" src="<?php echo $image['url']; ?>" alt="<?php bloginfo('title'); ?> Logo" />
				<?php endif; ?>
			</a>

		</div>

		<div class="header__right">

			<?php
				wp_nav_menu([
					'menu' => 'Secondary Menu',
					'menu_class' => "header__secondary-nav navigation",
					'container' => ''
				]);
			?>

	        <?php include locate_template('parts/phone-top-right.php'); ?>

			<?php
				wp_nav_menu([
					'menu' => 'Primary Menu',
					'menu_class' => "header__primary-nav navigation navigation--primary",
					'container' => ''
				]);
			?>

	    </div>

	</div>

<?php

/* This uses the featured image as a background. Takes the featured image, and applies the different sizes to varying breakpoints. */

$thumb_id = get_post_thumbnail_id();

$thumb_url_array_small = wp_get_attachment_image_src($thumb_id, 'img-600-600', true);
$thumb_url_small = $thumb_url_array_small[0];

$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'img-1200-600', true);
$thumb_url = $thumb_url_array[0];

$thumb_url_array_large = wp_get_attachment_image_src($thumb_id, 'img-2000-1000', true);
$thumb_url_large = $thumb_url_array_large[0];

if ( $thumb_id ) : ?>

	<style>
		.hero::before {
	      background-image: url(<?php echo $thumb_url_small; ?>);
	      background-position: <?php the_field('featured_image_position'); ?>;
	    }
	    @media (min-width: 600px) {
			.hero::before {
		       background-image: url(<?php echo $thumb_url; ?>);
		    }
	    }
	    @media (min-width: 1200px) {
			.hero::before {
		      background-image: url(<?php echo $thumb_url_large; ?>);
		    }
	    }
	</style>

<?php endif; ?>

<?php /*

<video id="bgvid" autoplay muted playsinline loop poster="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2015/05/demolition-services-bg.jpg'">
	<source src="<?php echo get_stylesheet_directory_uri() ?>/video/runner.mp4" type="video/mp4">
</video>
*/ ?>

	<div class="hero__container">

		<div class="hero__content">

			<div class="hero__message">

				<?php

					// check if the flexible hero has rows of data
					if( have_rows('flexible_hero') ):

					     // loop through the rows of data
					    while ( have_rows('flexible_hero') ) : the_row();

					        if( get_row_layout() == 'text' ): ?>

					        	<p class="<?php the_sub_field('hero_text_class'); ?>"><?php the_sub_field('hero_text'); ?></p>

					        <?php

					        elseif( get_row_layout() == 'button' ): ?>

								<div class="hero__buttons" style="display:flex; margin-top: 40px;">

									<a class="btn <?php the_sub_field('button_class'); ?>" href="<?php the_sub_field('button_link') ?>">
										<?php the_sub_field('button_text') ?>
									</a>

									<script src="https://fast.wistia.com/embed/medias/6hih1pal95.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><span class="wistia_embed wistia_async_6hih1pal95 popover=true popoverContent=link" style="display:inline;position:relative">
									<a class="btn btn--vert" style="margin-left: 1rem;"href="#">Watch Video</a>
									</span>

								</div>

					    	<?php endif;

					    endwhile; ?>

					<?php /* Else display the title */ else : ?>

					<p class="primary"><?php the_title(); ?></p>

				<?php endif; ?>

			</div>

			<?php include locate_template('parts/buckets.php'); ?>

		</div>

		<div class="hero__form">

			<p class="primary">Book a <strong>FREE</strong> consultation</p>

			<p class="hero__form-copy">If you would like to get some impartial advice, simply book  a free consultation and we'll get in touch with you as soon as we can.</p>
			<?php echo do_shortcode("[ninja_form id=1]"); ?>

		</div>

	</div>

	<?php } elseif(is_home() ) { ?>

	<div class="hero hero--internal">

		<div class="header">

			<div class="header__left">

				<a href="<?php echo home_url(); ?>">
					<?php $image = get_field('site_logo','option'); if( !empty($image) ): ?>
						<img class="logo" src="<?php echo $image['url']; ?>" alt="<?php bloginfo('title'); ?> Logo" />
					<?php endif; ?>
				</a>

			</div>

			<div class="header__right">

				<?php
					wp_nav_menu([
						'menu' => 'Secondary Menu',
						'menu_class' => "header__secondary-nav navigation",
						'container' => ''
					]);
				?>

		        <?php include locate_template('parts/phone-top-right.php'); ?>

				<?php
					wp_nav_menu([
						'menu' => 'Primary Menu',
						'menu_class' => "header__primary-nav navigation navigation--primary",
						'container' => ''
					]);
				?>

		    </div>

		</div>

	<?php

	/* This uses the featured image as a background. Takes the featured image, and applies the different sizes to varying breakpoints. */

	$thumb_id = get_post_thumbnail_id(68);

	$thumb_url_array_small = wp_get_attachment_image_src($thumb_id, 'img-600-600', true);
	$thumb_url_small = $thumb_url_array_small[0];

	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'img-1200-600', true);
	$thumb_url = $thumb_url_array[0];

	$thumb_url_array_large = wp_get_attachment_image_src($thumb_id, 'img-2000-1000', true);
	$thumb_url_large = $thumb_url_array_large[0];

	if ( $thumb_id ) : ?>

		<style>
			.hero::before {
		      background-image: url(<?php echo $thumb_url_small; ?>);
		      background-position: <?php the_field('featured_image_position'); ?>;
		    }
		    @media (min-width: 600px) {
				.hero::before {
			       background-image: url(<?php echo $thumb_url; ?>);
			    }
		    }
		    @media (min-width: 1200px) {
				.hero::before {
			      background-image: url(<?php echo $thumb_url_large; ?>);
			    }
		    }
		</style>

	<?php endif; ?>

		<div class="hero__container">

			<div class="hero__content">

				<div class="hero__message">

					<p class="hero__title hero__title">Keep up to date on the</p>
					<p class="hero__title hero__title--vert">latest news and information</p>

					<p class="hero__copy">We like to keep our clients informed at all times, so check back regularly to see all the industry insight and pieces of interest we share.</p>

					<p class="hero__copy">Get in touch today - call Kent on <?php do_action("ld_single", "kent", false) ?> or Surrey on <?php do_action("ld_single", "surrey", false) ?></p>

				</div>

			</div>

			<div class="hero__form">

				<p class="primary">Book a <strong>FREE</strong> consultation</p>

				<p class="hero__form-copy">If you would like to get some impartial advice, simply book  a free consultation and we'll get in touch with you as soon as we can.</p>

				<button class="hero-toggle-form btn btn--vert">Book your free consulation now</button>

				<div class="hero__toggle">
					<?php echo do_shortcode("[ninja_form id=1]"); ?>
				</div>

			</div>

		</div>

	<?php } elseif(is_404() ) { ?>

	<div class="hero hero--internal">

		<div class="header">

			<div class="header__left">

				<a href="<?php echo home_url(); ?>">
					<?php $image = get_field('site_logo','option'); if( !empty($image) ): ?>
						<img class="logo" src="<?php echo $image['url']; ?>" alt="<?php bloginfo('title'); ?> Logo" />
					<?php endif; ?>
				</a>

			</div>

			<div class="header__right">

				<?php
					wp_nav_menu([
						'menu' => 'Secondary Menu',
						'menu_class' => "header__secondary-nav navigation",
						'container' => ''
					]);
				?>

		        <?php include locate_template('parts/phone-top-right.php'); ?>

				<?php
					wp_nav_menu([
						'menu' => 'Primary Menu',
						'menu_class' => "header__primary-nav navigation navigation--primary",
						'container' => ''
					]);
				?>

		    </div>

		</div>

	<?php

	/* This uses the featured image as a background. Takes the featured image, and applies the different sizes to varying breakpoints. */

	$thumb_id = get_post_thumbnail_id(68);

	$thumb_url_array_small = wp_get_attachment_image_src($thumb_id, 'img-600-600', true);
	$thumb_url_small = $thumb_url_array_small[0];

	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'img-1200-600', true);
	$thumb_url = $thumb_url_array[0];

	$thumb_url_array_large = wp_get_attachment_image_src($thumb_id, 'img-2000-1000', true);
	$thumb_url_large = $thumb_url_array_large[0];

	if ( $thumb_id ) : ?>

		<style>
			.hero::before {
		      background-image: url(<?php echo $thumb_url_small; ?>);
		      background-position: <?php the_field('featured_image_position'); ?>;
		    }
		    @media (min-width: 600px) {
				.hero::before {
			       background-image: url(<?php echo $thumb_url; ?>);
			    }
		    }
		    @media (min-width: 1200px) {
				.hero::before {
			      background-image: url(<?php echo $thumb_url_large; ?>);
			    }
		    }
		</style>

	<?php endif; ?>

		<div class="hero__container">

			<div class="hero__content">

				<div class="hero__message">

					<p class="hero__title hero__title">Error 404</p>

				</div>

			</div>

			<div class="hero__form">

				<p class="primary">Book a <strong>FREE</strong> consultation</p>

				<p class="hero__form-copy">If you would like to get some impartial advice, simply book  a free consultation and we'll get in touch with you as soon as we can.</p>


				<button class="hero-toggle-form btn btn--vert">Book your free consulation now</button>

				<div class="hero__toggle">
					<?php echo do_shortcode("[ninja_form id=1]"); ?>
				</div>

			</div>

		</div>

	<?php } else { ?>

	<div class="hero hero--internal">

		<div class="header">

			<div class="header__left">

				<a href="<?php echo home_url(); ?>">
					<?php $image = get_field('site_logo','option'); if( !empty($image) ): ?>
						<img class="logo" src="<?php echo $image['url']; ?>" alt="<?php bloginfo('title'); ?> Logo" />
					<?php endif; ?>
				</a>

			</div>

			<div class="header__right">

				<?php
					wp_nav_menu([
						'menu' => 'Secondary Menu',
						'menu_class' => "header__secondary-nav navigation",
						'container' => ''
					]);
				?>

		        <?php include locate_template('parts/phone-top-right.php'); ?>

				<?php
					wp_nav_menu([
						'menu' => 'Primary Menu',
						'menu_class' => "header__primary-nav navigation navigation--primary",
						'container' => ''
					]);
				?>

		    </div>

		</div>

	<?php

	/* This uses the featured image as a background. Takes the featured image, and applies the different sizes to varying breakpoints. */

	$thumb_id = get_post_thumbnail_id();

	$thumb_url_array_small = wp_get_attachment_image_src($thumb_id, 'img-600-600', true);
	$thumb_url_small = $thumb_url_array_small[0];

	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'img-1200-600', true);
	$thumb_url = $thumb_url_array[0];

	$thumb_url_array_large = wp_get_attachment_image_src($thumb_id, 'img-2000-1000', true);
	$thumb_url_large = $thumb_url_array_large[0];

	if ( $thumb_id ) : ?>

		<style>
			.hero::before {
		      background-image: url(<?php echo $thumb_url_small; ?>);
		      background-position: <?php the_field('featured_image_position'); ?>;
		    }
		    @media (min-width: 600px) {
				.hero::before {
			       background-image: url(<?php echo $thumb_url; ?>);
			    }
		    }
		    @media (min-width: 1200px) {
				.hero::before {
			      background-image: url(<?php echo $thumb_url_large; ?>);
			    }
		    }
		</style>

	<?php endif; ?>

		<div class="hero__container">

			<div class="hero__content">

				<div class="hero__message">

					<?php

						// check if the flexible hero has rows of data
						if( have_rows('flexible_hero') ):

						     // loop through the rows of data
						    while ( have_rows('flexible_hero') ) : the_row();

						        if( get_row_layout() == 'text' ): ?>

						        	<p class="<?php the_sub_field('hero_text_class'); ?>"><?php the_sub_field('hero_text'); ?></p>

						        <?php

						        elseif( get_row_layout() == 'button' ): ?>

									<a class="btn <?php the_sub_field('button_class'); ?>" href="<?php the_sub_field('button_link') ?>">
										<?php the_sub_field('button_text') ?>
									</a>

						    	<?php endif;

						    endwhile; ?>

						<?php /* Else display the title */ else : ?>

						<p class="hero__title hero__title--vert"><?php the_title(); ?></p>

					<?php endif; ?>

					<p class="hero__copy">Get in touch today - call Kent on <?php do_action("ld_single", "kent", false) ?> or Surrey on <?php do_action("ld_single", "surrey", false) ?></p>

				</div>

			</div>

			<?php if(!is_page('contact-us')) { ?>

			<div class="hero__form">

				<p class="primary">Book a <strong>FREE</strong> consultation</p>

				<p class="hero__form-copy">If you would like to get some impartial advice, simply book  a free consultation and we'll get in touch with you as soon as we can.</p>


				<button class="hero-toggle-form btn btn--vert">Book your free consulation now</button>

				<div class="hero__toggle">
					<?php echo do_shortcode("[ninja_form id=1]"); ?>
				</div>

			</div>

			<?php } ?>

		</div>

	<?php } ?>

</div>
