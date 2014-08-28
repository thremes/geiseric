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

        //* Register default background/headers
        $this->default_headers();
    }

    /**
     * Get the Singleton instance
     */
    function get_instance()
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

        $source_sans_pro  = 'Source Sans Pro:400,600,700,400italic,600italic,700italic';
        $roboto_condensed = 'Roboto Condensed:300,400,700,300italic,400italic,700italic';
        wp_enqueue_style( 'geiseric-fonts', "//fonts.googleapis.com/css?family={$source_sans_pro}|{$roboto_condensed}" );
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
            'sample-01' => array(
                'url'           => '%2$s/lib/assets/images/headers/sample.png',
                'thumbnail_url' => '%2$s/lib/assets/images/headers/sample-thumb.png'
            ),
            'sample-02' => array(
                'url'           => '%2$s/lib/assets/images/headers/sample.png',
                'thumbnail_url' => '%2$s/lib/assets/images/headers/sample-thumb.png'
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
