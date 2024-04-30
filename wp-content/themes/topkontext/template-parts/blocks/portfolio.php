<?php
	if( !defined( 'ABSPATH' ) ) exit;
	if( is_admin() ){
		if( empty($block) ) exit;
		if( GutenbergBlocks::checkForPreview($block) ) return;
	}

	$title = get_field('title');
	$text = get_field('text');
	$cases = get_field('cases');

	if( empty($cases) ) return false;
?>
<section class="portfolio-block">
	<div class="wrapper">

	</div>
</section>