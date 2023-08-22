<?php
/**
 * Plugin Name: Give Kindness Manager
 * Description:  
 * Plugin URI: https://github.com/beyond88/give-kindness-manager
 * Author: Mohiuddin Abdul Kader
 * Author URI: https://github.com/beyond88
 * Version: 1.0.0
 * Text Domain:       give-kindness-manager
 * Domain Path:       /languages
 * Requires PHP:      5.6
 * Requires at least: 4.4
 * Tested up to:      5.7
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class Give_Kindness_Manager {

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0.0';

    /**
     * Class constructor
     */
    private function __construct() {
        //REMOVE THIS AFTER DEV
        error_reporting(E_ALL ^ E_DEPRECATED);

        $this->define_constants();

        if (!function_exists('is_plugin_active')) {
            include_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }
        if ( is_plugin_active( 'give/give.php' ) ) {
            register_activation_hook( GIVE_KINDNESS_FILE, [ $this, 'activate' ] );
            add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );

        } else {
            add_action( 'admin_notices', [ $this, 'givewp_plugin_required' ] );
        }

    }

    public function givewp_plugin_required()
    {
        ?>
        <script>
            (function($) {
                'use strict';
                $(document).on("click", '.notice-dismiss', function(){
                    $(this).parent().fadeOut();
                });
            })(jQuery);
        </script>
        <div id="message" class="error notice is-dismissible">
            <p><?php echo __('GiveWP plugin is required for Give_Kindness Manager!', 'give-kindness-manager'); ?></p>
            <button type="button" class="notice-dismiss">
                <span class="screen-reader-text"><?php echo __('Dismiss this notice.', 'give-kindness-manager'); ?></span>
            </button>
        </div>
        <?php
    }

    /**
     * Initializes a singleton instance
     *
     * @return \GivekindnessManager
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'GKM_VERSION', self::version );
        define( 'GKM_FILE', __FILE__ );
        define( 'GKM_PATH', __DIR__ );
        define( 'GKM_TEMPLATES', GKM_PATH . '/includes/Templates/' );
        define( 'GKM_URL', plugins_url( '', GKM_FILE ) );
        define( 'GKM_ASSETS', GKM_URL . '/assets' );
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin() {
        new GivekindnessManager\Assets();

        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
            new GivekindnessManager\Ajax();
        }

        if ( is_admin() ) {
            new GivekindnessManager\Admin();
        } else {
            new GivekindnessManager\Frontend();
        }

        new GivekindnessManager\API();
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() {
        $installer = new GivekindnessManager\Installer();
        $installer->run();
    }
}

/**
 * Initializes the main plugin
 */
function Give_Kindness_Manager() {
    return Give_Kindness_Manager::init();
}

// kick-off the plugin
Give_Kindness_Manager();