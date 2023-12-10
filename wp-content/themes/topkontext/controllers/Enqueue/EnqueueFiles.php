<?php namespace TOP\Enqueue;

if( !defined( 'ABSPATH' ) ) exit;

class EnqueueFiles {

	public static $version = 1.0;

	public function __construct() {
		$this->applyActions();
	}

	/**
	 * Add actions and filters
	 */
	public function applyActions() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueueScripts' ] );
	}

	/**
	 * Enqueue scripts & styles
	 */
	public function enqueueScripts() {
		$get_template_directory_uri = get_template_directory_uri();
		wp_enqueue_style( 'slick-theme-styles', $get_template_directory_uri . '/assets/libs/slick/slick-theme.css');
		wp_enqueue_style( 'slick-styles', $get_template_directory_uri . '/assets/libs/slick/slick.css');
		wp_enqueue_style( 'top-styles', $get_template_directory_uri . '/assets/css/style.min.css', [],static::$version);

		//scripts
//		wp_enqueue_script('top-script', $get_template_directory_uri . '/assets/libs/jquery.min.js', ['jquery'], '', true);
		wp_enqueue_script('slick-script', $get_template_directory_uri . '/assets/libs/slick/slick.min.js', ['jquery'], '', true);
		wp_enqueue_script('top-script', $get_template_directory_uri . '/assets/js/common.js', ['jquery'], '', true);

	}
}

new EnqueueFiles();

class_alias( 'TOP\Enqueue\EnqueueFiles', 'EnqueueFiles' );
