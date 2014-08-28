<?php

//* Load main functionality
add_action( 'after_setup_theme', array( 'Geiseric_Main', 'get_instance' ) );

//* Load cleanup functionality
require_once( 'geiseric-cleanup.php' );
add_action( 'after_setup_theme', array( 'Geiseric_Cleanup', 'get_instance' ), 15 );

//* Load later functionality
require_once( 'geiseric-later.php' );
add_action( 'after_setup_theme', array( 'Geiseric_Later', 'get_instance' ), 15 );

//* Load assets functionality
require_once( 'assets/assets.php' );
add_action( 'after_setup_theme', array( 'Geiseric_Assets', 'get_instance' ) );

//* Load shortcode/clip infrastructure
require_once( 'classes/clip.php' );
require_once( 'shortcodes/shortcodes.php' );
new Geiseric_Shortcodes( new Geiseric_Clip_Shortcodes() );

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
        //* Add custom background
        add_theme_support( 'custom-background', array(
            'default-color' => 'fff',
            'default-image'    => '%2$s/lib/assets/images/backgrounds/binding_light.png',
        ) );

        //* Add custom header
        add_theme_support( 'custom-header', array(
            'default-image'      => '',
            'default-text-color' => '69675b',
        ) );
    }

    /**
     * Get the Singleton instance
     */
    function get_instance()
    {
        static $instance;
        if ( !isset( $instance ) ) {
            $instance = new Geiseric_Main();
        }

        return $instance;
    }

}
