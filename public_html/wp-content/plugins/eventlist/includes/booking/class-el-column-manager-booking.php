<?php
defined( 'ABSPATH' ) || exit();

if( !class_exists( 'EL_Column_booking_Manager' ) ){

	class EL_Column_booking_Manager{

		public function __construct(){
			add_action( 'manage_el_bookings_posts_custom_column', array( $this, 'event_bookings_posts_custom_column' ), 10, 2  );
			add_filter( 'manage_edit-el_bookings_sortable_columns', array( $this, 'posts_column_register_sortable') , 10 ,1 );
			add_filter( 'manage_edit-el_bookings_columns',array($this, 'event_bookings_replace_column_title_method_a' ) );

			add_action( 'pre_get_posts', array( $this, 'el_manage_bookings_column_data' ), 99 );
			
			

		}

		public function el_manage_bookings_column_data ( $query ) {
			
			if ( isset( $_GET['post_type'] ) && 'el_bookings' == $_GET['post_type'] && is_admin() && !isset( $_GET['action'] ) && !isset( $_GET['post_status'] ) ) {
				
				switch ( apply_filters( 'el_manage_bookings_show_status_admin', '' ) ) {

					case 'Completed':
						$query->set( 'meta_key',  OVA_METABOX_EVENT . 'status' );
						$query->set( 'meta_value',  'Completed' );
						$query->set( 'meta_compare',  '=' );
						break;

					case 'Pending':
						$query->set( 'meta_key',  OVA_METABOX_EVENT . 'status' );
						$query->set( 'meta_value',  'Pending' );
						$query->set( 'meta_compare',  '=' );
						break;	
					
					default:
						break;
				}

				
			
			};
			

			remove_action( 'pre_get_posts', 'el_manage_bookings_column_data' );

		}
		

		public function event_bookings_posts_custom_column( $column_name, $post_id ) {

			if( $column_name == 'date_event' ){
				echo get_post_meta( $post_id, OVA_METABOX_EVENT . 'date_cal', true );
			}

			

			if ($column_name == 'customer_info') {
				$html = esc_html__("Name: ", "eventlist") . get_post_meta( $post_id, OVA_METABOX_EVENT . 'name', true ) . '<br>';
				$html .= esc_html__("Phone: ", "eventlist") . get_post_meta( $post_id, OVA_METABOX_EVENT . 'phone', true ) . '<br>';
				$html .= esc_html__("Email: ", "eventlist") . get_post_meta( $post_id, OVA_METABOX_EVENT . 'email', true ) . '<br>';
				$html .= esc_html__("Address: ", "eventlist") . get_post_meta( $post_id, OVA_METABOX_EVENT . 'address', true ) . '<br>';
				echo $html;
			}

			if ($column_name == 'status') {
				echo get_post_meta( $post_id, OVA_METABOX_EVENT . 'status', true );
			}

			if ($column_name == 'total') {
				$total = get_post_meta( $post_id, OVA_METABOX_EVENT . 'total_after_tax', true );
				echo el_price( $total );
			}


			if( $column_name == 'ticket_type' ){
				$id_event = get_post_meta( $post_id, OVA_METABOX_EVENT . 'id_event', true );
				$seat_option = get_post_meta( $id_event, OVA_METABOX_EVENT . 'seat_option', true );
				$payment_method = get_post_meta( $post_id, OVA_METABOX_EVENT . 'payment_method', true );
				$list_ticket = get_post_meta( $post_id, OVA_METABOX_EVENT . 'list_id_ticket', true );
				$list_ticket = json_decode($list_ticket);

				$list_qty_ticket_by_id_ticket = get_post_meta( $post_id, OVA_METABOX_EVENT . 'list_qty_ticket_by_id_ticket', true );

				if ( $seat_option != 'map' ) {
					$list_ticket_in_event = get_post_meta( $id_event, OVA_METABOX_EVENT . 'ticket', true);
					$html = "";
					if ( ! empty($list_ticket_in_event) && is_array($list_ticket_in_event) ) {
						foreach ($list_ticket_in_event as $ticket) {
							if ( in_array($ticket['ticket_id'], $list_ticket) ) {
								$html .= $ticket['name_ticket'] .' - '.$list_qty_ticket_by_id_ticket[$ticket['ticket_id']].' '.esc_html__( 'ticket(s)', 'eventlist' ). '<br>';
							}
						}
					}
				} else {
					$ticket_map = get_post_meta( $id_event, OVA_METABOX_EVENT . 'ticket_map', true);
					if ( !empty($ticket_map) && is_array($ticket_map) && !empty($ticket_map['seat']) ) {
						$html = esc_html__('Map', 'eventlist');
					}
				}
				
				echo $html;
			}

		}

		public function event_bookings_replace_column_title_method_a( $columns ) {

			$columns = array(
				'cb' => "<input type ='checkbox' />",
				'title' => esc_html__( 'Title', "eventlist" ),
				'date_event' => esc_html__( 'Calendar Date', 'eventlist' ),
				'customer_info' => esc_html__( 'Info', "eventlist" ),
				'total' => esc_html__( "Total", "eventlist" ),
				'status' => esc_html__( "Status", "eventlist" ),
				'ticket_type' => esc_html__( "Ticket Type", "eventlist" ),
				'date' => esc_html__( 'Date', 'eventlist' )
				
			);
			
			return $columns;  
		}

		
		function posts_column_register_sortable( $columns ) {
			$columns['title'] = 'title';
			return $columns;
		}

		


	}
	new EL_Column_booking_Manager();

}