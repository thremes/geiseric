<?php

/**
 * Class Geiseric_Cleanup
 */
final class Geiseric_Cleanup
{
    /**
     * The Constructor
     */
    private function __construct()
    {
        // TODO - Here goes any cleanup functionality of yours...
    }

    /**
     * Get the Singleton instance
     */
    function get_instance()
    {
        static $instance;
        if ( !isset( $instance ) ) {
            $instance = new Geiseric_Cleanup();
        }

        return $instance;
    }

}
