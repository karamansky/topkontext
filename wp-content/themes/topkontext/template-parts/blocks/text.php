<?php
	if( !defined( 'ABSPATH' ) ) exit;
	if( is_admin() ){
		if( empty($block) ) exit;
		if( GutenbergBlocks::checkForPreview($block) ) return;
	}

	$content = get_field('content');

	if( empty($content) ) return false;
?>
<section class="text-content">
	<div class="wrapper">
		<div class="text__inner">
			<?php echo $content ?>
		</div>
	</div>
</section>
