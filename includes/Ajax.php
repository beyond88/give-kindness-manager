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
        add_action( 'wp_ajax_get_form_info', array( $this, 'get_form_info') );
        add_action( 'wp_ajax_nopriv_get_form_info', array( $this, 'get_form_info') );
        add_action( 'wp_ajax_campaign_settings_update', array( $this, 'campaign_settings_update') );
        add_action( 'wp_ajax_nopriv_campaign_settings_update', array( $this, 'campaign_settings_update') );

        add_action( 'wp_ajax_campaign_form_template_update', array( $this, 'campaign_form_template_update') );
        add_action( 'wp_ajax_nopriv_campaign_form_template_update', array( $this, 'campaign_form_template_update') );
    }

    /**
     * Update settings
     * 
     */
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

    /**
     * Get template info
     * 
     */
    public function get_form_info() {

        check_ajax_referer( 'give_kindness-manager-nonce', 'security' );
        if( $_POST ) {
            $form_id = wp_unslash( $_POST['form_id'] );
            $tab = wp_unslash( $_POST['tab'] );
            $form_data = [];
            $form_data['tab'] = $tab;
            
            if( $tab == 'give_kindness_manager-form-template' ) {
                
                $form_template = get_post_meta($form_id, '_give_form_template', true );

                $form_info = '';
                if( $form_template == 'sequoia' ) {
                    $form_info = get_post_meta($form_id, '_give_sequoia_form_template_settings', true);
                } else if( $form_template == 'classic' ) {
                    $form_info = get_post_meta($form_id, '_give_classic_form_template_settings', true);
                } else {
                    $form_info = get_post_meta($form_id, '_give_legacy_form_template_settings', true);
                }

                $form_data['form_type'] = $form_template;               
                $form_data['form_info'] = $form_info; 

            } else if( $tab == 'give_kindness_manager-donation-options' ) {

                $donation_option = get_post_meta( $form_id, '_give_price_option', true);
                $recurring_donations = get_post_meta( $form_id, '_give_recurring', true);
                $set_donation = get_post_meta( $form_id, '_give_set_price', true); 
                $custom_amount = get_post_meta( $form_id, '_give_custom_amount', true);
                $custom_amount_range_minimum = get_post_meta( $form_id, '_give_custom_amount_range_minimum', true);
                $custom_amount_range_maximum = get_post_meta( $form_id, '_give_custom_amount_range_maximum', true);
                $custom_amount_text = get_post_meta( $form_id, '_give_custom_amount_text', true);
                $currency_price = get_post_meta( $form_id, '_give_currency_price', true);
                
                $form_data['donation_option'] = $donation_option;
                $form_data['recurring_donations'] = $recurring_donations;
                $form_data['set_donation'] = $set_donation;
                $form_data['custom_amount'] = $custom_amount;
                $form_data['custom_amount_range_minimum'] = $custom_amount_range_minimum;
                $form_data['custom_amount_range_maximum'] = $custom_amount_range_maximum;
                $form_data['custom_amount_text'] = $custom_amount_text;
                $form_data['currency_price'] = $currency_price;

            }
        }
        wp_send_json_success( $form_data );
    }

    /**
     * Update campaign settings
     * 
     */
    public function campaign_settings_update() {
        check_ajax_referer( 'give_kindness-manager-nonce', 'security' );
        if( $_POST ) {
            $form_id = wp_unslash( $_POST['form_id'] );
            $campaign_status = wp_unslash( $_POST['campaign_status'] );
            $cats = wp_unslash( $_POST['cats'] );
            $feature_image_id = wp_unslash( $_POST['feature_image_id'] );

            if( ! empty( $form_id ) ) {
                wp_update_post(array(
                    'ID'    =>  $form_id,
                    'post_status'   =>  $campaign_status
                ));

                wp_set_post_terms( $form_id, $cats, 'give_forms_category' );

                if( ! empty( $feature_image_id ) ) {
                    set_post_thumbnail( $form_id, $feature_image_id );
                }
            }

            wp_send_json_success(['Form updated successfully']);
        }
    }

    /**
     * Update campaign form template
     * 
     */
    public function campaign_form_template_update() {
        check_ajax_referer( 'give_kindness-manager-nonce', 'security' );
        if( $_POST ) {
            $form_id = wp_unslash( $_POST['form_id'] );
            $form_type = wp_unslash( $_POST['form_type'] );
            $form_data = wp_unslash( $_POST['form_data'] );

            if( ! empty( $form_id ) ) {

                if( $form_type == '' ){

                } else if( $form_type == '' ) {

                } else {

                }
                // update_post_meta( $form_id, '_give_form_template', $form_type );
            }

            wp_send_json_success($form_data);
        }
    }
}