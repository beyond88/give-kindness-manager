<?php
namespace GivekindnessManager\Service;
use GivekindnessManager\Helpers;

/**
 * Shortcode handler class
 */
class User {

    public function __construct() {

    }

    /**
     * Get user id
     * 
     */
    public static function get_user_id() {
        return get_current_user_id();
    }

    /**
     * Get user details
     * 
     */
    public function user_details( $user_id ) {
        if( empty( $user_id ) ) {
            return [];
        }

        return get_userdata( $user_id );
    }

    /**
     * Get user role
     * 
     */
    public static function user_has_role( $user_id, $target_role ) {
        if( empty( $user_id ) ) {
            return false;
        }

        $user_meta = get_userdata( $user_id );
        $user_roles = $user_meta->roles;
        return in_array( $target_role, $user_roles );
    }

}