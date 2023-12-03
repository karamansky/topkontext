<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Hind&display=swap" rel="stylesheet">

	<?php
		wp_head();

		$logo = get_field( 'logo', 'option' );
		$phones = get_field( 'phones', 'option' );
	?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>



<header class="header">
	<div class="header__main-wrap">
		<div class="gj-wrapper">
			<div class="header__main">
				<?php if( !empty($logo) ) { ?>
					<a href="<?php echo home_url() ?>" class="header__logo">
						<img src="<?php echo $logo['url'] ?>" alt="gj logo">
					</a>
				<?php } ?>

				<a href="#" class="header-menu__btn"><i class="icon hamburger-icon"></i></a>
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
			</div>
		</div>
	</div>

	<?php
		wp_nav_menu(
			[
				'theme_location' => 'primary-menu',
				'menu_class'     => 'header-menu',
				'container'       => 'nav',
				'container_class' => 'header-menu__container-mob',
			]
		);
	?>

	<div class="header__info-wrap">
		<div class="gj-wrapper">
			<div class="header__info">
				<?php
					if( !empty($phones) ){
						foreach ( $phones as $phone ){ ?>
							<a href="tel:<?php echo preg_replace("/[^0-9]/", "", $phone['phone_number']) ?>"><?php echo $phone['phone_prefix'] ?> <?php echo $phone['phone_number'] ?></a>
				<?php
						}
					}
				?>
			</div>
		</div>
	</div>
</header>