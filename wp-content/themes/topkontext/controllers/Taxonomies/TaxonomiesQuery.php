<?php namespace TOP\Taxonomies;

if( !defined( 'ABSPATH' ) ) exit;

class TaxonomiesQuery {

    public static function getTerms( $taxonomy ) {
        return get_terms( [
            'taxonomy' => $taxonomy,
        ] );
    }

}

class_alias( 'TOP\Taxonomies\TaxonomiesQuery', 'TaxonomiesQuery' );