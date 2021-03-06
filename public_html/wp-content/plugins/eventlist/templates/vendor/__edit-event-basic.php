<?php if ( !defined( 'ABSPATH' ) ) exit();


$post_id = isset( $_REQUEST['id'] ) ? sanitize_text_field( $_REQUEST['id'] ) : '';


$_prefix = OVA_METABOX_EVENT;

// Get selected cat
$get_cat_selected = get_the_terms( $post_id, 'event_cat' ) ? get_the_terms( $post_id, 'event_cat' ) : '';

if ($get_cat_selected != '') {
	foreach ($get_cat_selected as $key => $value) {
		$cats_selected[] = $value->term_id;
	}
}
$cats = el_get_taxonomy('event_cat');


// Get selected tags
$get_tag_selected = get_the_terms( $post_id, 'event_tag' ) ? get_the_terms( $post_id, 'event_tag' ) : '';
$tags_name_selected = array();
if ($get_tag_selected != '') {
	$i = 0;
	foreach ($get_tag_selected as $key => $value) {
		$tags_name_selected[] = $value->name;
		if ($i++ == 5) break;
	}
}

$settings_editor = array(
	'textarea_name' => 'el_content_event',
	'media_buttons' => false,
	'textarea_rows' => 5,
);



$venue             = get_post_meta( $post_id, $_prefix.'venue', true) ? get_post_meta( $post_id, $_prefix.'venue', true) : '';
$address           = get_post_meta( $post_id, $_prefix.'address', true) ? get_post_meta( $post_id, $_prefix.'address', true) : '';
$map_name          = get_post_meta( $post_id, $_prefix.'map_name', true) ? get_post_meta( $post_id, $_prefix.'map_name', true) : '';
$map_address       = get_post_meta( $post_id, $_prefix.'map_address', true) ? get_post_meta( $post_id, $_prefix.'map_address', true) : '';
$edit_full_address = get_post_meta( $post_id, $_prefix.'edit_full_address', true) ? get_post_meta( $post_id, $_prefix.'edit_full_address', true) : '';

if ( $post_id !== '' ) {
	$map_lat = get_post_meta( $post_id, $_prefix.'map_lat', true) ? get_post_meta( $post_id, $_prefix.'map_lat', true) : '';
	$map_lng = get_post_meta( $post_id, $_prefix.'map_lng', true) ? get_post_meta( $post_id, $_prefix.'map_lng', true) : '';
} else {
	$EL_Setting_Event = EL()->options->event;
	$EL_Setting_Event->get('latitude_map_default') == '' ? $map_lat = '39.177972' : $map_lat = $EL_Setting_Event->get('latitude_map_default');
	$EL_Setting_Event->get('longitude_map_default') == '' ? $map_lng = '-100.363750' : $map_lng = $EL_Setting_Event->get('longitude_map_default');
}

$event_type   = get_post_meta( $post_id, $_prefix.'event_type', true) ? get_post_meta( $post_id, $_prefix.'event_type', true) : apply_filters( 'el_event_type_default', 'classic' );

$info_organizer   = get_post_meta( $post_id, $_prefix.'info_organizer', true) ? get_post_meta( $post_id, $_prefix.'info_organizer', true) : '';
$name_organizer   = get_post_meta( $post_id, $_prefix.'name_organizer', true) ? get_post_meta( $post_id, $_prefix.'name_organizer', true) : '';
$phone_organizer  = get_post_meta( $post_id, $_prefix.'phone_organizer', true) ? get_post_meta( $post_id, $_prefix.'phone_organizer', true) : '';
$mail_organizer   = get_post_meta( $post_id, $_prefix.'mail_organizer', true) ? get_post_meta( $post_id, $_prefix.'mail_organizer', true) : '';
$job_organizer    = get_post_meta( $post_id, $_prefix.'job_organizer', true) ? get_post_meta( $post_id, $_prefix.'job_organizer', true) : '';
$social_organizer = get_post_meta( $post_id, $_prefix.'social_organizer', true) ? get_post_meta( $post_id, $_prefix.'social_organizer', true) : '';



$location_selected = get_the_terms( $post_id, 'event_loc' ) ? get_the_terms( $post_id, 'event_loc' ) : '';
$el_country = '';
$el_city = '';

if ( $location_selected ) {
	foreach ($location_selected as $key => $value) {
		if ($value->parent == '0') {
			$el_country = $value->slug;
		} else {
			$el_city = $value->slug;
		}
	}
}


