<?php
	if( !defined( 'ABSPATH' ) ) exit;
	if( is_admin() ){
		if( empty($block) ) exit;
		if( GutenbergBlocks::checkForPreview($block) ) return;
	}

	$title = get_field('title');
	$faq = get_field('faq');

	if( empty($faq) ) return false;
?>
<section class="faq">
	<div class="wrapper">
		<div class="faq__inner">
			<?php if( !empty($title) ) { ?>
				<h2 class="faq__title"><?php echo sanitize_text_field($title) ?></h2>
			<?php } ?>
			<div class="faq__items">
				<?php foreach( $faq as $item ) { ?>
					<div class="faq__item">
						<?php if( !empty($item['question']) ) { ?>
							<a href="#" class="faq__item-title">
								<?php echo $item['question'] ?>
								<span class="faq__arrow"></span>
							</a>
						<?php } ?>
						<?php if( !empty($item['answer']) ) { ?>
							<div class="faq__item-content">
								<?php echo $item['answer']; ?>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
