<?php
	if( !defined( 'ABSPATH' ) ) exit;
	if( is_admin() ){
		if( empty($block) ) exit;
		if( GutenbergBlocks::checkForPreview($block) ) return;
	}

	$title = get_field('title');
	$text = get_field('text');
	$button = get_field('button');
	$image = get_field('image');

	if( empty($title) && empty($text) ) return false;
?>
<section class="text-with-image-right" <?php echo DisplayGlobal::generateStyleWithBgImageOrNothing($image) ?> >
	<div class="wrapper">
		<div class="text-with-image-right__inner">
			<div class="text-with-image-right__content">
				<?php if( !empty($title) ) { ?>
					<h2 class="text-with-image-right__title">
						<?php echo sanitize_text_field($title) ?>
					</h2>
				<?php } ?>
				<?php if( !empty($text) ) { ?>
					<div class="text-with-image-right__text">
						<?php echo $text; ?>
					</div>
				<?php } ?>
				<?php DisplayGlobal::renderAcfLink($button, 'btn btn--orange btn--big text-with-image-right__button'); ?>
				<?php if( !empty($image) ) { ?>
					<div class="text-with-image__img">
						<?php DisplayGlobal::renderAcfImage($image); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>