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
	$image_position = !empty(get_field('image_position')) ? get_field('image_position') : 'right';

	if( empty($title) && empty($text) ) return false;
?>
<section class="text-with-image image--<?php echo $image_position ?>" >
	<div class="wrapper">
		<div class="text-with-image__inner">
			<div class="text-with-image__content">
				<?php if( !empty($title) ) { ?>
					<h2 class="text-with-image__title">
						<?php echo sanitize_text_field($title) ?>
					</h2>
				<?php } ?>
				<?php if( !empty($text) ) { ?>
					<div class="text-with-image__text">
						<?php echo $text; ?>
					</div>
				<?php } ?>
				<?php DisplayGlobal::renderAcfLink($button, 'btn btn--orange btn--big text-with-image__button'); ?>
			</div>
			<?php if( !empty($image) ) { ?>
				<div class="text-with-image__image">
					<?php DisplayGlobal::renderAcfImage($image); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</section>