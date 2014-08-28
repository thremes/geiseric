<?php

//* Load main functionality
add_action( 'after_setup_theme', array( 'Gizan34_Main', 'get_instance' ) );

//* Load cleanup functionality
require_once( 'gizan34-cleanup.php' );
add_action( 'after_setup_theme', array( 'Gizan34_Cleanup', 'get_instance' ), 15 );

//* Load later functionality
require_once( 'gizan34-later.php' );
add_action( 'after_setup_theme', array( 'Gizan34_Later', 'get_instance' ), 15 );

//* Load assets functionality
require_once( 'assets/assets.php' );
add_action( 'after_setup_theme', array( 'Gizan34_Assets', 'get_instance' ) );

//* Load shortcode/clip infrastructure
require_once( 'classes/clip.php' );
require_once( 'shortcodes/shortcodes.php' );
new Gizan34_Shortcodes( new Gizan34_Clip_Shortcodes() );

/**
 * Class Gizan34_Main
 */
final class Gizan34_Main
{
    /**
     * The Constructor
     */
    private function __construct()
    {
        //* Add custom background
        add_theme_support( 'custom-background', array(
            'default-color' => 'e3e3e3',
            'default-image' => FALSE,
        ) );

        //* Add custom header
        add_theme_support( 'custom-header', array(
            'default-image'      => '',
            'default-text-color' => '929292',
        ) );
    }

    /**
     * Get the Singleton instance
     */
    function get_instance()
    {
        static $instance;
        if ( !isset( $instance ) ) {
            $instance = new Gizan34_Main();
        }

        return $instance;
    }

}
