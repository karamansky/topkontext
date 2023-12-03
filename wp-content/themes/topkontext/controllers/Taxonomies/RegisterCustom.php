<?php namespace TOP\Taxonomies;

if( !defined( 'ABSPATH' ) ) exit;

class RegisterCustom {

    public static $list_of_taxonomies = [
        'review_type' => [ 'Review Types', 'Review Type', 'reviews', 'review-type' ],
    ];

    public function __construct() {
        $this->initHooks();
    }

    public function initHooks() {
        add_action( 'init', [ $this, 'registerCustomTaxonomies' ], 8 );
    }

    public function registerCustomTaxonomies() {
        if( !function_exists( 'register_taxonomy' ) ) return;

        foreach( static::$list_of_taxonomies as $key => $taxonomy ) {
            static::registerCustomTaxonomySingle( $key, $taxonomy[0], $taxonomy[1], $taxonomy[2], $taxonomy[3] );
        }
    }

    static public function registerCustomTaxonomySingle( $taxonomy_name, $label, $singular, $post_types = [], $slug = '' ) {
        $slug = !empty( $slug ) ? $slug : $taxonomy_name;
        $post_types = !empty( $post_types ) ? $post_types : [ "post" ];
        $post_types = is_array( $post_types ) ? $post_types : [ $post_types ];

        $args = [
            "label"                 => __( $singular, "top-theme" ),
            "labels"                => [
                "name"      => __( $label, "top-theme" ),
                "menu_name" => __( $label, "top-theme" ),
            ],
            "public"                => false,
            "publicly_queryable"    => false,
            "hierarchical"          => true,
            "show_ui"               => true,
            "show_in_menu"          => true,
            "show_in_nav_menus"     => true,
            "query_var"             => true,
            "rewrite"               => [ 'slug' => $slug ],
            "show_admin_column"     => false,
            "show_in_rest"          => true,
            "show_tagcloud"         => false,
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "show_in_quick_edit"    => false,
            "show_in_graphql"       => false,
            'meta_box_cb'           => 'post_categories_meta_box'
        ];

        register_taxonomy( $taxonomy_name, $post_types, $args );
    }

}

new RegisterCustom();