<?php namespace TOP\Menu;

if( !defined( 'ABSPATH' ) ) exit;

class MenuDisplay {

    public static function getMainMenuItems( $menu = 'main_primary' ) {
        $locations = get_nav_menu_locations();
        if( empty( $locations[ $menu ] ) ) return false;

        $menu_items = wp_get_nav_menu_items( $locations[ $menu ] );

        if( empty( $menu_items ) ) return false;

        $prepared_data = [];
        // Prepare first menu level items
        foreach( $menu_items as $key => $menu_item ) {
            if( !empty( $menu_item->menu_item_parent ) ) continue;

            $prepared_data[ $menu_item->ID ]['item'] = $menu_item;
            unset( $menu_items[ $key ] );
        }

        if( empty( $menu_items ) ) return $prepared_data;

        $second_level = [];
        // Prepare second menu level items
        foreach( $menu_items as $key => $menu_item ) {
            if( empty( $prepared_data[ $menu_item->menu_item_parent ] ) ) continue;

            $second_level[ $menu_item->ID ]['item'] = $menu_item;
            unset( $menu_items[ $key ] );
        }

        if( !empty( $menu_items ) ) {
            // Prepare third menu level items
            foreach( $menu_items as $key => $menu_item ) {
                $second_level[ $menu_item->menu_item_parent ]['childs'][ $menu_item->ID ] = $menu_item;
            }
        }

        // Add second and third menu level items
        foreach( $second_level as $key => $menu_item ) {
            $prepared_data[ $menu_item['item']->menu_item_parent ]['childs'][ $menu_item['item']->ID ] = $menu_item;
        }

        return $prepared_data;
    }

}

class_alias( 'TOP\Menu\MenuDisplay', 'MenuDisplay' );