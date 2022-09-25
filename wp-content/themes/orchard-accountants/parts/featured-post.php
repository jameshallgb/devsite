<div class="copy">

	<p class="primary"><strong>LATEST NEWS</strong></p>

	<?php
	$paged = (get_query_var('page')) ? get_query_var('page') : 1;
	$query_args = array(
		'post_type' 			=> 'post',
		'posts_per_page'        => 1,
		'order'                 => 'DESC',
		'orderby'               => 'date',
		'paged'          		=> $paged,
	);
	$the_query = new WP_Query($query_args);
	if ($the_query->have_posts()):
	while ($the_query->have_posts()): $the_query->the_post();

	?>

	<p class="copy__title"><?php the_title(); ?></p>

	<p class="date"><?php the_date(); ?></p>

	<p class="excerpt"><?php custom_length_excerpt(25); ?></p>

	<a href="<?php the_permalink(); ?>" class="btn btn--vert">View the full article</a> <a href="<?php echo site_url(); ?>/latest-news" class="btn btn--noir">View all articles</a>

	<?php endwhile; endif; wp_reset_query(); ?>

</div>