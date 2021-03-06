<?php
/* Template Name: Custom Search Results */
/* The template for displaying the custom search results page.
 *
 * @package WordPress
 * @subpackage BookYourTravel
 * @since Book Your Travel 1.0
 */
get_header(); 

byt_breadcrumbs();


get_sidebar('under-header');

	

	


global $currency_symbol, $enable_reviews;
$default_results_view = (int)of_get_option('search_results_default_view', 0);
$custom_search_results_page_id = get_current_language_page_id(of_get_option('redirect_to_search_results', ''));
$custom_search_results_page = get_permalink($custom_search_results_page_id);

$accommodation_types_args = array('taxonomy'=>'accommodation_type', 'hide_empty'=>'1');
$accommodation_types = get_categories($accommodation_types_args);

$car_types_args = array('taxonomy'=>'car_type', 'hide_empty'=>'1');
$car_types = get_categories($car_types_args);

$cabin_types_query = list_cabin_types();
$cabin_types = array();
if ($cabin_types_query->have_posts()) {
	while ($cabin_types_query->have_posts()) {
		$cabin_types_query->the_post();
		global $post;
		$cabin_types[] = $post;
	}
}


$request_car_types = retrieve_array_of_values_from_query_string('car_types', true);
$request_accommodation_types = retrieve_array_of_values_from_query_string('accommodation_types', true);
$request_cabin_types = retrieve_array_of_values_from_query_string('cabin_types', true);
$request_prices = retrieve_array_of_values_from_query_string('price', true);

$search_term = isset($_GET['term']) ? wp_kses($_GET['term'], '') : '';
$age = isset($_GET['age']) ? intval(wp_kses($_GET['age'], '')) : 0; 
$stars = isset($_GET['stars']) ? intval(wp_kses($_GET['stars'], '')) : 0; 
$rating = isset($_GET['rating']) ? intval(wp_kses($_GET['rating'], '')) : 0; 
$guests = isset($_GET['guests']) ? intval(wp_kses($_GET['guests'], '')) : 0; 
$adults = isset($_GET['adults']) ? intval(wp_kses($_GET['adults'], '')) : 0; 
$children = isset($_GET['childrens']) ? intval(wp_kses($_GET['childrens'], '')) : 0; 
$cabins = isset($_GET['cabins']) ? intval(wp_kses($_GET['cabins'], '')) : 0; 
$rooms = isset($_GET['rooms']) ? intval(wp_kses($_GET['rooms'], '')) : 0; 
$what = isset($_GET['what']) ? intval(wp_kses($_GET['what'], '')) : 1; 
$is_self_catered = ($what == 2);



$sort_by = isset($_GET['sb']) ? intval(wp_kses($_GET['sb'], '')) : 1; 
$sort_order = isset($_GET['so']) ? intval(wp_kses($_GET['so'], '')) : 1;

$date_from = isset($_GET['from']) && !empty($_GET['from'])  ? date('m/d/Y', strtotime(wp_kses($_GET['from'], ''))) : date('Y-m-d', time());
$date_to = isset($_GET['to']) && !empty($_GET['to']) ? date('m/d/Y', strtotime(wp_kses($_GET['to'], ''))) : date('Y-m-d', strtotime("+1 day", time()));



$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$posts_per_page = of_get_option('search_results_posts_per_page', 12);

$search_args = array();

$search_args['date_from'] = $date_from;
$search_args['date_to'] = $date_to;
$search_args['keyword'] = $search_term;
$search_args['prices'] = $request_prices;

$search_args['price_range_bottom'] = of_get_option('price_range_bottom', '0');
$search_args['price_range_increment'] = of_get_option('price_range_increment', '50');
$search_args['price_range_count'] = of_get_option('price_range_count', '5');
$search_args['search_only_available'] = of_get_option('search_only_available_properties', 0);

