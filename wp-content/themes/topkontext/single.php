<?php
/**
 * The template for displaying all single posts
 */

get_header();
/* Start the Loop */
while( have_posts() ) :
	the_post();

	$post_id = get_the_ID();
	$author_id = get_post_field( 'post_author', $post_id );
	$author_avatar = get_field('avatar', 'user_'.$author_id);
	$author_name = get_the_author_meta( 'display_name', $author_id );
	$author_img = get_avatar( $author_id );
	$post_categories = wp_get_post_categories( $post_id, ['fields' => 'all'] );
	$post_category = array_shift( $post_categories );

	$testimonials = get_field('testimonials', $post_id);
	$cta_title = get_field('cta_title', $post_id);
	$cta_link = get_field('cta_button', $post_id);
?>

<div class="single">
	<div class="single__inner">
		<div class="single__top">
			<div class="gj-wrapper">
				<a href="#" class="gj-btn btn--transparent single__back-btn history-back"><?php _e('Back', 'gj'); ?></a>
			</div>
		</div>

		<div class="single__header">
			<div class="gj-wrapper">
				<div class="single__head">
					<?php if( !empty($author_img) || !empty($author_avatar) ) { ?>
						<div class="single__head-img">
							<?php if( !empty($author_avatar) ) { ?>
								<img src="<?php echo $author_avatar['url'] ?>" alt="author avatar" loading="lazy" />
							<?php }else{ if( !empty($author_img) ) echo $author_img; } ?>
						</div>
					<?php } ?>
					<div class="single__head-info">
						<h2 class="single__title"><?php the_title() ?></h2>
						<div class="single__info-items">
							<?php if( !empty($author_name) ) { ?>
								<div class="single__info-item"><?php _e('by', 'gj'); echo ' ' . $author_name; ?></div>
							<?php } ?>
							<div class="single__info-item"><?php echo get_the_date( 'M j, Y', $post_id ) ?></div>
							<?php if( !empty($post_category->name) ){ ?>
								<div class="single__info-item"><?php echo $post_category->name ?></div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="single__content">
			<div class="gj-wrapper-small">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>


<?php if( !empty($testimonials) ) { ?>
	<section class="testimonials without-padding">
		<div class="testimonials__inner">
			<div class="gj-wrapper">
				<div class="testimonials__slider">

					<span class="testimonials__slider-prev"></span>
					<span class="testimonials__slider-next"></span>

					<div class="testimonials__items">
						<?php foreach ( $testimonials as $testimonial ){ ?>
							<div class="testimonials__item">
								<?php if( !empty($testimonial['rating']) ){ ?>
									<div class="testimonials__rating">
										<?php for ($i=0; $i < $testimonial['rating']; $i++) { ?>
											<div class="testimonials__rating-star"></div>
										<?php } ?>
									</div>
								<?php } ?>
								<?php if( !empty($testimonial['text']) ){ ?>
									<div class="testimonials__text">
										<?php echo $testimonial['text'] ?>
									</div>
								<?php } ?>
								<?php if( !empty($testimonial['author']) || !empty($testimonial['date']) ){ ?>
									<div class="testimonials__bottom">
										<?php if( !empty($testimonial['author']) ) { ?>
											<div class="testimonials__author"><?php echo $testimonial['author'] ?></div>
										<?php } ?>
										<?php if( $testimonial['date'] ){ ?>
											<div class="testimonials__date"><?php echo $testimonial['date']; ?></div>
										<?php } ?>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>


<?php if( !empty($cta_link) ) { ?>
	<section class="cta">
		<div class="gj-wrapper">
			<div class="cta__inner">
				<?php if( !empty($cta_title) ) { ?>
					<h2 class="cta__title"><?php echo sanitize_text_field($cta_title) ?></h2>
				<?php } ?>

				<?php DisplayGlobal::renderAcfLink( $cta_link, 'gj-btn btn--yellow btn--big cta__btn' ) ?>
			</div>
		</div>
	</section>
<?php } ?>


<?php
endwhile; // End of the loop.
get_footer();
