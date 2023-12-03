<?php

get_header();

?>
    <section class="search-results">
        <div class="gj-wrapper">
            <?php if( have_posts() ) { ?>
				<?php
					while( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/partials/content', 'search' );
					}
				?>

				<?php echo get_the_posts_pagination(); ?>

			<?php
				} else {
					get_template_part( 'template-parts/partials/content', 'search-none' );
				}
            ?>
		</div>
	</section>
<?php get_footer(); ?>