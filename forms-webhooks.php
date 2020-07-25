<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by KCMS to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/kubeecms/forms-webhooks/
 * @since             1.3
 * @package           forms-webhooks
 *
 * @wordpress-plugin
 * Plugin Name: Forms Webhooks
 * Plugin URI: https://github.com/KubeeCMS/Forms-Webhooks
 * Description: Integrates Forms with third party services using custom webhooks.
 * Version: 1.3
 * Author: Kubee CMS
 * Author URI: https://github.com/KubeeCMS/
 * License: GNU GENERAL PUBLIC LICENSE
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gravityformswebhooks
 * Domain Path:       /languages
 */



defined( 'ABSPATH' ) || die();

define( 'GF_WEBHOOKS_VERSION', '1.3' );

// If Forms is loaded, bootstrap the Webhooks Add-On.
add_action( 'gform_loaded', array( 'GF_Webhooks_Bootstrap', 'load' ), 5 );

/**
 * Class GF_Webhooks_Bootstrap
 *
 * Handles the loading of the Webhooks Add-On and registers with the Add-On Framework.
 */
class GF_Webhooks_Bootstrap {

	/**
	 * If the Feed Add-On Framework exists, Webhooks Add-On is loaded.
	 *
	 * @access public
	 * @static
	 */
	public static function load() {

		if ( ! method_exists( 'GFForms', 'include_feed_addon_framework' ) ) {
			return;
		}

		require_once( 'class-gf-webhooks.php' );

		GFAddOn::register( 'GF_Webhooks' );

	}

}

/**
 * Returns an instance of the GF_Webhooks class
 *
 * @see    GF_Webhooks::get_instance()
 * @return object GF_Webhooks
 */
function gf_webhooks() {
	return GF_Webhooks::get_instance();
}
