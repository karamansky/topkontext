<?php
	$copy = get_field('footer_copy', 'option');
	$footer_image = get_field('footer_image', 'option');
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
			<?php if( !empty($footer_image) ) { ?>
				<div class="footer__copy-right">
					<?php DisplayGlobal::renderAcfImage($footer_image); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>