<?php
	$post_id = get_the_ID();
?>

<div class="all-blogs__item">
	<div class="all-blogs__head-wrap">
		<div class="gj-wrapper">
			<div class="all-blogs__head">
				<div class="all-blogs__head-img">
					<?php if( !empty($author_img) ) echo $author_img; ?>
				</div>
				<div class="all-blogs__head-info">
					<a href="<?php echo get_the_permalink( $post_id ) ?>" class="all-blogs__item-link"><h2 class="all-blogs__item-title"><?php the_title() ?></h2></a>
					<div class="all-blogs__info-items">
						<?php if( !empty($author_name) ) { ?>
							<div class="all-blogs__info-item"><?php _e('by', 'gj'); echo ' ' . $author_name; ?></div>
						<?php } ?>
						<div class="all-blogs__info-item"><?php echo get_the_date( 'M j, Y', $post_id ) ?></div>
						<?php if( !empty($post_category->name) ){ ?>
							<div class="all-blogs__info-item"><?php echo $post_category->name ?></div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="all-blogs__content-wrap">
		<div class="gj-wrapper-small">
			<div class="all-blogs__content">
				<?php the_excerpt(); ?>
				<a href="<?php echo get_the_permalink( $post_id ) ?>" class="btn btn--transparent all-blogs__readmore">
					<i class="icon arrow-left-blue-icon"></i>
					<span><?php _e('Read More', 'gj'); ?></span>
					<i class="icon arrow-right-blue-icon"></i>
				</a>
			</div>
		</div>
	</div>

</div>
