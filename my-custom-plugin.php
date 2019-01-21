<?php
/**
 * Plugin Name: My Custom Plugin
 * Author: Cameron Jones
 * Author URI: https://mongoosemarketplace.com
 * Description: Customizes the login page
 * Plugin URI: https://skillshare.com
 * Version: 1.0.0
 * Text Domain: my-custom-plugin
 *
 * @package my-custom-plugin
 */

add_action( 'init', 'my_custom_plugin_register_scripts' );
add_action( 'login_enqueue_scripts', 'my_custom_plugin_enqueue_scripts' );
add_action( 'plugins_loaded', 'my_custom_plugin_load_text_domain' );

add_filter( 'login_headerurl', 'my_custom_plugin_login_headerurl' );
add_filter( 'login_headertitle', 'my_custom_plugin_login_headertitle' );
add_filter( 'login_errors', 'my_custom_plugin_login_errors' );

/**
 * Registers the scripts and styles our plugin will use
 */
function my_custom_plugin_register_scripts() {
	$relative_path = 'css/my-custom-plugin.css';
	wp_register_style( 'my-custom-plugin-css', trailingslashit( plugin_dir_url( __FILE__ ) ) . $relative_path, [], trailingslashit( plugin_dir_path( __FILE__ ) ) . $relative_path );
}

/**
 * Enqueues the scripts and styles for our plugin
 */
function my_custom_plugin_enqueue_scripts() {
	wp_enqueue_style( 'my-custom-plugin-css' );
}

/**
 * Updates the link URL on the login page logo
 *
 * @param string $login_header_url The URL the link goes to.
 * @return string
 */
function my_custom_plugin_login_headerurl( $login_header_url ) {
	$login_header_url = 'https://mongoosemarketplace.com';
	return $login_header_url;
}

/**
 * Updates the link title on the login page logo
 *
 * @param string $login_header_title The link title.
 * @return string
 */
function my_custom_plugin_login_headertitle( $login_header_title ) {
	$login_header_title = __( 'Powered by Mongoose Marketplace', 'my-custom-plugin' );
	return $login_header_title;
}

/**
 * Updates the login error messages
 *
 * @param string $errors The login error message.
 * @return string
 */
function my_custom_plugin_login_errors( $errors ) {
	$errors = __( 'There was a problem logging in with the credentials you provided', 'my-custom-plugin' );
	return $errors;
}

/**
 * Loads the plugin translations
 */
function my_custom_plugin_load_text_domain() {
	load_plugin_textdomain( 'my-custom-plugin', false, basename( plugin_dir_path( __FILE__ ) ) . '/languages/' );
}
