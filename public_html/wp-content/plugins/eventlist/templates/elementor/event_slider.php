<?php if( ! defined( 'ABSPATH' ) ) exit();

$category = $args['category'];
$total_post = $args['total_count'];
$order = $args['order'];
$order_by = $args['order_by'];
$filter_event = $args['filter_event'];

$type_event = $args['type_event'];
$type_event = !empty($type_event) ? $type_event : 'type1';

$events = get_list_event_slider_elementor ($category, $total_post, $order, $order_by, $filter_event);

$data_options['slideBy'] 			= $args['slides_to_scroll'];
$data_options['margin'] 			= $args['margin_items'];
$data_options['autoplayHoverPause'] = $args['pause_on_hover'] === 'yes' ? true : false;
$data_options['loop'] 			 	= $args['infinite'] === 'yes' ? true : false;
$data_options['autoplay'] 			= $args['autoplay'] === 'yes' ? true : false;
$data_options['autoplayTimeout']	= $data_options['autoplay'] ? $args['autoplay_speed'] : 3000;
$data_options['smartSpeed']			= $args['smartspeed'];
$data_options['dots']                =  ( $args['dots'] == 'yes') ? true : false;
$data_options['nav']            	=  ( $args['nav'] == 'yes') ? true : false;
?>
<div class="ova-event-slider">
	<ul class=" event_archive <?php echo esc_attr($type_event) ?> event-slider  owl-carousel  owl-loaded" data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
		<?php
		if($events->have_posts()) : while($events->have_posts()) : $events->the_post();
			el_get_template_part( 'content', 'event-'.$type_event );
		endwhile; endif;  wp_reset_postdata();
		?>
	</ul>
</div>