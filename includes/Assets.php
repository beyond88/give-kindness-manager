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
            'give_kindness_manager-jold' => [
                'src'     => GKM_ASSETS . '/js/jquery.jold.paginator.min.js',
                'version' => filemtime( GKM_PATH . '/assets/js/jquery.jold.paginator.min.js' ),
                // 'deps'    => [ 'jquery' ]
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
            
            if ( is_page( 'give-kindness-manager' ) ) {
                wp_enqueue_script( $handle, $script['src'], $deps, $script['version'], true );
            }
        }

        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            //if ( is_page( 'give-kindness-manager' ) ) {
            wp_enqueue_style( $handle, $style['src'], $deps, $style['version'] );
            //}
        }

        wp_localize_script( 'give_kindness_manager-script', 'give_kindness_manager', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce( 'give_kindness-manager-nonce' ),
            'update' => __('Update', 'give-kindness-manager'),
            'processing' => __('Processing', 'give-kindness-manager'),
            'save' => __('Save', 'give-kindness-manager'),
        ] );
    }
}