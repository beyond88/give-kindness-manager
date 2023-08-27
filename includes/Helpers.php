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
    
}