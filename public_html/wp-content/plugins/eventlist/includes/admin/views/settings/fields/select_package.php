<?php if ( !defined( 'ABSPATH' ) ) exit();

// Get full list page
if ( ! function_exists( 'el_get_package_pages' ) ) {

	function el_get_package_pages() {
		global $wpdb;
		$sql   = $wpdb->prepare( "
			SELECT ID, post_title FROM $wpdb->posts
			WHERE $wpdb->posts.post_type = %s AND $wpdb->posts.post_status = %s
			GROUP BY $wpdb->posts.post_name
			", 'package', 'publish' );
		$pages = $wpdb->get_results( $sql );

		return apply_filters( 'el_get_package_pages', $pages );
	}
}

// Get dropdown pages
if ( ! function_exists( 'el_dropdown_package_pages' ) ) {

	function el_dropdown_package_pages() {
		
		$list_page = el_get_package_pages();

		$list_page_arr[''] = __( '--- Select page ---', 'eventlist' );
		
		if( $list_page ){

			foreach ( $list_page as $id => $value_page ) {
				$package_id = get_post_meta( $value_page->ID,  OVA_METABOX_EVENT.'package_id', true );
				$list_page_arr[$package_id] = $value_page->post_title;
			}
		}
		
		return apply_filters( 'el_dropdown_package_pages', $list_page_arr );
	}

}

$multiple = false;
if ( isset( $field['atts'], $field['atts']['multiple'] ) && $field['atts']['multiple'] ) {
	$multiple = true;
}
?>

<select name="<?php echo esc_attr( $this->get_field_name( $field['name'] ) ) . ( $multiple ? '[]' : '' ) ?>"<?php echo $this->render_atts( $field['atts'] ) ?> >
	
	<?php
	// $field['options'] = el_dropdown_pages();
	?>

	<?php if ( el_dropdown_package_pages() ): ?>

		<?php foreach ( el_dropdown_package_pages() as $key => $value ): ?>

			<?php
			$val = $this->get( $field['name'] );
			if ( empty( $val ) && isset( $field['default'] ) ) {
				$val = $field['default'];
			}
			?>

			<?php if ( $multiple ): ?>
				<!--Multi select-->
				<option value="<?php echo esc_attr( $key ) ?>"<?php echo in_array( $key, $val ) ? ' selected="selected"' : '' ?>><?php printf( '%s', $value ) ?></option>
				<?php else: ?>
					<option value="<?php echo esc_attr( $key ) ?>"<?php echo $val == $key ? ' selected="selected"' : '' ?>><?php printf( '%s', $value ) ?></option>
				<?php endif; ?>

			<?php endforeach; ?>

		<?php endif; ?>

	</select>