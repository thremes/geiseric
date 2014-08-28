<?php

/**
 * Class Geiseric_Later
 */
final class Geiseric_Later
{
    /**
     * The Constructor
     */
    function __construct()
    {
        // TODO - Here goes any later functionality of yours...
    }

    /**
     * Get the Singleton instance
     */
    static function get_instance()
    {
        static $instance;
        if ( !isset( $instance ) ) {
            $instance = new Geiseric_Later();
        }

        return $instance;
    }
}
