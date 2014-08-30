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
        //* Enqueue or dequeue fonts/styles
        add_action( 'wp_enqueue_scripts', array( $this, 'fonts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'styles' ) );

        //* Style Trump
        add_action( 'wp_enqueue_scripts', array( $this, 'style_trump' ), 99 );

        //* Register default headers
        $this->default_headers();

        //* Add editor fonts/styles
        add_editor_style( $this->google_fonts_url() );

        //* Add custom-header fonts/styles
        add_action( 'admin_print_styles-appearance_page_custom-header', array( $this, 'fonts' ) );
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
        wp_enqueue_style( 'geiseric-fonts', $this->google_fonts_url() );
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

    /**
     * Return the Google font stylesheet URL
     *
     * @return string
     */
    private function google_fonts_url()
    {
        /* Translators: If there are characters in your language that are not
         * supported by Dosis, translate this to 'off'. Do not translate
         * into your own language.
         */
        $dosis = _x( 'on', 'Dosis font: on or off', 'geiseric' );

        /* Translators: If there are characters in your language that are not
         * supported by Open+Sans, translate this to 'off'. Do not translate
         * into your own language.
         */
        $open_sans = _x( 'on', 'Open+Sans font: on or off', 'geiseric' );

        if ( 'off' !== $dosis || 'off' !== $open_sans ) {

            $font_families = array();
            if ( 'off' !== $dosis ) $font_families[ ] = 'Dosis:200,400,300';
            if ( 'off' !== $open_sans ) $font_families[ ] = 'Open Sans:300italic,400italic,600italic,700italic,400,600,300,700';

            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            ), '//fonts.googleapis.com/css' );
        }

        return isset( $fonts_url ) ? $fonts_url : FALSE;
    }

}
