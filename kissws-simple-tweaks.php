<?php
/**
 * Plugin Name: KISS WS Simple Tweaks
 * Plugin URI: https://kissws.com/plugins/kissws-simple-tweaks/
 * Description: This plugin disables comments, author pages, tag and category archives, date archives, trackbacks, and pingbacks for a simpler WordPress experience. It also includes a "Toggle All" function for easy configuration.
 * Version: 1.1.0
 * Author: James Morris <jmorris@kissws.com>, Google Bard
 * Author URI: https://kissws.com/
 * License: GPLv3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: kisswssimpletweaks
 *
 * This plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Plugin activation hook
register_activation_hook( __FILE__, 'kissws_simple_tweaks_activate' );

function kissws_simple_tweaks_activate() {
	// Include required files
	require_once plugin_dir_path( __FILE__ ) . 'inc/admin-menu.php';
	require_once plugin_dir_path( __FILE__ ) . 'inc/disable-comments.php';
	require_once plugin_dir_path( __FILE__ ) . 'inc/disable-archives.php';
	require_once plugin_dir_path( __FILE__ ) . 'inc/disable-pings.php';

	// Register plugin actions
	add_action( 'after_setup_theme', 'kissws_simple_tweaks_init' );
}

function kissws_simple_tweaks_init() {
	load_plugin_textdomain( 'kisswssimpletweaks', false, plugin_dir_path( __FILE__ ) . 'languages/' );

	// Initialize plugin functionalities
	Kissws_Simple_Tweaks_Admin_Menu::init();
	Kissws_Simple_Tweaks_Disable_Comments::init();
	Kissws_Simple_Tweaks_Disable_Archives::init();
	Kissws_Simple_Tweaks_Disable_Pings::init();

	// Register "Toggle All" function script
	wp_enqueue_script(
		'kissws-simple-tweaks-toggle-all',
		plugin_dir_url( __FILE__ ) . 'js/toggle-all.js',
		array( 'jquery' ),
		'1.1.0',
		true
	);
}

// Create plugin menu
add_action( 'admin_menu', 'kissws_simple_tweaks_admin_menu' );

function kissws_simple_tweaks_admin_menu() {
	add_menu_page(
		'KISS WS Simple Tweaks',
		'KISS WS Simple Tweaks',
		'administrator',
		'kissws-simple-tweaks',
		'Kissws_Simple_Tweaks_Admin_Menu::render_options_page'
	);
}

// Include the required file for the admin menu class
require_once plugin_dir_path( __FILE__ ) . 'inc/admin-menu.php';

// Include necessary CSS files
function kissws_simple_tweaks_enqueue_styles() {
  wp_enqueue_style( 'kissws-simple-tweaks-admin', plugins_url( 'assets/css/style.css', __FILE__ ), array(), '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'kissws_simple_tweaks_enqueue_styles' );


// Define a class for initializing plugin functionalities
class Kissws_Simple_Tweaks {

	public static function init() {
		// Add any specific initialization code here (e.g., hooks for other features)
	}

}