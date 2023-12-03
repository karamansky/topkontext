<?php
	if( !defined( 'ABSPATH' ) ) exit;
	if( is_admin() ){
		if( empty($block) ) exit;
		if( GutenbergBlocks::checkForPreview($block) ) return;
	}

	$background = DisplayGlobal::generateStyleWithBgImageOrNothing( get_field('background_image') );
	$title = get_field('title');
	$text = get_field('text');
	$form = get_field('form_shortcode');
	$mobile_link = get_field('mobile_link');

	if( empty($form) && empty($title) && empty($text) ) return false;
?>
<div class="hero" <?php echo $background; ?> >
	<div class="gj-wrapper">
		<div class="hero__inner">
			<div class="hero__content">
				<?php if( !empty($title) ) { ?>
					<h1 class="hero__title"><?php echo $title ?></h1>
				<?php } ?>
				<?php if( !empty($text) ){ ?>
					<div class="hero__text"><?php echo $text; ?></div>
				<?php } ?>
			</div>

			<div class="hero__form">
				<?php echo do_shortcode( $form ); ?>
			</div>

			<?php DisplayGlobal::renderAcfLink( $mobile_link, 'hero__mob-btn gj-btn btn--yellow btn--big' ) ?>
		</div>
	</div>
</div>
