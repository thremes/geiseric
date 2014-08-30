<?php

//* Load main functionality
add_action( 'after_setup_theme', array( 'Geiseric_Main', 'get_instance' ) );

//* Load assets functionality
require_once( 'assets/assets.php' );
add_action( 'after_setup_theme', array( 'Geiseric_Assets', 'get_instance' ) );

/**
 * Class Geiseric_Main
 */
final class Geiseric_Main
{
    /**
     * The Constructor
     */
    private function __construct()
    {
        $child_dir_uri = trailingslashit( get_stylesheet_directory_uri() );

        //* Add custom background
        add_theme_support( 'custom-background', array(
            'default-color' => 'fff',
            'default-image' => "{$child_dir_uri}lib/assets/images/backgrounds/binding_light.png",
        ) );

        //* Add custom header
        add_theme_support( 'custom-header', array(
            'default-image'      => "{$child_dir_uri}lib/assets/images/headers/header-01.jpg",
            'default-text-color' => '69675b',
        ) );
    }

    /**
     * Get the Singleton instance
     */
    static function get_instance()
    {
        static $instance;
        if ( !isset( $instance ) ) {
            $instance = new Geiseric_Main();
        }

        return $instance;
    }

}
