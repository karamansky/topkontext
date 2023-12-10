<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&display=swap">
	<?php
		wp_head();
	?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
	$logo = get_field('header_logo', 'option');
	$button = get_field('header_button', 'option');
	$phone = get_field('header_phone', 'option');
	$phone_cta_text = get_field('phone_cta_text', 'option');
?>
<header class="header">
	<div class="wrapper">
		<div class="header__inner">
			<div class="header__logo">
				<?php if( !empty($logo) ) { ?>
					<a href="<?php echo home_url() ?>" class="header__logo-link">
						<img src="<?php echo $logo['url'] ?>" alt="gj logo" class="header__logo-img">
					</a>
				<?php } ?>
			</div>
			<div class="header__right">
				<nav class="header__menu">
					<?php
						wp_nav_menu(
							[
								'theme_location' => 'primary-menu',
								'menu_class'     => 'header-menu',
								'container'       => 'nav',
								'container_class' => 'header-menu__container',
							]
						);
					?>
				</nav>
				<?php if( !empty($button) || !empty($phone) ) { ?>
					<div class="header__buttons">
						<?php if( !empty($button) ) { DisplayGlobal::renderAcfLink( $button, 'header__button btn btn--blue' ); } ?>
						<?php if( !empty($phone) ) { ?>
							<a href="tel:<?php echo preg_replace("/[^0-9]/", "", $phone) ?>" class="header__phone btn btn--dark-blue">
								<i class="fa fa-phone"></i>
								<?php echo sanitize_text_field($phone); ?>
							</a>
						<?php } ?>
					</div>
				<?php } ?>
				<a href="#" class="header__navbar-toggle">
					<i class="fa fa-bars"></i>
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
	</div>

	<nav class="header__menu--mob">
		<?php
			wp_nav_menu(
				[
					'theme_location' => 'primary-menu',
					'menu_class'     => 'header-menu',
					'container'       => 'nav',
					'container_class' => 'header-menu__container',
				]
			);
		?>
	</nav>

	<?php if( !empty($phone) ) { ?>
		<div class="header__phone-mob">
			<?php if( !empty($phone_cta_text) ) { ?>
				<span><?php echo $phone_cta_text ?></span>
			<?php } ?>
			<a href="tel:<?php echo preg_replace("/[^0-9]/", "", $phone) ?>" class="header__phone--mob">
				<i class="fa fa-phone"></i>
				<?php echo sanitize_text_field($phone); ?>
			</a>
		</div>
	<?php } ?>
</header>