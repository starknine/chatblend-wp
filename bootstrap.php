<?php
/*
Plugin Name: ChatBlend Live Chat
Plugin URI:  [TODO: Add Plugin Git Repo URL]
Description: ChatBlend Live Chat Wordpress Plugin
Version:     0.1a
Author:      Chris Flynn | Blackstone Media
Author URI:  http://blackstonemedia.com
*/

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

define( 'CB_NAME',                 'ChatBlend Live Chat' );
define( 'CB_REQUIRED_PHP_VERSION', '5.3' );                          // because of get_called_class()
define( 'CB_REQUIRED_WP_VERSION',  '3.1' );                          // because of esc_textarea()

/**
 * Checks if the system requirements are met
 *
 * @return bool True if system requirements are met, false if not
 */
function cb_requirements_met() {
	global $wp_version;
	//require_once( ABSPATH . '/wp-admin/includes/plugin.php' );		// to get is_plugin_active() early

	if ( version_compare( PHP_VERSION, CB_REQUIRED_PHP_VERSION, '<' ) ) {
		return false;
	}

	if ( version_compare( $wp_version, CB_REQUIRED_WP_VERSION, '<' ) ) {
		return false;
	}

	/*
	if ( ! is_plugin_active( 'plugin-directory/plugin-file.php' ) ) {
		return false;
	}
	*/

	return true;
}

/**
 * Prints an error that the system requirements weren't met.
 */
function cb_requirements_error() {
	global $wp_version;

	require_once( dirname( __FILE__ ) . '/views/requirements-error.php' );
}

/*
 * Check requirements and load main class
 * The main program needs to be in a separate file that only gets loaded if the plugin requirements are met. Otherwise older PHP installations could crash when trying to parse it.
 */
if ( cb_requirements_met() ) {
	require_once( __DIR__ . '/classes/cb-module.php' );
	require_once( __DIR__ . '/classes/chatblend.php' );
	require_once( __DIR__ . '/includes/admin-notice-helper/admin-notice-helper.php' );
	require_once( __DIR__ . '/classes/cb-settings.php' );
	

	if ( class_exists( 'ChatBlend' ) ) {
		$GLOBALS['cb'] = ChatBlend::get_instance();
		register_activation_hook(   __FILE__, array( $GLOBALS['cb'], 'activate' ) );
		register_deactivation_hook( __FILE__, array( $GLOBALS['cb'], 'deactivate' ) );
	}
} else {
	add_action( 'admin_notices', 'cb_requirements_error' );
}
