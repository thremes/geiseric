<?php

/**
 * Class Gizan34_Cleanup
 */
final class Gizan34_Cleanup
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
            $instance = new Gizan34_Cleanup();
        }

        return $instance;
    }

}