$time = el_calendar_time_format();
$format = el_date_time_format_js();



$list_taxonomy = EL_Post_Types::register_taxonomies_customize();

$time_zone = get_post_meta( $post_id, $_prefix.'time_zone', true) ? get_post_meta( $post_id, $_prefix.'time_zone', true) : '';
?>


<input type="hidden" value="<?php echo esc_attr( $post_id ); ?>" id="post_id" name="post_id"/>
<input type="hidden" class="prefix" value="<?php echo esc_attr(OVA_METABOX_EVENT); ?>">

<!-- Basic -->
<div class="basic_info event_basic_block">
	<h4 class="heading_section"><?php esc_html_e( 'Basic Infomation', 'eventlist' ); ?></h4>
	<div class="wrap_name_event vendor_field">
		<label for="name_event" ><?php esc_html_e( 'Event Name', 'eventlist' ); ?></label>
		<input type="text" id="name_event" name="name_event" value="<?php echo esc_attr( $post_id != '' ? get_the_title($post_id) : '' ); ?>" placeholder="<?php esc_html_e( 'Enter title here', 'eventlist' ); ?>" autocomplete="nope" autocorrect="off" autocapitalize="none" required>
	</div>

	<div class="wrap_cat vendor_field">
		<label for="event_cat"><?php esc_html_e( 'Category', 'eventlist' ); ?></label>
		<select name="event_cat" id="event_cat" class="selectpicker" required >
			<option value="" ><?php esc_html_e( '--- Select Category ---', 'eventlist' ); ?></option>

			<?php foreach ($cats as $cat) {

				if ($get_cat_selected != '') { ?>
					<option value="<?php echo esc_attr( $cat->term_id ); ?>" <?php echo in_array($cat->term_id, $cats_selected) ? esc_attr( 'selected' ) : ''; ?> ><?php echo esc_html( $cat->name ); ?></option>
				<?php } else { ?> 
					<option value="<?php echo esc_attr( $cat->term_id ); ?>" ><?php echo esc_html( $cat->name ); ?></option>
				<?php }

			} ?>
		</select>
	</div>
	
	<?php if( apply_filters( 'el_show_timezone', true ) ){ ?>
		<div class="vendor_field">

			<label><?php esc_html_e( 'Time Zone', 'eventlist' ); ?></label>
			
			<input type="text" name="<?php echo esc_attr( $_prefix.'time_zone' ) ?>" class="time_zone" id="time_zone" value="<?php echo esc_attr( $time_zone ); ?>" placeholder="<?php esc_html_e( 'UTC+1', 'eventlist' ); ?>" >
		</div>
	<?php } ?>
	
	<?php
	$arr_list_slug_taxonomy = [];
	if( $list_taxonomy ) {
		foreach( $list_taxonomy as $taxonomy ) {

			$arr_list_slug_taxonomy[] = $taxonomy['slug'];
			$taxonomys = el_get_taxonomy( $taxonomy['slug'] );

			$get_taxonomy_select = get_the_terms( $post_id, $taxonomy['slug'] ) ? get_the_terms( $post_id, $taxonomy['slug'] ) : '';

			$tax_selected = [];
			if ($get_taxonomy_select != '') {
				foreach ($get_taxonomy_select as $key => $value) {
					$tax_selected[] = $value->term_id;
				}
			}

			?>
			<div class="wrap_<?php echo esc_attr( $taxonomy['slug'] ) ?> el_custom_taxonomy vendor_field ">
				<label for="<?php echo esc_attr( $taxonomy['slug'] ) ?>"><?php echo esc_attr( $taxonomy['name'] ) ?></label>
				<select name="<?php echo esc_attr( $taxonomy['slug'] ) ?>" id="<?php echo esc_attr( $taxonomy['slug'] ) ?>" class="selectpicker" multiple="multiple" >
					<option value="" ><?php esc_html_e( '--- Select Taxonomy ---', 'eventlist' ); ?></option>
				<?php foreach ($taxonomys as $tax) {

					if ($get_taxonomy_select != '') { ?>
						<option value="<?php echo esc_attr( $tax->term_id ); ?>" <?php echo in_array($tax->term_id, $tax_selected) ? esc_attr( 'selected' ) : ''; ?> ><?php echo esc_html( $tax->name ); ?></option>
					<?php } else { ?> 
						<option value="<?php echo esc_attr( $tax->term_id ); ?>" ><?php echo esc_html( $tax->name ); ?></option>
					<?php }

				} ?>
				</select>
			</div>
			<?php
		}
	} ?>
	<input type="hidden" id="el_list_slug_taxonomy" value="<?php echo esc_attr( json_encode( $arr_list_slug_taxonomy ) ) ?>">

	<div class="wrap_tag vendor_field">
		<label for="event_tag"><?php esc_html_e( 'Tags', 'eventlist' ); ?></label>
		<?php if ( $post_id != '' ) { ?>
			<input type="text" class="event_tag" id="event_tag" value="<?php echo esc_attr( implode(", ", $tags_name_selected) ); ?>" placeholder="<?php esc_html_e( 'Education, Sport, Travel', 'eventlist' ); ?>" autocomplete="nope" autocorrect="off" autocapitalize="none">
			<span><?php esc_html_e( '(max: 6 tags)', 'eventlist' ); ?></span>
		<?php } else { ?>
			<input type="text" class="event_tag" id="event_tag" value="" placeholder="<?php esc_html_e( 'Education, Sport, Travel', 'eventlist' ); ?>" autocomplete="nope" autocorrect="off" autocapitalize="none"> 
			<span><?php esc_html_e( '(max: 6 tags)', 'eventlist' ); ?></span>
		<?php } ?>
	</div>

	<div class="vendor_field">
		<label class="ova_desc"><?php esc_html_e( 'Description', 'eventlist' ); ?>:</label>
		<?php if ( $post_id != '' ) {
			wp_editor( get_post_field( 'post_content', $post_id ), 'content_event', $settings_editor );
		} else {
			wp_editor( '', 'content_event', $settings_editor );
		} ?>
	</div>

