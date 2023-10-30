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

        add_action( 'wp_ajax_update_donation_options', array( $this, 'update_donation_options') );
        add_action( 'wp_ajax_nopriv_update_donation_options', array( $this, 'update_donation_options') );
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

            if( ! empty( $form_id ) && intval( $form_id ) ) {

                update_post_meta( $form_id, '_give_form_template', $form_type);

                if( $form_type == 'sequoia' ){

                    $google_fonts = $form_data['google_fonts'];
                    $decimals_enabled = $form_data['decimals_enabled'];
                    $introduction_enabled = $form_data['introduction_enabled'];
                    $introduction_headline = $form_data['introduction_headline'];
                    $introduction_description = $form_data['introduction_description'];
                    $image = $form_data['image'];
                    $donate_label = $form_data['donate_label'];

                    $payment_header_label = $form_data['payment_header_label'];
                    $payment_content = $form_data['payment_content'];
                    $next_label = $form_data['next_label'];

                    $payment_info_header_label = $form_data['payment_info_header_label'];
                    $payment_info_headline = $form_data['payment_info_headline'];
                    $payment_info_descritpion = $form_data['payment_info_descritpion'];
                    $donation_summary_enabled = $form_data['donation_summary_enabled'];
                    $donation_summary_heading = $form_data['donation_summary_heading'];
                    $donation_summary_location = $form_data['donation_summary_location'];
                    $checkout_label = $form_data['checkout_label'];

                    $ty_headline = $form_data['ty_headline'];
                    $ty_description = $form_data['ty_description'];
                    $ty_sharing = $form_data['ty_sharing'];
                    $ty_sharing_instructions = $form_data['ty_sharing_instructions'];
                    $ty_twitter_message = $form_data['ty_twitter_message'];

                    $settings = give_get_meta( $form_id, '_give_sequoia_form_template_settings', true);

                    // $settings['visual_appearance']['primary_color'] = '';
                    $settings['visual_appearance']['google-fonts'] = $google_fonts;
                    $settings['visual_appearance']['decimals_enabled'] = $decimals_enabled;
                    $settings['introduction']['enabled'] = $introduction_enabled;
                    $settings['introduction']['headline'] = $introduction_headline;
                    $settings['introduction']['description'] = $introduction_description;
                    $settings['introduction']['image'] = $image;
                    $settings['introduction']['donate_label'] = $donate_label;
                    
                    $settings['payment_information']['donation_summary_enabled'] = $donation_summary_enabled;
                    $settings['payment_information']['donation_summary_heading'] = $donation_summary_heading;
                    $settings['payment_information']['donation_summary_location'] = $donation_summary_location;
                    $settings['payment_information']['header_label'] = $payment_info_header_label;
                    $settings['payment_information']['headline'] = $payment_info_headline;
                    $settings['payment_information']['description'] = $payment_info_descritpion;
                    $settings['payment_information']['checkout_label'] = $checkout_label;

                    $settings['payment_amount']['header_label'] = $payment_header_label;
                    $settings['payment_amount']['content'] = $payment_content;
                    $settings['payment_amount']['next_label'] = $next_label;

                    $settings['thank-you']['headline'] = $ty_headline;
                    $settings['thank-you']['description'] = $ty_description;
                    $settings['thank-you']['sharing'] = $ty_sharing;
                    $settings['thank-you']['sharing_instruction'] = $ty_sharing_instructions;
                    $settings['thank-you']['twitter_message'] = $ty_twitter_message;

                    give_update_meta( $form_id, '_give_checkout_label', $checkout_label );
                    give_update_meta( $form_id, '_give_sequoia_form_template_settings', $settings );

                } else if( $form_type == 'classic' ) {

                    $container_style = $form_data['container_style'];
                    $primary_font = $form_data['primary_font'];
                    $display_header = $form_data['display_header'];
                    $main_heading = $form_data['main_heading'];
                    $main_description = $form_data['main_description'];
                    $secure_badge = $form_data['secure_badge'];
                    $secure_badge_text = $form_data['secure_badge_text'];
                    $da_headline = $form_data['da_headline'];
                    $da_description = $form_data['da_description'];
                    $di_headline = $form_data['di_headline'];
                    $di_description = $form_data['di_Description'];
                    $pm_headline = $form_data['pm_headline'];
                    $pm_description = $form_data['pm_description'];
                    $donation_summary_enabled = $form_data['donation_summary_enabled'];
                    $donation_summary_heading = $form_data['donation_summary_heading'];
                    $donation_summary_location = $form_data['donation_summary_location'];
                    $ty_headline = $form_data['ty_headline'];
                    $ty_description = $form_data['ty_description'];
                    $ty_social_sharing = $form_data['ty_social_sharing'];
                    $ty_sharing_instructions = $form_data['ty_sharing_instructions'];
                    $ty_twitter_message = $form_data['ty_twitter_message'];
                    
                    $settings = give_get_meta( $form_id, '_give_classic_form_template_settings', true);

                    $settings['visual_appearance']['container_style'] = $container_style;
                    $settings['visual_appearance']['primary_font'] = $primary_font;
                    $settings['visual_appearance']['display_header'] = $display_header;
                    $settings['visual_appearance']['main_heading'] = $main_heading;
                    $settings['visual_appearance']['description'] = $main_description;
                    $settings['visual_appearance']['secure_badge'] = $secure_badge;
                    $settings['visual_appearance']['secure_badge_text'] = $secure_badge_text;

                    $settings['donation_amount']['headline'] = $da_headline;
                    $settings['donation_amount']['description'] = $da_description;

                    $settings['donor_information']['headline'] = $di_headline;
                    $settings['donor_information']['description'] = $di_description;

                    $settings['payment_information']['headline'] = $pm_headline;
                    $settings['payment_information']['description'] = $pm_description;
                    $settings['payment_information']['donation_summary_enabled'] = $donation_summary_enabled;
                    $settings['payment_information']['donation_summary_heading'] = $donation_summary_heading;
                    $settings['payment_information']['donation_summary_location'] = $donation_summary_location;

                    $settings['donation_receipt']['headline'] = $ty_headline;
                    $settings['donation_receipt']['description'] = $ty_description;
                    $settings['donation_receipt']['social_sharing'] = $ty_social_sharing;
                    $settings['donation_receipt']['sharing_instructions'] = $ty_sharing_instructions;
                    $settings['donation_receipt']['twitter_message'] = $ty_twitter_message;

                    give_update_meta( $form_id, '_give_classic_form_template_settings', $settings );

                } else {

                    $checkout_label = $form_data['checkout_label'];
                    $content_placement = $form_data['content_placement'];
                    $display_content = $form_data['display_content'];
                    $display_style = $form_data['display_style'];
                    $form_floating_labels = $form_data['form_floating_labels'];
                    $legacy_display_settings_form_content = $form_data['legacy_display_settings_form_content'];
                    $payment_display = $form_data['payment_display'];
                    $reveal_label = $form_data['reveal_label'];

                    $settings = give_get_meta( $form_id, '_give_legacy_form_template_settings', true);

                    $settings['display_settings']['display_style'] = $display_style;
                    $settings['display_settings']['payment_display'] = $payment_display;
                    $settings['display_settings']['reveal_label'] = $reveal_label;
                    $settings['display_settings']['checkout_label'] = $checkout_label;
                    $settings['display_settings']['form_floating_labels'] = $form_floating_labels;
                    $settings['display_settings']['display_content'] = $display_content;
                    $settings['display_settings']['content_placement'] = $content_placement;
                    $settings['display_settings']['form_content'] = $legacy_display_settings_form_content;

                    give_update_meta( $form_id, '_give_checkout_label', $checkout_label );
                    give_update_meta( $form_id, '_give_display_style', $display_style );
                    give_update_meta( $form_id, '_give_payment_display', $payment_display );
                    give_update_meta( $form_id, '_give_reveal_label', $reveal_label );
                    give_update_meta( $form_id, '_give_form_floating_labels', $form_floating_labels );
                    give_update_meta( $form_id, '_give_display_content', $display_content );
                    give_update_meta( $form_id, '_give_content_placement', $content_placement );
                    give_update_meta( $form_id, '_give_form_content', $legacy_display_settings_form_content );
                    give_update_meta( $form_id, '_give_legacy_form_template_settings', $settings );

                }

            }

            wp_send_json_success(['success'=> true]);
        }
    }

    /**
     * Update donation options
     * 
     */
    public function update_donation_options() {

        check_ajax_referer( 'give_kindness-manager-nonce', 'security' );
        if( $_POST ) {
            $form_id = wp_unslash( $_POST['form_id'] );
            $form_data = wp_unslash( $_POST['form_data'] );

            $_give_price_option = $form_data['_give_price_option'];
            $_give_recurring = $form_data['_give_recurring'];
            $_give_period_functionality = $form_data['_give_period_functionality'];
            $_give_period_interval = $form_data['_give_period_interval'];
            $_give_period = $form_data['_give_period'];
            $_give_times = $form_data['_give_times'];
            $_give_set_price = $form_data['_give_set_price'];
            $_give_checkbox_default = $form_data['_give_checkbox_default'];
            $_give_custom_amount = $form_data['_give_custom_amount'];
            $_give_custom_amount_range_give_donation_limit_minimum = $form_data['_give_custom_amount_range_give_donation_limit_minimum'];
            $_give_custom_amount_range_give_donation_limit_maximum = $form_data['_give_custom_amount_range_give_donation_limit_maximum'];
            $_give_custom_amount_text = $form_data['_give_custom_amount_text'];
            $_give_currency_price = $form_data['_give_currency_price'];

            give_update_meta( $form_id, '_give_price_option', $_give_price_option );
            give_update_meta( $form_id, '_give_recurring', $_give_recurring );
            give_update_meta( $form_id, '_give_period_functionality', $_give_period_functionality );
            give_update_meta( $form_id, '_give_period_interval', $_give_period_interval );
            give_update_meta( $form_id, '_give_period', $_give_period );
            give_update_meta( $form_id, '_give_times', $_give_times );
            give_update_meta( $form_id, '_give_set_price', $_give_set_price );
            give_update_meta( $form_id, '_give_checkbox_default', $_give_checkbox_default );
            give_update_meta( $form_id, '_give_custom_amount', $_give_custom_amount );
            give_update_meta( $form_id, '_give_custom_amount_range_minimum', $_give_custom_amount_range_give_donation_limit_minimum );
            give_update_meta( $form_id, '_give_custom_amount_range_maximum', $_give_custom_amount_range_give_donation_limit_maximum );
            give_update_meta( $form_id, '_give_custom_amount_text', $_give_custom_amount_text );
            give_update_meta( $form_id, '_give_currency_price', $_give_currency_price );
        }

        wp_send_json_success(['success'=> true]);

    }
}