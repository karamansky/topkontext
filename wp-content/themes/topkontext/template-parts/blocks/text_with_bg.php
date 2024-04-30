<?php
	if( !defined( 'ABSPATH' ) ) exit;
	if( is_admin() ){
		if( empty($block) ) exit;
		if( GutenbergBlocks::checkForPreview($block) ) return;
	}

	$title = get_field('title');
	$subtitle = get_field('subtitle');
	$text = get_field('text');
	$image = get_field('image');

	if( empty($title) && empty($text) ) return false;
?>
<section class="text-with-bg" <?php echo DisplayGlobal::generateStyleWithBgImageOrNothing($image); ?>>
	<div class="wrapper">
		<div class="text-with-bg__inner">
			<div class="text-with-bg__content">
				<?php if( !empty($title) || !empty($subtitle) ) { ?>
					<div class="text-with-bg__top">
						<?php if( !empty($title) ) { ?>
							<h2 class="text-with-bg__title"><?php echo $title ?></h2>
						<?php } ?>
						<?php if( !empty($title) ) { ?>
							<h3 class="text-with-bg__subtitle"><?php echo $subtitle ?></h3>
						<?php } ?>
					</div>
				<?php } ?>
				<?php if( !empty($text) ) { ?>
					<div class="text-with-bg__text">
						<?php echo $text; ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>