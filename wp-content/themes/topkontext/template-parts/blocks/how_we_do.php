<?php
	if( !defined( 'ABSPATH' ) ) exit;
	if( is_admin() ){
		if( empty($block) ) exit;
		if( GutenbergBlocks::checkForPreview($block) ) return;
	}

	$title = get_field('title');
	$description = get_field('description');
	$image = get_field('image');
	$items = get_field('items');

	if( empty($items) ) return false;
?>
<section class="how-we-do">
	<div class="wrapper">
		<div class="how-we-do__inner">
			<div class="how-we-do__header">
				<div class="how-we-do__text">
					<?php if( !empty($title) ) { ?>
						<h2 class="how-we-do__title"><?php echo sanitize_text_field($title); ?></h2>
					<?php } ?>
					<?php if( !empty($description) ){ ?>
						<div class="how-we-do__description">
							<?php echo $description; ?>
						</div>
					<?php } ?>
				</div>
				<?php if( !empty($image) ) { ?>
					<div class="how-we-do__image">
						<?php DisplayGlobal::renderAcfImage($image); ?>
					</div>
				<?php } ?>
			</div>
			<div class="how-we-do__content">
				<div class="how-we-do__items">
					<?php foreach ( $items as $item ) { ?>
						<div class="how-we-do__item">
							<?php if( !empty($item['icon']) ) { ?>
								<div class="how-we-do__icon">
									<?php DisplayGlobal::renderAcfImage($item['icon']); ?>
								</div>
							<?php } ?>
							<?php if( !empty($item['title']) ){ ?>
								<h3 class="how-we-do__item-title"><?php echo sanitize_text_field($item['title']) ?></h3>
							<?php } ?>
							<?php if( !empty($item['text']) ){ ?>
								<div class="how-we-do__text">
									<?php echo $item['text']; ?>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
