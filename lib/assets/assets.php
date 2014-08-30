<?php

/**
 * Class Geiseric_Assets
 */
final class Geiseric_Assets
{
    /**
     * The Constructor
     */
    private function __construct()
    {
        //* Enqueue/Dequeue fonts and styles
        add_action( 'wp_enqueue_scripts', array( $this, 'fonts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'styles' ) );

        //* Style Trump
        add_action( 'wp_enqueue_scripts', array( $this, 'style_trump' ), 99 );

        //* Register default headers
        $this->default_headers();
    }

    /**
     * Get the Singleton instance
     */
    static function get_instance()
    {
        static $instance;
        if ( !isset( $instance ) ) {
            $instance = new Geiseric_Assets();
        }

        return $instance;
    }

    /**
     * Enqueue Fonts
     */
    function fonts()
    {
        wp_dequeue_style( 'kuorinka-fonts' );

        $dosis     = 'Dosis:200,400,300';
        $open_sans = 'Open+Sans:400,300,400italic,600,600italic,700,700italic';
        wp_enqueue_style( 'geiseric-fonts', "//fonts.googleapis.com/css?family={$dosis}|{$open_sans}" );
    }

    /**
     * Enqueue Styles
     */
    function styles()
    {
        $this->enqueue_style( 'geiseric-base', 'base.css', array( 'kuorinka-style' ) );
    }

    /**
     * Style Trump
     */
    function style_trump()
    {
        wp_dequeue_style( 'kuorinka-child-style' );
        wp_enqueue_style( 'kuorinka-child-style' );
    }

    /**
     * Register Default Headers
     */
    function default_headers()
    {
        register_default_headers( array(
            'header-01' => array(
                'url'           => '%2$s/lib/assets/images/headers/header-01.jpg',
                'thumbnail_url' => '%2$s/lib/assets/images/headers/header-01-thumb.jpg'
            ),
            'header-02' => array(
                'url'           => '%2$s/lib/assets/images/headers/header-02.jpg',
                'thumbnail_url' => '%2$s/lib/assets/images/headers/header-02-thumb.jpg'
            )
        ) );
    }

    /**
     * Enqueue Style
     *
     * @param        $handle
     * @param        $src
     * @param array  $deps
     * @param string $media
     */
    private function enqueue_style( $handle, $src, $deps = array(), $media = 'all' )
    {
        if ( file_exists( trailingslashit( get_stylesheet_directory() ) . "lib/assets/css/{$src}" ) ) {
            $src = trailingslashit( get_stylesheet_directory_uri() ) . "lib/assets/css/{$src}";
            wp_enqueue_style( $handle, $src, $deps, FALSE, $media );
        }
    }

}
