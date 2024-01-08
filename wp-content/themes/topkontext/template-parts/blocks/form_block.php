<?php
	if( !defined( 'ABSPATH' ) ) exit;
	if( is_admin() ){
		if( empty($block) ) exit;
		if( GutenbergBlocks::checkForPreview($block) ) return;
	}

	$title = get_field('title');
	$form_shortcode = get_field('form_shortcode');

	if( empty($form_shortcode) ) return false;
?>
<section class="contact-form">
	<div class="wrapper">
		<div class="contact-form__inner">
			<div class="contact-form__wrap">
				<?php if( !empty($title) ) { ?>
					<h2 class="contact-form__title"><?php echo sanitize_text_field($title) ?></h2>
				<?php } ?>
				<div class="contact-form__form">
					<?php echo do_shortcode($form_shortcode); ?>
				</div>
			</div>
		</div>
	</div>
</section>