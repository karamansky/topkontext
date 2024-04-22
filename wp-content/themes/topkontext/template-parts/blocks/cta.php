<?php
	if( !defined( 'ABSPATH' ) ) exit;
	if( is_admin() ){
		if( empty($block) ) exit;
		if( GutenbergBlocks::checkForPreview($block) ) return;
	}

	$title = get_field('title');
	$description = get_field('description');
	$button_title = get_field('button_title');
	$button = get_field('button');
	$image = get_field('image');

	if( empty($button) && empty($title) ) return false;
?>
<section class="cta">
	<div class="wrapper">
		<div class="cta__inner">
			<?php if( !empty($image) ) { ?>
				<div class="cta__image">
					<?php DisplayGlobal::renderAcfImage($image); ?>
				</div>
			<?php } ?>
			<?php if( !empty($title) ) { ?>
				<h2 class="cta__title"><?php echo sanitize_text_field($title); ?></h2>
			<?php } ?>
			<?php if( !empty($description) ) { ?>
				<div class="cta__description">
					<?php echo $description; ?>
				</div>
			<?php } ?>
			<div class="cta__bottom">
				<?php if( !empty($button_title) ) { ?>
					<h3 class="cta__button-title"><?php echo sanitize_text_field($button_title); ?></h3>
				<?php } ?>
				<?php DisplayGlobal::renderAcfLink($button, 'btn btn--orange btn--big cta__button'); ?>
			</div>
		</div>
	</div>
</section>
