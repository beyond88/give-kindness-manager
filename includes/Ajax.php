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

            $give_kindness_verify_link_content = wp_unslash( $_POST['give_kindness_verify_link_content'] );
            $give_kindness_trust_safety = wp_unslash( $_POST['give_kindness_trust_safety'] );
            $give_kindness_guarantee = wp_unslash( $_POST['give_kindness_guarantee'] );
            $give_kindness_verify_details = wp_unslash( $_POST['give_kindness_verify_details'] );
            $give_kindness_boosting = wp_unslash( $_POST['give_kindness_boosting'] );
            $give_kindness_boosting_popup = wp_unslash( $_POST['give_kindness_boosting_popup'] );

            $settings = get_option('give_settings');

            $settings['give_kindness_verify_link_content'] = $give_kindness_verify_link_content;
            $settings['give_kindness_trust_safety'] = $give_kindness_trust_safety;
            $settings['give_kindness_guarantee'] = $give_kindness_guarantee;
            $settings['give_kindness_verify_details'] = $give_kindness_verify_details;
            $settings['give_kindness_boosting'] = $give_kindness_boosting;
            $settings['give_kindness_boosting_popup'] = $give_kindness_boosting_popup;

            update_option('give_settings', $settings, true);

        }

        // wp_die();
        wp_send_json(['success'=>'Success']);

    }
}