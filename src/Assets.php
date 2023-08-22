<?php

namespace GivekindnessManager;
use GivekindnessManager\Helpers;

/**
 * Assets handlers class
 */
class Assets {

    /**
     * Class constructor
     */
    function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'register_assets' ] );
    }

    /**
     * All available scripts
     *
     * @return array
     */
    public function get_scripts() {
        return [
            'give_kindness_manager-script' => [
                'src'     => GKM_ASSETS . '/js/frontend.js',
                'version' => filemtime( GKM_PATH . '/assets/js/frontend.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'give_kindness_manager-admin-script' => [
                'src'     => GKM_ASSETS . '/js/admin.js',
                'version' => filemtime( GKM_PATH . '/assets/js/admin.js' ),
                'deps'    => [ 'jquery', 'wp-util' ]
            ],
        ];
    }

    /**
     * All available styles
     *
     * @return array
     */
    public function get_styles() {
        return [
            'give_kindness_manager-style' => [
                'src'     => GKM_ASSETS . '/css/frontend.css',
                'version' => filemtime( GIVE_KINDNESS_PATH . '/assets/css/frontend.css' )
            ],
            'give_kindness_manager-admin-style' => [
                'src'     => GKM_ASSETS . '/css/admin.css',
                'version' => filemtime( GKM_PATH . '/assets/css/admin.css' )
            ],
        ];
    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function register_assets() {

        wp_enqueue_media();
        
        $scripts = $this->get_scripts();
        $styles  = $this->get_styles();

        foreach ( $scripts as $handle => $script ) {
            $deps = isset( $script['deps'] ) ? $script['deps'] : false;

            wp_enqueue_script( $handle, $script['src'], $deps, $script['version'], true );
        }

        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_enqueue_style( $handle, $style['src'], $deps, $style['version'] );
        }

        wp_localize_script( 'give_kindness-admin-script', 'give-kindness-manager', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce( 'give_kindness-admin-nonce' ),
            'confirm' => __( 'Are you sure?', 'give-kindness-manager' ),
            'error' => __( 'Something went wrong', 'give-kindness-manager' ),
            'apiNonce' => wp_create_nonce('wp_rest'),
            'siteURL' => site_url('/'),
            'giveApiURL' => site_url('/wp-json/give-api/v2/'),
            'giveKindnessApiURL' => site_url('/wp-json/give-kindness/v1/'),
            'userId' => get_current_user_id(),
            'updateProfile' => __('Update Profile', 'give-kindness-manager'),
            'updating' => __('Updating...', 'give-kindness-manager'),
            'updated' => __('Updated', 'give-kindness-manager'),
            'logOutMsg' => __('Are you sure you want to logout?', 'give-kindness-manager'),
            'yes' => __('Yes', 'give-kindness-manager'),
            'neverMind' => __('Nevermind', 'give-kindness-manager'),
            'emailNotValid' => __('Email not valid!', 'give-kindness-manager'),
            'passwordLength' => __('Password length minimum 6 character!', 'give-kindness-manager'),
            'pleaseWait' => __('Please wait!', 'give-kindness-manager'),
            'sendAgain' => __('Send again', 'give-kindness-manager'),
            'pleaseCheckEmail' => 'Please your email inbox. An email has been sent.',
            'saveDraft' => __('Save draft', 'give-kindness-manager'),
            'submitForApproval' => __('Submit for approval', 'give-kindness-manager'),
            'signUp' => __('Sign Up', 'give-kindness-manager'),
            'saveSeeCampaign' => __('Save and see my campaign', 'give-kindness-manager'),
            'deleteMsg' => __('Want to delete this campaign?', 'give-kindness-manager'),
            'inValidEmail' => __('Invalid email!', 'give-kindness-manager'),
            'save' => __('Save', 'give-kindness-manager'),
        ] );
    }
}