<div class="why-choose-us">
	<ul class="why-choose-us__list">

	<?php while( have_rows('why_choose_us', 'option') ): the_row(); 

// vars
		$icon = get_sub_field('icon');
		$reason = get_sub_field('reason');

		?>

		<li class="why-choose-us__item">

			<?php echo $icon; ?> <?php echo $reason; ?>

		</li>

	<?php endwhile; ?>

</ul>
</div>