<?php if ( ! defined( 'ABSPATH' ) ) exit();

global $event;
$data_date = $event->get_event_date();

$event_id = get_the_id();

if ($data_date) { ?>
	<div class="event-time">

		<span class="event-icon"><i class="icon_clock_alt" ></i></span>
		<span class="time">
			<?php echo  $data_date; ?>
		</span>
	</div>

<?php	} ?>