</div>



<!-- Location -->
<div class="event_basic_block event_type_section">
	<h4 class="heading_section"><?php esc_html_e( 'Event Type', 'eventlist' ); ?></h4>
	<div class="event_type">

		<input type="radio" value="classic" name="<?php echo $_prefix.'event_type'; ?>" <?php echo $event_type == 'classic' ? 'checked' : ''; ?> class="classsic_event_type" />
			<span class="physical_loc">
				<?php esc_html_e( 'Physical location', 'eventlist' ); ?>
			</span>
			

		<input type="radio" value="online" name="<?php echo $_prefix.'event_type'; ?>" <?php echo $event_type == 'online' ? 'checked' : ''; ?> class="online_event_type" />
			<span class="online_loc">
				<?php esc_html_e( 'Online', 'eventlist' ); ?>
			</span>
			<br>
		
	</div>

</div>

<div class="location event_basic_block">
	
	<div class="country_city ">
		<div class="get_country vendor_field"><?php el_get_state($el_country); ?></div>
		<div class="get_city vendor_field"><?php el_get_city( $el_city ); ?></div>
	</div>


	<div id="mb_venue">
		<div class="ova_row vendor_field">
			<label class="label" for="add_venue"><?php esc_html_e( 'Venue Name:', 'eventlist' ); ?></label>

			<input type="text" name="<?php echo esc_attr( $_prefix.'add_venue' ); ?>" id="add_venue" value='' autocomplete="nope" autocorrect="off" autocapitalize="none" placeholder="<?php esc_attr_e( 'White Palace', 'eventlist' ); ?>"></input>
			<button class="button check_venue el_btn_add"><?php esc_html_e( 'Add', 'eventlist' ); ?></button>

		</div>

		<!-- List Venue -->
		<ul id="data_venue">
			<?php if ( $venue ) {
				foreach ( $venue as $key => $value) { 
					$post_venue = get_page_by_title( $value, OBJECT, 'venue' );
					if ($post_venue) { ?>

						<li>
							<input type="hidden" name="<?php echo esc_attr( $_prefix.'venue'.'['.$key.']' ); ?>" value="<?php echo esc_attr($value); ?>" autocomplete="nope" autocorrect="off" autocapitalize="none">
							<i class="dashicons dashicons-dismiss remove_venue"></i>
							<span><?php echo esc_html( $post_venue->post_title ); ?></span>
						</li>

					<?php } 
				}
			} ?>
		</ul>
	</div>

	<div class="el_map">

		<input id="pac-input" name="<?php echo esc_attr( $_prefix.'map_address' ); ?>" value="<?php echo $post_id != '' ? $map_address : __('New York, NY, USA', 'eventlist'); ?>" class="controls" type="text" placeholder="<?php esc_html_e( 'Enter a address in map', 'eventlist' ); ?>" autocomplete="nope" autocorrect="off" autocapitalize="none">
		<div class="vendor_field" id="admin_show_map" style="height: 300px;"></div>
		<div id="infowindow-content">
			<span id="place-name" class="title"><?php echo esc_html( $post_id != '' ? $map_name : __('New York') ); ?></span>
			<span id="place-address"><?php echo $post_id != '' ? $map_address : esc_html__('New York, NY, USA', 'eventlist') ; ?></span>
		</div>
		<input type="hidden" value="<?php echo esc_attr( $map_name ); ?>" name="<?php echo esc_attr( $_prefix.'map_name' ); ?>" id="map_name"  autocomplete="nope" autocorrect="off" autocapitalize="none"/>
	</div>

	<div class="edit_latlng vendor_field">
		<label for="editor_latlng"><?php esc_html_e( 'Edit Position', 'eventlist' ); ?>: </label>
		<input type="checkbox" value="" name="editor_latlng" id="editor_latlng" />

		<div class="wrap_lnglat">
			<div class="lng vendor_field">
				<label><?php esc_html_e( 'Longtitude', 'eventlist' ); ?>: </label>
				<input type="text" class="readonly" value="<?php echo esc_attr( $map_lat ); ?>" name="<?php echo esc_attr( $_prefix.'map_lat' ); ?>" id="map_lat" autocomplete="nope" autocorrect="off" autocapitalize="none" readonly />
			</div>

			<div class="lat vendor_field">
				<label><?php esc_html_e( 'Latitude', 'eventlist' ); ?>: </label>
				<input type="text" class="readonly" value="<?php echo esc_attr( $map_lng ); ?>" name="<?php echo esc_attr( $_prefix.'map_lng' ); ?>" id="map_lng" autocomplete="nope" autocorrect="off" autocapitalize="none" readonly/>
			</div>
		</div>
	</div>

	<div class="el_address vendor_field">
		<span class="edit_address">
			<label for="edit_full_address"><?php esc_html_e( ' Edit Full Address:', 'eventlist' ); ?></label>
			<input type="checkbox" id='edit_full_address' class="edit_full_address" name="<?php echo esc_attr( $_prefix.'edit_full_address' ); ?>" value="<?php echo esc_attr( $edit_full_address ); ?>" <?php echo esc_attr( $edit_full_address ); ?> >
			<input type="text" id="address" class="address <?php echo esc_attr($edit_full_address != 'checked' ? 'readonly' : ''); ?>" name="<?php echo esc_attr( $_prefix.'address' ); ?>" value="<?php echo esc_attr( $address ); ?>" autocomplete="nope" autocorrect="off" autocapitalize="none" <?php echo esc_attr($edit_full_address != 'checked' ? 'readonly' : ''); ?> >
		</span>
	</div>

