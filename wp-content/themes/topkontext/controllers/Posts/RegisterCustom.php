<?php namespace TOP\Posts;

if( !defined( 'ABSPATH' ) ) exit;

class RegisterCustom {

    public function __construct() {
        $this->initHooks();
    }

    public function initHooks() {
        add_action( 'init', [ $this, 'registerCustomPostTypes' ], 9 );
    }

    public function registerCustomPostTypes() {
        if( !function_exists( 'register_post_type' ) ) return;

        static::registerCustomPostTypeSingle( 'reviews', 'Reviews', 'Review', 'reviews' );
        static::registerCustomPostTypeSingle( 'portfolio', 'Portfolio', 'Portfolio', 'portfolio' );
    }

    static public function registerCustomPostTypeSingle( $type_name, $label, $singular, $slug = '', $supports = [] ) {
        $slug = !empty( $slug ) ? $slug : $type_name;
        $supports = !empty( $supports ) ? $supports : [ "title", "editor", "excerpt", "thumbnail", "author", "page-attributes" ];

        $args = [
            "label"               => __( $label, "top" ),
            "labels"              => [
                "name"          => __( $label, "top" ),
                "singular_name" => __( $singular, "top" ),
            ],
            "description"         => "",
            "public"              => true,
            "publicly_queryable"  => true,
            "show_ui"             => true,
            "has_archive"         => false,
            "show_in_menu"        => true,
            "show_in_rest"        => true, // To use Gutenberg editor.
            "show_in_nav_menus"   => true,
            "menu_icon"           => "dashicons-format-aside",
            "delete_with_user"    => false,
            "exclude_from_search" => false,
            "capability_type"     => "page",
            "hierarchical"        => false,
            "rewrite"             => [ "slug" => $slug ],
            "query_var"           => true,
            "supports"            => $supports
        ];

        register_post_type( $type_name, $args );
    }

}

new RegisterCustom();