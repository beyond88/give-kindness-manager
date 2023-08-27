<?php
namespace GivekindnessManager\Frontend;
use GivekindnessManager\Helpers;
use GivekindnessManager\Service\User; 

/**
 * Shortcode handler class
 */
class MyDashboard {

    /**
     *  Get donor id
     * 
     */
    protected $id;
    
    /**
     * Initializes the class
     */
    public function __construct() {
        $this->id = User::get_user_id();

        add_shortcode( 'give_kindness_manager', [ $this, 'give_kindness_manager_dashboard' ] );
        add_shortcode( 'give_kindness_manager_authentication', [ $this, 'give_kindness_manager_authentication' ] );
    }

    /**
     * Initializes a singleton instance
     *
     * @return \MyDashboard
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Shortcode handler class
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function give_kindness_manager_dashboard( $atts, $content = '' ) {

        ob_start();

            wp_enqueue_style( 'give-styles' );
            wp_enqueue_style( 'give-donation-summary-style-frontend' );
            wp_enqueue_style( 'give-google-font-montserrat' );
            
            if ( is_user_logged_in() && ( User::user_has_role( $this->id, GKM_ROLE[0] ) || User::user_has_role( $this->id, GKM_ROLE[1] )  ) ) {

                give_kindness_manager_templates_part( 'dashboard', self::init() );

            } else {

                if( is_user_logged_in() ) {
                    echo __('You don\'t have permission to access', 'give-kindness-manager');
                } else {
                    give_kindness_manager_templates_part('authentication');
                }

            }
            
        return ob_get_clean();

    }

    /**
     * Get profile details
     *
     * @param  none
     *
     * @return object
     */
    public function profile() {
        $user = new User();
        return $user->user_details( $this->id );
    }

    /**
     * Load authentication form
     *
     * @param  array $atts string $contents
     * @param  string $content
     *
     * @return string
     */
    public function give_kindness_manager_authentication( $atts, $content = '' ) {
        ob_start();
            give_kindness_manager_templates_part('authentication');
        return ob_get_clean();
    }

    /**
     * Load campaigns
     *
     * @param  none
     * @param  string $content
     *
     * @return string
     */
    public function give_kindness_campaigns() {

        if( ! is_user_logged_in() ){
            return NULL;
        }

        $args = [
            'post_type' => 'give_forms',
            'post_status' => [
                'publish', 
                'pending', 
                'draft', 
                'future', 
                'private', 
                'inherit',
                'suspend',
                'reject',
                'approved' 
            ]
        ];

        return Helpers::get_posts( $args );
    }


}