</div>


<!-- Contact -->
<div class="contact">
	<h4 class="heading_section"><?php esc_html_e( 'Contact', 'eventlist' ); ?></h4>

	<div class="vendor_field">
		<label for="info_organizer" ><?php esc_html_e( 'Overwrite Your Profile Info', 'eventlist' ); ?></label>
		<input type="checkbox" id="info_organizer" class="info_organizer" name="<?php echo esc_attr( $_prefix.'info_organizer' ) ?>" value="<?php echo esc_attr( $info_organizer ); ?>" <?php echo esc_attr( $info_organizer ); ?> >
	</div>


	<div id="show_rewrite" style="display: none">
		<div class="info">
			<div class="name vendor_field">
				<label for="name_organizer" ><?php esc_html_e( 'Name:', 'eventlist' ); ?></label>
				<input type="text" id="name_organizer" class="name_organizer" name="<?php echo esc_attr( $_prefix.'name_organizer' ) ?>" value="<?php echo esc_attr( $name_organizer ); ?>" autocomplete="nope" autocorrect="off" autocapitalize="none">
			</div>

			<div class="phone vendor_field">
				<label for="phone_organizer" ><?php esc_html_e( 'Phone:', 'eventlist' ); ?></label>
				<input type="text" id="phone_organizer" class="phone_organizer" name="<?php echo esc_attr( $_prefix.'phone_organizer' ) ?>" value="<?php echo esc_attr( $phone_organizer ); ?>" autocomplete="nope" autocorrect="off" autocapitalize="none">
			</div>

			<div class="mail vendor_field">
				<label for="mail_organizer" ><?php esc_html_e( 'E-mail:', 'eventlist' ); ?></label>
				<input type="text" id="mail_organizer" class="mail_organizer" name="<?php echo esc_attr( $_prefix.'mail_organizer' ) ?>" value="<?php echo esc_attr( $mail_organizer ); ?>" autocomplete="nope" autocorrect="off" autocapitalize="none">
			</div>

			<div class="job vendor_field">
				<label for="job_organizer" ><?php esc_html_e( 'Job:', 'eventlist' ); ?></label>
				<input type="text" id="job_organizer" class="job_organizer" name="<?php echo esc_attr( $_prefix.'job_organizer' ) ?>" value="<?php echo esc_attr( $job_organizer ); ?>" autocomplete="nope" autocorrect="off" autocapitalize="none">
			</div>
		</div>

		<div id="social_organizer">
			<label class="label"><strong><?php esc_html_e( 'Social', 'eventlist' ); ?>: </strong></label>
			<div id="social_list">
				<?php if ($social_organizer) { 
					foreach ($social_organizer as $key => $value) {
						if ($value['link_social'] != '') { ?> 
							<div class="social_item vendor_field">
								<input type="text" name="<?php echo esc_attr( OVA_METABOX_EVENT.'social_organizer['.$key.'][link_social]' ); ?>" value="<?php echo esc_attr($value['link_social']); ?>" class="link_social" placeholder="<?php echo esc_attr( 'https://' ); ?>" autocomplete="nope" autocorrect="off" autocapitalize="none">

								<select name="<?php echo esc_attr( OVA_METABOX_EVENT.'social_organizer['.$key.'][icon_social]' ); ?>" class="icon_social">
									<?php foreach (el_get_social() as $key_icon_social => $value_icon_social) { ?>
										<option value="<?php echo esc_attr($key_icon_social); ?>" <?php echo esc_attr($value['icon_social'] == $key_icon_social ? 'selected' : ''); ?>><?php esc_html_e( $value_icon_social, 'eventlist' ); ?></option>
									<?php } ?>
								</select>
								<a href="#" class="button remove_social"><?php esc_html_e( 'x', 'eventlist' ); ?></a>
							</div>
							<?php 
						} 
					}
				} ?>
			</div>
			<a href="#" class="button add_social el_btn_add"><i class="icon_plus"></i>&nbsp;<?php esc_html_e( 'Add Social', 'eventlist' ); ?></a>
		</div>
	</div>
