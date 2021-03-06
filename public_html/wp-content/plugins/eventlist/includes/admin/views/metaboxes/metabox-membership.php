<?php if( !defined( 'ABSPATH' ) ) exit(); ?>
<?php 
$format = el_date_time_format_js();
$placeholder = date_i18n(el_date_time_format_js_reverse($format), '1577664000' );



$start_date = $this->get_mb_value( 'membership_start_date', '' ) ? date( el_date_time_format_js_reverse( $format ), $this->get_mb_value( 'membership_start_date', '' ) ) : date( el_date_time_format_js_reverse( $format ), strtotime( date( 'Y-m-d' ) ) );

$end_date = $this->get_mb_value( 'membership_end_date', '' ) != '-1' ? date( el_date_time_format_js_reverse( $format ), $this->get_mb_value( 'membership_end_date', strtotime( date( 'Y-m-d' ) ) ) ) : '-1';

$list_package = EL_Package::instance()->el_list_packages();

 ?>

<div class="ova_row">
	<label class="label" for="info_organizer"><strong><?php esc_html_e( 'Package', 'eventlist' ); ?>: </strong></label>
	<select name="<?php echo esc_attr($this->get_mb_name( 'membership_package_id' )); ?>" id="">

		<option value=""><?php esc_html_e( 'Choose Package', 'eventlist' ); ?></option>

		<?php $package_id_current = $this->get_mb_value( 'membership_package_id', '' );
			foreach ($list_package as $value) { 

			$pid = $value->ID;
			$package_id = get_post_meta( $pid, OVA_METABOX_EVENT.'package_id', true );
			$package_title = $value->post_title;
			?>
			<option value="<?php echo $package_id; ?>" <?php  selected( $package_id, $package_id_current ) ?> >
				<?php echo $package_title; ?>
			</option>
		<?php } ?>

	</select>
</div>    	
<br>

<div class="ova_row">

	<label class="label">
		<strong><?php esc_html_e( 'Start Date: *', 'eventlist' ); ?></strong>
	</label>

	<input type="text"  
		class="membership_date" 
		value="<?php echo esc_attr( $start_date ); ?>" 
		name="<?php echo esc_attr( $this->get_mb_name( 'membership_start_date' ) ); ?>" 
		autocomplete="nope" autocorrect="off" autocapitalize="none"  
		data-format="<?php echo esc_attr( $format ); ?>" 
	/>
	
</div>
<br>

<div class="ova_row">

	<label class="label">
		<strong><?php esc_html_e( 'End Date: *', 'eventlist' ); ?></strong>
	</label>
	
	<input type="text" 
		class="<?php echo $end_date != '-1' ? 'membership_date' : ''; ?>" 
		value="<?php echo esc_attr( $end_date ); ?>" 
		name="<?php echo esc_attr( $this->get_mb_name( 'membership_end_date' ) ); ?>" 
		autocomplete="nope" autocorrect="off" autocapitalize="none" 
		data-format="<?php echo esc_attr( $format ); ?>" 
	/>
	<span><?php esc_html_e( 'Insert -1 for unlimit','eventlist' ); ?></span>
	
</div>

<br>



<div class="ova_row">

	<label class="label"><strong><?php esc_html_e( 'Total: ', 'eventlist' ); ?></strong></label>
	<input type="text" 
		class="total" 
		value="<?php echo esc_attr( $this->get_mb_value( 'total', '' ) ); ?>" 
		name="<?php echo esc_attr( $this->get_mb_name( 'total' ) ); ?>" 
		autocomplete="nope" autocorrect="off" autocapitalize="none"  
		/>
	<span><?php echo EL()->options->general->get('currency'); ?></span>
</div>
<br>

<div class="ova_row">

	<label class="label"><strong><?php esc_html_e( 'Payment: ', 'eventlist' ); ?></strong></label>
	<input type="text" class="payment" value="<?php echo esc_attr( $this->get_mb_value( 'payment', '' ) ); ?>" name="<?php echo esc_attr( $this->get_mb_name( 'payment' ) ); ?>" autocomplete="nope" autocorrect="off" autocapitalize="none" />
	
</div>
<br>


<div class="ova_row">

	<label class="label"><strong><?php esc_html_e( 'User ID: ', 'eventlist' ); ?></strong></label>
	<input type="text" 
		class="membership_user_id" 
		value="<?php echo esc_attr( $this->get_mb_value( 'membership_user_id', '' ) ); ?>" 
		name="<?php echo esc_attr( $this->get_mb_name( 'membership_user_id' ) ); ?>" 
		autocomplete="nope" autocorrect="off" autocapitalize="none"
		
		/>
	
</div>


<?php //wp_nonce_field( 'ova_metaboxes', 'ova_metaboxes' ); ?>

