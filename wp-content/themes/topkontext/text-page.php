<?php
	/**
	 * Template Name: Text page
	 */

	get_header();

	/* Start the Loop */
	while( have_posts() ) {
		the_post();
?>

<div class="text-page">
	<div class="wrapper">
		<div class="text-page__inner">
			<?php the_content(); ?>
		</div>
	</div>
</div>

<?php }

	get_footer();
