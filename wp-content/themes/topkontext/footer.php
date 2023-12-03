<?php
$logo = get_field( 'logo', 'option' );
$footer_text = get_field( 'footer_text', 'option' );

$email = get_field( 'email', 'option' );
$phones = get_field( 'phones', 'option' );
$addresses = get_field( 'addresses', 'option' );

$facebook = get_field( 'facebook', 'option' );
$twitter = get_field( 'twitter', 'option' );
$instagram = get_field( 'instagram', 'option' );
$linkedin = get_field( 'linkedin', 'option' );
$youtube = get_field( 'youtube', 'option' );

$certificates = get_field( 'certificates', 'option' );

$terms_conditions = get_field( 'terms_link', 'option' );
$privacy = get_field( 'privacy_link', 'option' );

?>
<footer class="footer">
	<div class="gj-wrapper">
		<div class="footer__top">
			<div class="footer__info">
				<?php if( !empty($logo) ){ ?>
					<a href="<?php echo home_url(); ?>" class="footer__logo"><img src="<?php echo $logo['url'] ?>" alt="gj logo"></a>
				<?php } ?>
				<?php if( !empty($footer_text) ){ ?>
					<div class="footer__description"><?php echo $footer_text ?></div>
				<?php } ?>
				<?php if( !empty($facebook) || !empty($twitter) || !empty($instagram) || !empty($linkedin) || !empty($youtube) ){ ?>
					<div class="footer__socials">
						<?php if( !empty($facebook) ) { ?>
							<a href="<?php echo $facebook ?>" class="footer__soc-item" target="_blank"><i class="icon facebook-icon"></i></a>
						<?php } ?>
						<?php if( !empty($twitter) ) { ?>
							<a href="<?php echo $twitter ?>" class="footer__soc-item" target="_blank"><i class="icon twitter-icon"></i></a>
						<?php } ?>
						<?php if( !empty($instagram) ) { ?>
							<a href="<?php echo $instagram ?>" class="footer__soc-item" target="_blank"><i class="icon instagram-icon"></i></a>
						<?php } ?>
						<?php if( !empty($linkedin) ) { ?>
							<a href="<?php echo $linkedin ?>" class="footer__soc-item" target="_blank"><i class="icon linkedin-icon"></i></a>
						<?php } ?>
						<?php if( !empty($youtube) ) { ?>
							<a href="<?php echo $youtube ?>" class="footer__soc-item" target="_blank"><i class="icon youtube-icon"></i></a>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
			<div class="footer__right">
				<div class="footer__menu">
					<h3 class="footer__item-title"><?php esc_html_e('Links', 'gj'); ?></h3>
					<?php
						wp_nav_menu(
							[
								'theme_location' => 'primary-menu',
								'menu_class'     => 'footer-menu',
								'container'       => 'nav',
								'container_class' => 'footer__menu-container',
							]
						);
					?>
				</div>

				<?php if( !empty($addresses) || !empty($phones) || !empty($email) ){ ?>
					<div class="footer__contacts">
						<h3 class="footer__item-title"><?php esc_html_e('Contacts', 'gj'); ?></h3>
						<?php if( !empty($addresses) ) { ?>
							<?php foreach ( $addresses as $address ) { ?>
								<div class="footer__contacts-item">
									<h4 class="footer__contacts-title"><?php echo sanitize_text_field($address['title']); ?></h4>
									<div class="footer__contacts-text"><?php echo $address['address']; ?></div>
								</div>
							<?php } ?>
						<?php } ?>

						<?php if( !empty($phones) ) { ?>
							<div class="footer__contacts-item">
								<h4 class="footer__contacts-title"><?php esc_html_e('Phones', 'gj') ?></h4>
								<?php foreach ( $phones as $phone ) { ?>
									<a href="tel:<?php echo preg_replace("/[^0-9]/", "", $phone['phone_number']) ?>" class="footer__contacts-text footer__contacts-phone"><?php echo $phone['phone_prefix'] ?> <?php echo $phone['phone_number'] ?></a>
								<?php } ?>
							</div>
						<?php } ?>
						<?php if( !empty($email) ) { ?>
						<div class="footer__contacts-item">
							<h4 class="footer__contacts-title"><?php esc_html_e('Email', 'gj'); ?></h4>
							<a href="mailto:<?php echo $email ?>" class="footer__contacts-text footer__contacts-email"><?php echo $email ?></a>
						</div>
						<?php } ?>
					</div>
				<?php } ?>

				<?php if( !empty($certificates) ) { ?>
					<div class="footer__cert">
						<h3 class="footer__item-title"><?php esc_html_e('Certifications', 'gj'); ?></h3>
						<div class="footer__cert-items">
							<?php foreach ($certificates as $img) {
								$link = '#';
								if( !empty($img['link']) ){
									$link = $img['link'];
								}
							?>
								<a href="<?php echo $link ?>" class="footer__cert-item" target="_blank"><img src="<?php echo $img['image']['url'] ?>" alt="certificate"></a>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="footer__copy">
			<div class="footer__copy-text">
				Copyright © <?php echo date('Y') ?> Great Job Moving | All Rights Reserved |
				<?php if( !empty($terms_conditions) || !empty($privacy) ) { ?>
					<div class="footer__copy-links">
						<?php if( !empty($terms_conditions) ) { ?>
							<a href="<?php echo $terms_conditions ?>"><?php esc_html_e('Terms&nbsp;and&nbsp;Conditions', 'gj'); ?></a>
						<?php } ?>
						<?php if( !empty($terms_conditions) && !empty($privacy) ) echo '|'; ?>
						<?php if( !empty($privacy) ) { ?>
							<a href="<?php echo $privacy ?>"><?php esc_html_e('Privacy&nbsp;Policy', 'gj'); ?></a>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>