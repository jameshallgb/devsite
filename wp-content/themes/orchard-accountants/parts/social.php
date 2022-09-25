<?php if( get_field('social_twitter', 'options') ): ?>
	<a href="<?php the_field('social_twitter', 'option'); ?>" onclick="gtag('event', 'click', {'event_category' : 'social button','event_label' : 'Twitter'});" target="_blank" class="footer__social-link"><i class="icon-twitter"></i></a>
<?php endif; ?>

<?php if( get_field('social_facebook', 'options') ): ?>
	<a href="<?php the_field('social_facebook', 'option'); ?>" onclick="gtag('event', 'click', {'event_category' : 'social button','event_label' : 'Facebook'});" target="_blank" class="footer__social-link"><i class="icon-facebook"></i></a>
<?php endif; ?>

<?php if( get_field('social_google', 'options') ): ?>
	<a href="<?php the_field('social_google', 'option'); ?>" onclick="gtag('event', 'click', {'event_category' : 'social button','event_label' : 'Google+'});" target="_blank" class="footer__social-link"><i class="icon-google-plus2"></i></a>
<?php endif; ?>

<?php if( get_field('social_instagram', 'options') ): ?>
	<a href="<?php the_field('social_instagram', 'option'); ?>" onclick="gtag('event', 'click', {'event_category' : 'social button','event_label' : 'Instagram'});" target="_blank" class="footer__social-link"><i class="icon-instagram"></i></a>
<?php endif; ?>

<?php if( get_field('social_linkedin', 'options') ): ?>
	<a href="<?php the_field('social_linkedin', 'option'); ?>" onclick="gtag('event', 'click', {'event_category' : 'social button','event_label' : 'Linkedin'});" target="_blank" class="footer__social-link"><i class="icon-linkedin"></i></a>
<?php endif; ?>

<?php if( get_field('social_youtube', 'options') ): ?>
	<a href="<?php the_field('social_youtube', 'option'); ?>" onclick="gtag('event', 'click', {'event_category' : 'social button','event_label' : 'Youtube'});" target="_blank" class="footer__social-link"><i class="icon-youtube2"></i></a>
<?php endif; ?>
