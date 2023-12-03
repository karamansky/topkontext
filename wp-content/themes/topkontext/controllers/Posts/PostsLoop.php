<?php namespace TOP\Posts;

if( !defined( 'ABSPATH' ) ) exit;

class PostsLoop {

    public static $per_page = 10;

    public static function getPostsLoop( $post_type = 'post', $taxonomies = [], $page = 1, $per_page = 0, $params = [] ) {
        $per_page = !empty( $per_page ) ? $per_page : static::$per_page;
        $offset = ( intval( $page ) - 1 ) * $per_page;

        $args = [
            'post_status'    => 'publish',
            'post_type'      => $post_type,
            'posts_per_page' => $per_page,
            'offset'         => $offset,
        ];

        if( !empty( $params ) ) {
			$args = array_merge($args, $params);
        }

        if( !empty( $taxonomies ) ) {
            $args['tax_query'] = $taxonomies;
        }

        if( is_single() ) {
            global $post;

            $current_post_type = get_post_type( $post );
            if( $post_type == $current_post_type ) $args['exclude'] = $post->ID;
        }

        return get_posts( $args );
    }

    public static function getWpQuery( $post_type = 'post', $taxonomies = [], $page = 1, $per_page = 0, $offset = 0 ) {
        $per_page = !empty( $per_page ) ? $per_page : static::$per_page;
        $offset = !empty( $offset ) ? $offset : ( intval( $page ) - 1 ) * $per_page;

        $args = [
            'post_status'    => 'publish',
            'post_type'      => $post_type,
            'posts_per_page' => $per_page,
            'offset'         => $offset
        ];

        if( !empty( $taxonomies ) ) {
            $args['tax_query'] = [$taxonomies];
        }

        if( is_single() ) {
            global $post;

            $current_post_type = get_post_type( $post );
            if( $post_type == $current_post_type ) $args['exclude'] = $post->ID;
        }

        return new \WP_Query( $args );
    }

    public static function prepareTaxonomiesForQuery( $taxonomies ) {
        $data = [ 'relation' => 'AND' ];
        foreach( $taxonomies as $taxonomy_key => $taxonomy ) {
            $data[] = [
                'field'            => 'id',
                'include_children' => false,
                'taxonomy'         => $taxonomy_key,
                'terms'            => $taxonomy,
            ];
        }

        return $data;
    }

}

class_alias( 'TOP\Posts\PostsLoop', 'PostsLoop' );