if ($what == 1 || $what == 2) {

	$sort_order = $sort_order == '1' ? 'ASC' : 'DESC';
	if (isset($sort_by)) {
		switch ($sort_by) {
			case '1' : $sort_by = 'min_price';break;// price
			case '2' : $sort_by = 'star_count';break;// star count
			case '3' : $sort_by = 'review_score';break;// star count
			default : $sort_by = 'accommodations.post_title';break;
		}
	} else {
		$sort_by = 'accommodations.post_title';
	}

	$search_args['rating'] = $rating;
	$search_args['rooms'] = $rooms;
	$search_args['stars'] = $stars;
	//print_r($search_args);
	$results = list_accommodations ( $paged, $posts_per_page, $sort_by, $sort_order, 0, $request_accommodation_types, $search_args, false, $is_self_catered);
	//print_r($results);
        //echo $date_from.'end date--'.$date_to;
      
//          --------------------------------------------
        
        
          foreach ($results['results'] as $acc_ids)
          {
    
             //echo $acc_ids->ID;
              global $wpdb;
   
                $query = "SELECT * FROM wp_byt_accommodation_vacancies WHERE accommodation_id = '$acc_ids->ID'";

                $get_vacancies_date = $wpdb->get_results($query);
                //print_r($get_vacancies_date);

                    foreach ($get_vacancies_date as $vacc_date)
                    {
                        
                        //echo $vacc_date->start_date;
                        if(strtotime($date_from) >= strtotime($vacc_date->start_date) && strtotime($date_to) <= strtotime($vacc_date->end_date))
                         {
                            $date_result = $results;
                            $current_avail_room = $acc_ids->rooms_available - $acc_ids->rooms_booked;
                            //echo $rooms;
                            if($current_avail_room >= $rooms) 
                                {
                                //echo 'available';
                                }  else 
                                    {
                                    $room_staus = $rooms.' room not availble '.$current_avail_room.' room only available';
                                    //$date_result = array();//used for not display result
                                    }
                           // if() {}
                            //exit;
                            
                         }  else 
                               {
                               $date_result = array();
                               }
            
                    }
            }
      
                     //   exit;
        
                $results = $date_result;
               // echo $date_from;
                $_SESSION['from_date'] = $date_from;
                $_SESSION['to_date'] = $date_to;
                $_SESSION['room'] = $rooms;
                $_SESSION['adult'] = $adults;
                $_SESSION['children'] = $children;
                

                
        
        //        --------------------------------------------

        
        
        $current_url = $custom_search_results_page . '?from=' . urlencode($date_from) . '&to=' . urlencode($date_to) . '&term=' . $search_term . '&what=' . $what;
//echo $current_url;exit;
} else if ($what == 3) {

	$search_args['age'] = $age;
	$sort_by = $sort_by == '1' ? 'price' : 'car_rentals.post_title';
	$sort_order = $sort_order == '1' ? 'ASC' : 'DESC';
	
	$results = list_car_rentals($paged, $posts_per_page, $sort_by, $sort_order, 0, $request_car_types, $search_args);
	$current_url = $custom_search_results_page . '?from=' . urlencode($date_from) . '&to=' . urlencode($date_to) . '&term=' . $search_term . '&what=' . $what;

} else if ($what == 4) {

	$search_args['guests'] = $guests;
	$sort_by = $sort_by == '1' ? 'tours.ID' : 'tours.post_title';
	$sort_order = $sort_order == '1' ? 'ASC' : 'DESC';

	$results = list_tours($paged, $posts_per_page, $sort_by, $sort_order, 0, array(), $search_args);
	$current_url = $custom_search_results_page . '?from=' . urlencode($date_from) . '&term=' . $search_term . '&what=' . $what;
	
} else if ($what == 5) {

	$search_args['guests'] = $guests;
	$search_args['cabins'] = $cabins;
	$sort_by = $sort_by == '1' ? 'cruises.ID' : 'cruises.post_title';
	$sort_order = $sort_order == '1' ? 'ASC' : 'DESC';

	$results = list_cruises($paged, $posts_per_page, $sort_by, $sort_order, array(), $search_args);
	$current_url = $custom_search_results_page . '?from=' . urlencode($date_from) . '&what=' . $what;
	
}

