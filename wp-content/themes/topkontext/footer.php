<?php
	$copy = get_field('footer_copy', 'option');
?>

<footer class="footer">
	<div class="wrapper">
		<div class="footer__inner">

		</div>
	</div>
</footer>

<div class="footer__copy">
	<div class="wrapper">
		<div class="footer__copy-inner">
			<?php if( !empty($copy) ) { ?>
				<div class="footer__copy-left"><?php echo '&copy;' . date('Y') . ' ' . $copy ?></div>
			<?php } ?>
			<div class="footer__copy-right">
				<nav class="footer__menu">
					<?php
						wp_nav_menu(
							[
								'theme_location' => 'footer-menu',
								'menu_class'     => 'footer-menu',
								'container'       => 'nav',
								'container_class' => 'footer-menu__container',
							]
						);
					?>
				</nav>
			</div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>