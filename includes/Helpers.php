<?php
namespace GivekindnessManager;

class Helpers {

    /**
    * Display posts
    *
    *@param string integer
    *@return array | object
    */
    public static function get_posts( $args ) {
        
        $posts = new \WP_Query( $args );
        return $posts; 

    }

    public static function get_give_settings() {
        //return give_get_option( 'give_settings', give_get_default_settings() );
        // return get_option('');
    }

}