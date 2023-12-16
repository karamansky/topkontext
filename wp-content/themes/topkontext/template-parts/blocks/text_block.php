<?php
	if( !defined( 'ABSPATH' ) ) exit;
	if( is_admin() ){
		if( empty($block) ) exit;
		if( GutenbergBlocks::checkForPreview($block) ) return;
	}

	$title = get_field('title');
	$subtitle = get_field('subtitle');
	$text_left = get_field('text_left');
	$text_right = get_field('text_right');
	$is_additional = get_field('need_additional_text_row');
	$additional_text_left = get_field('additional_left_text');
	$additional_text_left_bottom = get_field('additional_left_bottom_text');
	$additional_text_right = get_field('additional_right_text');
	$slogan = get_field('bottom_slogan');

	if( empty($title) && empty($text_left) ) return false;
?>
<section class="text-columns">
	<div class="wrapper">
		<div class="text-columns__inner">
			<div class="text-columns__title-wrap">
				<?php if( !empty($title) ) { ?>
					<h2 class="text-columns__title"><?php echo sanitize_text_field($title) ?></h2>
				<?php } ?>
				<?php if( !empty($subtitle) ) { ?>
					<h3 class="text-columns__subtitle"><?php echo sanitize_text_field($subtitle) ?></h3>
				<?php } ?>
			</div>
			<div class="text-columns__top">
				<?php if( !empty($text_left) ) { ?>
					<div class="text-columns__left">
						<?php echo $text_left ?>
					</div>
				<?php } ?>
				<?php if( !empty($text_right) ) { ?>
					<div class="text-columns__right">
						<?php echo $text_right ?>
					</div>
				<?php } ?>
			</div>
			<?php if( !empty($is_additional) && $is_additional ) { ?>
				<div class="text-columns__bottom">
					<?php if( !empty($additional_text_left) || !empty($additional_text_left_bottom) ) { ?>
						<div class="text-columns__additional-left">
							<?php if( !empty($additional_text_left) ) { echo $additional_text_left; } ?>
							<?php if( !empty($additional_text_left_bottom) ) { ?>
								<div class="text-columns__additional-left-bottom">
									<?php echo $additional_text_left_bottom; ?>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
					<?php if( !empty($additional_text_right) ) { ?>
						<div class="text-columns__additional-right">
							<?php echo $additional_text_right; ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
			<?php if( !empty($slogan) ) { ?>
				<div class="text-columns__slogan">
					<?php echo $slogan ?>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
