<?php
global $current_date;
$show_top_locations = of_get_option('show_top_locations', '1');
if ($show_top_locations) {
	$top_destinations_count = (int)of_get_option('top_destinations_count', 8);
	$show_featured_locations_only = (bool)of_get_option('show_featured_locations_only', false); 

	$now = time();
	$current_date = date('Y-m-d', $now); ?>
	<!--top destinations-->
	<section class="destinations clearfix full">
		<h1><?php _e('Top Destinations To Visit', 'bookyourtravel'); ?></h1>
		<div class="inner-wrap">
		<?php 
			$location_results = list_locations(0, 1, $top_destinations_count, 'locations.post_date', 'DESC', $show_featured_locations_only);
			if ( count($location_results) > 0 && $location_results['total'] > 0 ) {
				foreach ($location_results['results'] as $location_result) {
					global $post;
					global $location_class;
					$post = $location_result;
					setup_postdata( $post ); 
					$location_class = 'one-fourth';
					get_template_part('includes/parts/location', 'item');
				}
		} ?>
		</div>
	</section>
<?php } // end if ?>