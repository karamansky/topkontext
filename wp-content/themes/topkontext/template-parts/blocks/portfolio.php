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
		<div class="portfolio-block__inner">
			<div class="portfolio-block__top">
				<?php if( !empty($title) ) { ?>
					<h2 class="portfolio-block__title"><?php echo $title ?></h2>
				<?php } ?>
				<?php if( !empty($text) ) { ?>
					<div class="portfolio-block__text"><?php echo $text ?></div>
				<?php } ?>
			</div>
			<div class="portfolio-block__cases">
				<?php $i = 1; foreach ($cases as $case) {
					$case_title = get_field('title', $case->ID);
					$description = get_field('description', $case->ID);
					$ad_budget = get_field('ad_budget', $case->ID);
					$revenue = get_field('revenue', $case->ID);
					$time = get_field('time', $case->ID);
					$web_site_link = get_field('web_site_link', $case->ID);
					$what_we_do = get_field('what_we_do', $case->ID);
					$image = get_field('image', $case->ID);
					$image_url = get_the_post_thumbnail_url($case->ID, 'large'); ?>
					<div class="portfolio-case">
						<a href="#case<?php echo $i; ?>" class="portfolio-case__overlay">
							<div class="btn btn--small btn--orange portfolio-case__more">See More</div>
						</a>

						<div class="portfolio-case__image">
							<img src="<?php echo $image_url; ?>" alt="case image" loading="lazy" />
						</div>

						<div id="case<?php echo $i; ?>" class="portfolio-popup">
							<a href="#" class="portfolio-popup__close">&times;</a>
							<div class="portfolio-popup__info">
								<div class="portfolio-popup__left">
									<?php if( !empty($case_title) ) { ?>
										<h3 class="portfolio-popup__title"><?php echo $case_title; ?></h3>
									<?php } ?>
									<?php if( !empty($description) ) { ?>
										<div class="portfolio-popup__description"><?php echo $description; ?></div>
									<?php } ?>
									<?php if( !empty($ad_budget) || !empty($revenue) || !empty($time) ) { ?>
										<div class="portfolio-popup__ad-info">
											<?php if( !empty($ad_budget) ) { ?>
												<div class="portfolio__ad-budget">
													<span>Ad budget</span>
													<?php echo $ad_budget ?>
												</div>
											<?php } ?>
											<?php if( !empty($revenue) ) { ?>
												<div class="portfolio__revenue">
													<span>Revenue</span>
													<?php echo $revenue ?>
												</div>
											<?php } ?>
											<?php if( !empty($time) ) { ?>
												<div class="portfolio__time">
													<span>Time</span>
													<?php echo $time ?>
												</div>
											<?php } ?>
										</div>
									<?php } ?>
									<?php if( !empty($web_site_link) ) { ?>
										<a href="<?php echo $web_site_link ?>" class="btn btn--big btn--blue">View Project</a>
									<?php } ?>
								</div>
								<?php if( !empty($image) ) { ?>
									<div class="portfolio-popup__right">
										<div class="portfolio-popup__image">
											<?php DisplayGlobal::renderAcfImage($image); ?>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php $i++; } ?>
			</div>
		</div>
	</div>
</section>