?>
<div class="container2">
<div class="row">
	<?php get_sidebar('left-search'); ?>
	<!--three-fourth content-->
    <div class="col-xs-12 col-sm-8 col-md-9">
	<section class="right-border">
	<?php 	$enable_car_rentals = of_get_option('enable_car_rentals', 1); ?>
		<div class="sort-by">
			<h3><?php _e('Sort by', 'bookyourtravel'); ?></h3>
			<ul class="sort">
				<li><?php _e('Price', 'bookyourtravel'); ?> <a href="<?php echo $current_url . '&sb=1&so=1'; ?>" title="<?php _e('ascending', 'bookyourtravel'); ?>" class="ascending"><?php _e('ascending', 'bookyourtravel'); ?></a><a href="<?php echo $current_url . '&sb=1&so=2'; ?>" title="<?php _e('descending', 'bookyourtravel'); ?>" class="descending"><?php _e('descending', 'bookyourtravel'); ?></a></li>
				<?php if ($what == 1 || $what == 2) { ?>
				<li><?php _e('Stars', 'bookyourtravel'); ?> <a href="<?php echo $current_url . '&sb=2&so=1'; ?>" title="<?php _e('ascending', 'bookyourtravel'); ?>" class="ascending"><?php _e('ascending', 'bookyourtravel'); ?></a><a href="<?php echo $current_url . '&sb=2&so=2'; ?>" title="<?php _e('descending', 'bookyourtravel'); ?>" class="descending"><?php _e('descending', 'bookyourtravel'); ?></a></li>
				<li><?php _e('Rating', 'bookyourtravel'); ?> <a href="<?php echo $current_url . '&sb=3&so=1'; ?>" title="<?php _e('ascending', 'bookyourtravel'); ?>" class="ascending"><?php _e('ascending', 'bookyourtravel'); ?></a><a href="<?php echo $current_url . '&sb=3&so=2'; ?>" title="<?php _e('descending', 'bookyourtravel'); ?>" class="descending"><?php _e('descending', 'bookyourtravel'); ?></a></li>
				<?php } ?>
			</ul>
			
			<ul class="view-type">
				<script>
					window.defaultResultsView = <?php echo $default_results_view; ?>;
				</script>
				<li class="grid-view <?php echo ($default_results_view === 0) ? 'active' : ''; ?>"><a href="#" title="grid view"><?php _e('grid view', 'bookyourtravel'); ?></a></li>
				<li class="list-view <?php echo ($default_results_view === 1) ? 'active' : ''; ?>"><a href="#" title="list view"><?php _e('list view', 'bookyourtravel'); ?></a></li>
			</ul>
		</div>
	
		<div class="deals clearfix">
                    <?php if(!empty($room_staus)){ echo $room_staus;}?>
			<!--deal-->
			<?php 
			if (count($results) > 0 && $results['total'] > 0) { ?>
				<div class="inner-wrap">
				<?php
				foreach ($results['results'] as $result) { 
					global $post, $tour_class, $car_rental_class, $accommodation_class, $cruise_class;
					$post = $result;
					setup_postdata( $post ); 
					if ($what == 1 || $what == 2) {
						$accommodation_class = 'one-fourth';
						get_template_part('includes/parts/accommodation', 'item');
					} elseif ($what == 3) {
						$car_rental_class = 'one-fourth';
						get_template_part('includes/parts/car_rental', 'item');
					} elseif ($what == 4) {
						$tour_class = 'one-fourth';
						get_template_part('includes/parts/tour', 'item');
					} elseif ($what == 5) {
						$cruise_class = 'one-fourth';
						get_template_part('includes/parts/cruise', 'item');
					}
				} ?>
				</div>
				<nav class="page-navigation bottom-nav">
					<!--back up button-->
					<a href="#" class="scroll-to-top" title="<?php _e('Back up', 'bookyourtravel'); ?>"><?php _e('Back up', 'bookyourtravel'); ?></a> 
					<!--//back up button-->
					<!--pager-->
					<div class="pager">
						<?php 
						$total_results = $results['total'];
						byt_display_pager( ceil($total_results/$posts_per_page) );
						?>
					</div>
				</nav>
                        <?php } ?>
		</div>
	</section>
    </div>
    </div></div>
<?php 
	wp_reset_postdata();
	get_footer(); 
?>