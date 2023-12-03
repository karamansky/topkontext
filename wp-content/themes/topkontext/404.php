<?php get_header(); ?>

<section class="section_search">
    <div class="wrapper">
        <h1>404</h1>
        <h3><?php esc_html_e( 'The page you are looking for doesn’t exist or has been moved.', 'gj' ); ?></h3>
        <p><?php esc_html_e( 'Perhaps a quick search can help you find it.', 'gj' ); ?> <a class="accent-links" href="/contact"><?php esc_html_e( 'Contact us', 'gj' ); ?></a> <?php esc_html_e( 'if you need a hand.', 'gj' ); ?></p>
        <form action="/">
			<div class="input-wrap">
				<input type="text" placeholder="" name="s">
				<a href="#" class="search_clear"></a>
			</div>
            <button type="submit"><?php esc_html_e( 'Search', 'gj' ); ?></button>
        </form>
        <a class="accent-links" href="<?php echo get_home_url(); ?>"><?php esc_html_e( 'Go Back to Home', 'gj' ); ?></a>
    </div>
</section>

<?php get_footer(); ?>
