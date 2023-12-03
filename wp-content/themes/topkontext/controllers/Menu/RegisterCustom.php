<?php namespace TOP\Menu;

if( !defined( 'ABSPATH' ) ) exit;

class RegisterCustom {

    public function __construct() {
        $this->initHooks();
    }

    public function initHooks() {
        add_action( 'after_setup_theme', [ $this, 'registerCustomMenuLocations' ] );
    }

    public function registerCustomMenuLocations() {
        register_nav_menus( [
            'primary-menu'     => 'Primary menu',
            'footer-menu'      => 'Footer menu',
        ] );
    }

}

new RegisterCustom();