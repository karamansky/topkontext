<?php
	if( !defined( 'ABSPATH' ) ) exit;
	if( is_admin() ){
		if( empty($block) ) exit;
		if( GutenbergBlocks::checkForPreview($block) ) return;
	}

	$title = get_field('title');
	$description = get_field('description');
	$button1 = get_field('button');
	$button2 = get_field('button2');
	$image = get_field('image');
	$guaranty_image = get_field('guaranty_image');

	if( empty($title) && empty($image) ) return false;
?>
<section class="hero" >
	<div class="hero__inner">
		<div class="hero__content">
			<?php if( !empty($title) ) { ?>
				<h1 class="hero__title"><?php echo $title ?></h1>
			<?php } ?>
			<?php if( !empty($description) ){ ?>
				<div class="hero__description"><?php echo $description; ?></div>
			<?php } ?>
			<div class="hero__buttons">
				<?php DisplayGlobal::renderAcfLink( $button1, 'btn btn--big btn--blue hero__btn' ) ?>
				<?php DisplayGlobal::renderAcfLink( $button2, 'btn btn--big btn--orange hero__btn' ) ?>
			</div>
		</div>
		<div class="hero__image">
			<?php if( !empty($image) ){  DisplayGlobal::renderAcfImage($image, ''); } ?>

			<?php if( !empty($guaranty_image) ) { ?>
				<div class="hero__guaranty" <?php echo DisplayGlobal::generateStyleWithBgImageOrNothing($guaranty_image); ?>>
				</div>
			<?php } ?>
		</div>

	</div>
</section>
