<?php
	if( !defined( 'ABSPATH' ) ) exit;
	if( is_admin() ){
		if( empty($block) ) exit;
		if( GutenbergBlocks::checkForPreview($block) ) return;
	}

	$reviews = get_field('reviews');

	if( empty($reviews) ) return false;
?>
<div class="reviews-slider">
	<div class="wrapper">
		<div class="reviews-slider__inner">
			<div class="reviews-slider__items">
				<?php foreach ( $reviews as $review ) { ?>
					<div class="reviews-slider__item">
						<div class="reviews-slider__rating">
							<?php if( !empty($review['rating']) ) { ?>
								<?php for ( $i = 0; $i < $review['rating']; $i++ ) { ?>
									<div class="reviews-slider__rating-star"></div>
								<?php } ?>
							<?php } ?>
						</div>
						<?php if( !empty($review['title']) ) { ?>
							<h3 class="reviews-slider__item-title"><?php echo sanitize_text_field($title); ?></h3>
						<?php } ?>
						<?php if( !empty($review['text']) ) { ?>
							<div class="reviews-slider__item-text">
								<?php echo $review['text'] ?>
							</div>
						<?php } ?>
						<?php if( !empty($review['author']) ) { ?>
							<div class="reviews-slider__item-author">
								<?php echo $review['author'] ?>
							</div>
						<?php } ?>
						<?php if( !empty($review['soc_logo_image']) ) { ?>
							<div class="reviews-slider__item-soc">
								<?php DisplayGlobal::renderAcfImage($review['soc_logo_image']); ?>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
