<?php
	if( !defined( 'ABSPATH' ) ) exit;
	if( is_admin() ){
		if( empty($block) ) exit;
		if( GutenbergBlocks::checkForPreview($block) ) return;
	}

	$email = get_field('email');
	$phone = get_field('phone');
	$button = get_field('button');

	if( empty($email) && empty($phone) && empty($button) ) return false;
?>
<div class="contacts">
	<div class="wrapper">
		<div class="contacts__inner">
			<?php if( !empty($email) ) { ?>
				<div class="contacts__item contacts__email">
					<div class="contacts__item-icon contacts__item--email">
						<i class="fa fa-envelope-o"></i>
					</div>
					<div>
						<p>Email Us</p>
						<a href="<?php echo $email['url'] ?>" target="<?php echo $email['alt'] ?>"><?php echo $email['title'] ?></a>
					</div>
				</div>
			<?php } ?>
			<?php if( !empty($phone) ) { ?>
				<div class="contacts__item contacts__phone">
					<div class="contacts__item-icon contacts__item--phone">
						<i class="fa fa-mobile"></i>
					</div>
					<div>
						<p>Call Us</p>
						<a href="<?php echo $phone['url'] ?>" target="<?php echo $phone['alt'] ?>"><?php echo $phone['title'] ?></a>
					</div>
				</div>
			<?php } ?>
			<?php if( !empty($button) ) { ?>
				<div class="contacts__item contacts__button">
					<a href="<?php echo $button['url'] ?>" class="btn btn--big btn--orange" target="<?php echo $button['alt'] ?>"><?php echo $button['title'] ?></a>
				</div>
			<?php } ?>
			<div class="contacts__circle"></div>
		</div>
	</div>
</div>