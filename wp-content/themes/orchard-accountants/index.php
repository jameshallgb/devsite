<?php
/**
 * The template for rendering anything not caught by other file as well
 * as the loop for any blog posts. In theory this is a "fallback" file. 
 * @author  Adtrak
 * @package AdtrakChild
 * @version 1.0.0
 */
?>

<?php
    get_header();
    include locate_template('parts/hero.php');
?>

	<main class="site-content site-content--no-bg">

		
		<div class="site-content__column site-content__column--large">
			<div class="copy copy__news">


				<div class="post post--intro">
				<p>Welcome to the Orchard Accountants blog. This is our hub of information where we will detail company developments as well as provide news and insight into the ever-changing world of finances and accounting. If you read something which strikes to your interest, and you’d like to learn more about a particular topic or service we provide, don’t hesitate to get in touch with us today.</p>

				</div>

				<?php if (have_posts()): while (have_posts()): the_post(); ?>

				<article class="post post--overview">
					
					<?php the_title('<h3>', '</h3>'); ?>
					<p class="excerpt"><?php custom_length_excerpt(25); ?></p>
					<a href="<?php the_permalink(); ?>" class="btn btn--vert">Continue reading</a>
				</article>
			
				<?php endwhile; endif; ?>

				<div class="prev-next">				
					<div class="prev"><?php previous_posts_link(); ?></div>
					<div class="next"><?php next_posts_link(); ?></div>		
		        </div>
			</div>	
		</div>		

	</main>

<?php get_footer(); ?>