</div>


<!-- Image Feature -->
<div class="image_feature">

	<h4 class="heading_section">
		<?php esc_html_e( 'Image Feature', 'eventlist' ); ?>
		<span class="heading_explain"> (<?php esc_html_e( 'Recommended size: 1920x739px','eventlist' ); ?>)</span><br/>
	</h4>
	
	<div class="wrap">
		<?php if (get_the_post_thumbnail_url($post_id)) { ?>
			<img class="image-preview" src="<?php echo esc_url(get_the_post_thumbnail_url($post_id)) ?>" alt="#">
			<a class="button remove_image" href="#"><i class="far fa-trash-alt"></i></a>
		<?php } ?>
	</div>

	<div class="vendor_field">
		
		<a class="button add_image el_btn_add" href="#" data-uploader-title="<?php esc_attr_e( "Add image(s) to gallery", 'eventlist' ); ?>" data-uploader-button-text="<?php esc_attr_e( "Add image", 'eventlist' ); ?>"><?php esc_html_e( "Add image", 'eventlist' ); ?></a>
		
		<input type="hidden" name="img_thumbnail" class="img_thumbnail" id="img_thumbnail" value="<?php echo esc_attr(get_post_thumbnail_id( $post_id )); ?>">
	</div>

	
</div>




<div id="mb_gallery">
	<h4 class="heading_section">
		<?php esc_html_e( 'Gallery', 'eventlist' ); ?>
		<span class="heading_explain">(<?php esc_html_e( 'Recommended size: 710x480px','eventlist' ); ?>)</span>
	</h4>
	<?php echo el_get_template( '/vendor/__edit-event-gallery.php' ); ?>
</div>
