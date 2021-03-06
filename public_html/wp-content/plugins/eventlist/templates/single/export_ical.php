<?php if( ! defined( 'ABSPATH' ) ) exit(); ?>
<?php
$id_event = get_the_id();
$address = get_post_meta( $id_event, OVA_METABOX_EVENT . 'address', true);

$time_start = get_post_meta( $id_event, OVA_METABOX_EVENT . 'start_date_str', true  );
$time_end = get_post_meta( $id_event, OVA_METABOX_EVENT . 'end_date_str', true  );



$date_start = !empty($time_start) ? date('m/d/y H:i', $time_start ) : '';
$date_end = !empty($time_end) ? date('m/d/y H:i', $time_end ) : '';

$id_user = get_current_user_id();

$name = get_the_author_meta('user_nicename', $id_user);
$email = get_the_author_meta('email', $id_user);
if ($date_start) { ?>

	<div class="export_ical">
		<a href="http://addtocalendar.com/atc/ical?utz=420&amp;uln=en-US&amp;vjs=1.5&amp;e[0][date_start]=<?php echo esc_html($date_start);?>&amp;e[0][date_end]=<?php echo esc_html($date_end);?>&amp;e[0][timezone]=<?php echo get_option('timezone_string'); ?>&amp;e[0][title]=<?php echo get_the_title();?>&amp;e[0][description]=<?php echo get_the_excerpt();?>&amp;e[0][location]=<?php echo esc_html($address);?>&amp;e[0][organizer]=<?php echo esc_html($name);?>&amp;e[0][email]=<?php echo esc_html($email);?>" target="_blank" rel="nofollow">
			<i class="icon_download"></i>
			<?php esc_html_e( 'Export iCal', 'eventlist' );?>
		</a>
	</div>
	
<?php } ?>
