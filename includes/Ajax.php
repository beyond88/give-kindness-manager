<?php
namespace GivekindnessManager;

/**
 * The admin class
 */
class Ajax {

    /**
     * Initialize the class
     */
    public function __construct() {
        add_action( 'wp_ajax_update_settings', array( $this, 'update_settings') );
        add_action( 'wp_ajax_nopriv_update_settings', array( $this, 'update_settings') );
    }

    public function update_settings() {

        check_ajax_referer( 'give_kindness-manager-nonce', 'security' );
        if( $_POST ) {

            $give_kindness_verify_link_content = $_POST['give_kindness_verify_link_content'];
            $give_kindness_trust_safety = $_POST['give_kindness_trust_safety'];
            $give_kindness_guarantee = $_POST['give_kindness_guarantee'];
            $give_kindness_verify_details = $_POST['give_kindness_verify_details'];
            $give_kindness_boosting_popup = $_POST['give_kindness_boosting_popup'];

        }

        // wp_die();
        wp_send_json(['success'=>'Success']);

    }
}