<?php namespace TOP\Admin;

if( !defined( 'ABSPATH' ) ) exit;

class Settings {

    public function __construct() {
        $this->initHooks();
    }

    public function initHooks() {
        add_action( 'acf/init', [ $this, 'addOptionsPages' ] );
        add_action( 'after_setup_theme', [ $this, 'topSetup' ] );
    }

    public function topSetup() {
        /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on top, use a find and replace
        * to change 'top' to the name of your theme in all the template files.
        */
        load_theme_textdomain( 'top', get_template_directory().'/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
        add_theme_support( 'title-tag' );

        /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
        add_theme_support( 'post-thumbnails' );

        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            ]
        );
    }

    public function addOptionsPages() {
        if( !function_exists( 'acf_add_options_page' ) ) return;

        acf_add_options_page(
            [
                'page_title' => 'Theme settings',
                'menu_title' => 'Theme settings',
                'menu_slug'  => 'top-theme-settings',
                'capability' => 'administrator',
                'redirect'   => false
            ]
        );

        acf_add_options_page(
            [
                'page_title'  => 'Contacts',
                'menu_title'  => 'Contacts',
                'menu_slug'   => 'top-contacts-theme-settings',
                'parent_slug' => 'top-theme-settings',
                'capability'  => 'administrator',
                'redirect'    => false
            ]
        );

        acf_add_options_page(
            [
                'page_title'  => 'Social networks links',
                'menu_title'  => 'Social networks links',
                'menu_slug'   => 'top-social-theme-settings',
                'parent_slug' => 'top-theme-settings',
                'capability'  => 'administrator',
                'redirect'    => false
            ]
        );

        acf_add_options_page(
            [
                'page_title'  => 'Footer',
                'menu_title'  => 'Footer',
                'menu_slug'   => 'top-footer-theme-settings',
                'parent_slug' => 'top-theme-settings',
                'capability'  => 'administrator',
                'redirect'    => false
            ]
        );
    }

}

new Settings();