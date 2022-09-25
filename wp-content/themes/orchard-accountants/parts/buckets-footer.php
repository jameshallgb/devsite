<div class="footer__buckets buckets">

	<?php $i = 1;  if (empty($selections)) {

		$selections = get_field('choose_buckets');

	if( have_rows('buckets','options') ):

		while( have_rows('buckets','options') ): the_row();

			$links = get_sub_field('links');
			$title = get_sub_field('title');
			$subtitle = get_sub_field('sub_title');
			$image = get_sub_field('image');
			$label = get_sub_field('label');
		
		if (in_array($label, $selections)) { 
	
	$i++;

	?>

	<style type="text/css">
		.buckets__item--<?php echo $i; ?>::before{
			background-image: url(<?php echo $image['sizes']['img-350-350']; ?>);
		}
	</style>
		<a href="<?php echo $links; ?>" class="buckets__item buckets__item--<?php echo $i; ?>">
			
			<p class="buckets__title"><?php echo $title; ?></p>
			<p class="buckets__sub-title"><?php echo $subtitle; ?></p>

		</a>
		
		<?php }  endwhile; // while( has_sub_field('to-do_lists') ):

		endif; // if( get_field('to-do_lists') ): 

		wp_reset_query();

		}
	?>

</div>