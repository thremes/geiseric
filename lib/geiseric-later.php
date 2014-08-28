<?php

/**
 * Class Gizan34_Later
 */
final class Gizan34_Later
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
    function get_instance()
    {
        static $instance;
        if ( !isset( $instance ) ) {
            $instance = new Gizan34_Later();
        }

        return $instance;
    }
}
