<?php 
get_header('accommodation'); 
byt_breadcrumbs();
get_sidebar('under-header');






global $post, $current_user, $accommodation_obj, $entity_obj, $currency_symbol, $price_decimal_places, $score_out_of_10, $enable_reviews, $default_accommodation_tabs, $default_accommodation_extra_fields;

//var_dump($accommodation_obj);



$accommodation_extra_fields = of_get_option('accommodation_extra_fields');
if (!is_array($accommodation_extra_fields) || count($accommodation_extra_fields) == 0)
	$accommodation_extra_fields = $default_accommodation_extra_fields;

$tab_array = of_get_option('accommodation_tabs');
if (!is_array($tab_array) || count($tab_array) == 0)
	$tab_array = $default_accommodation_tabs;

if ( have_posts() ) {

	the_post();
	$accommodation_obj = new byt_accommodation($post);
	
	$entity_obj = $accommodation_obj;
	$accommodation_id = $accommodation_obj->get_id();
	$base_accommodation_id = $accommodation_obj->get_base_id();
	$accommodation_location = $accommodation_obj->get_location();
	$is_self_catered = $accommodation_obj->get_is_self_catered();
	
	$accommodation_latitude = $accommodation_obj->get_custom_field('latitude');
	$accommodation_longitude = $accommodation_obj->get_custom_field('longitude');
	
	// include various forms (booking, review, confirmation)
	if ($enable_reviews) {
		get_template_part('includes/parts/review', 'form'); 
	}

?>


	<script>
		window.postType = 'accommodation';
	</script>
<?php   	
	get_template_part('includes/parts/inquiry', 'form');
	?>		
	<!--accommodation three-fourth content-->

	<?php
	get_template_part('includes/parts/accommodation', 'booking-form');
	get_template_part('includes/parts/accommodation', 'confirmation-form');
	?>	
	<script>
		window.formSingleError = <?php echo json_encode(__('You failed to provide 1 field. It has been highlighted below.', 'bookyourtravel')); ?>;
		window.formMultipleError = <?php echo json_encode(__('You failed to provide {0} fields. They have been highlighted below.', 'bookyourtravel'));  ?>;
		window.accommodationId = <?php echo $accommodation_obj->get_id(); ?>;
		window.accommodationIsSelfCatered = <?php echo $accommodation_obj->get_is_self_catered(); ?>;
		window.accommodationIsPricePerPerson = <?php echo $accommodation_obj->get_is_price_per_person(); ?>;
		window.accommodationCountChildrenStayFree = <?php echo $accommodation_obj->get_count_children_stay_free(); ?>;
		<?php if ($is_self_catered) { 
		$max_count = $accommodation_obj->get_custom_field('max_count');
		$max_count = $max_count == '' ? 5 : intval($max_count);
		$max_child_count = $accommodation_obj->get_custom_field('max_child_count');
		$max_child_count = $max_child_count == '' ? 5 : intval($max_child_count);
		?>
		window.accommodationMaxCount =  <?php echo $max_count; ?>;
		window.accommodationMaxChildCount = <?php echo $max_child_count; ?>;
		<?php } ?>
		window.entityLatitude = <?php echo json_encode($accommodation_obj->get_custom_field('latitude')); ?>;
		window.entityLongitude = <?php echo json_encode($accommodation_obj->get_custom_field('longitude')); ?>;
		window.entityInfoboxText = <?php echo json_encode('<strong>' . $accommodation_obj->get_title() . '</strong><br />' . $accommodation_obj->get_custom_field('address') . '<br />' . $accommodation_obj->get_custom_field('website_address')); ?>;
		window.currentMonth = <?php echo date('n'); ?>;
		window.currentYear = <?php echo date('Y'); ?>;
	</script>
    <div class="col-lg-12">
    <h1><?php echo $accommodation_obj->get_title(); '' ?></h1>
 <?php if ($accommodation_location != null) { ?>
                <span class="address"><?php echo $accommodation_obj->get_custom_field('address'); ?> <?php echo $accommodation_obj->get_custom_field('phone'); ?></span>
                <?php } ?>
					<span class="stars pull-left">
						<?php for ($i=0;$i<$accommodation_obj->get_custom_field('star_count');$i++) { ?>
						<img src="<?php echo get_byt_file_uri('/images/ico/star.png'); ?>" alt="">
						<?php } ?>
					</span>

</div>
    <div class="col-lg-7">
	<?php $accommodation_obj->render_image_gallery(); ?>
    </div>
    <div class="col-lg-5">
    <?php 	get_sidebar('right-accommodation');  ?>
    </div>
	<section class="col-lg-12">  
    <?php do_action( 'byt_show_single_accommodation_availability_before' ); ?>  
    <div class="panel panel-primary">
    <div class="panel-heading"><?php _e('Select A Room', 'bookyourtravel'); ?></div>
    <form action="#">
        <label>From</label>
        <div class="datepicker-wrap"><input class="text-field textfield2" type="text" placeholder="mm / dd / yyyy" id="search_date_from" name="from" /></div>
        <input type="text" value="<?php echo $_SESSION['from_date']?>" />
        <label>To</label>
        <input type="text" value="<?php echo $_SESSION['to_date']?>" />
        <label>Rooms</label>
        <input type="text" />
        <label>Adult</label>
        <input type="text" value="1" />
        <label>Chlidren</label>
        <input type="text" value="0" />
        <input type="submit"  value="Update" />
        
    </form>
    <?php echo 'start'.$_SESSION['from_date'] .'end'.$_SESSION['to_date'].'room'.$_SESSION['room'];?>
                                
    <div class="panel-body">
     
			<?php 
			byt_render_field("text-wrap", "", "", $accommodation_obj->get_custom_field('availability_text'), '', false, true);
			$room_type_ids = $accommodation_obj->get_room_types();
			if ($room_type_ids && count($room_type_ids) > 0) { ?>
            
   
			<ul class="room-types">
				<?php 
				// Loop through the items returned				
				for ( $z = 0; $z < count($room_type_ids); $z++ ) {
					$room_type_id = $room_type_ids[$z];
					$room_type_obj = new byt_room_type(intval($room_type_id));
					$room_type_min_price = number_format (get_accommodation_min_price($accommodation_id, $room_type_id), $price_decimal_places, ".", "");
				?>
				<!--room_type-->
				<li id="room_type_<?php echo $room_type_id; ?>">
					<?php if ($room_type_obj->get_main_image('medium')) { ?>
					<figure class="left"><img src="<?php echo $room_type_obj->get_main_image('medium') ?>" alt="" /><a href="<?php echo $room_type_obj->get_main_image(); ?>" class="image-overlay" rel="prettyPhoto[gallery1]"></a></figure>
					<?php } ?>
					<div class="meta room_type">
						<h2><?php echo $room_type_obj->get_title(); ?></h2>
						<?php //byt_render_field('', '', '', $room_type_obj->get_custom_field('meta'), '', true, true); ?>
                        <?php byt_render_field('', '', __('Bed size:', 'bookyourtravel'), $room_type_obj->get_custom_field('bed_size'), '', false, true); ?><br />
                        <?php byt_render_field('', '', __('<b>Extra beds available</b>:', 'bookyourtravel'), $room_type_obj->get_custom_field('extra_beds_available'), '', false, true); ?><br />
                        <?php byt_render_field('', '', __('', 'bookyourtravel'), $room_type_obj->get_custom_field('room_size').' Square Metres', '', false, true) . ','. byt_render_field('', '', __('<b>Max Occupancy</b>:', 'bookyourtravel'), $room_type_obj->get_custom_field('max_guest_count').'Guests', '', false, true); ?> <br />
						<?php byt_render_link_button("#", "more-info", "", __('+ more info', 'bookyourtravel')); ?>
					</div>
                    <!--<div class="room-information">Best Value</div>-->
					<div class="room-information">
						<div class="row">
							<span class="first"><?php _e('Max:', 'bookyourtravel'); ?></span>
							<span class="second">
                            <?php byt_render_field('', '', __('', 'bookyourtravel'), $room_type_obj->get_custom_field('max_guest_count'), '', false, true); ?>
								<?php /*?><?php for ( $j = 0; $j < $room_type_obj->get_custom_field('max_count'); $j++ ) { ?>
								<img src="<?php echo get_byt_file_uri('/images/ico/person.png'); ?>" alt="" />
								<?php } ?><?php */?>
							</span>
						</div>
						<?php if ($room_type_min_price > 0) { ?>
						<div class="row">
							<span class="first"><?php _e('Rs:', 'bookyourtravel'); ?></span>
							<div class="second price">
								<em><span class="curr"><?php echo $currency_symbol; ?></span>
								<span class="amount"><?php echo $room_type_min_price; ?></span></em>
								<input type="hidden" class="max_count" value="<?php echo $room_type_obj->get_custom_field('max_count'); ?>" />
								<input type="hidden" class="max_child_count" value="<?php echo $room_type_obj->get_custom_field('max_child_count'); ?>" />
							</div>
						</div>
						<?php byt_render_link_button("#", "gradient-button book-accommodation", "book-accommodation-$room_type_id", __('Book', 'bookyourtravel')); ?>
						<?php } ?>
					</div>
					<div class="more-information">
						<?php byt_render_field('', '', __('Room facilities:', 'bookyourtravel'), $room_type_obj->get_facilities_string(), '', true, true); ?>
						<?php echo $room_type_obj->get_description(); ?>
                        <?php byt_render_field('', '', '', $room_type_obj->get_custom_field('meta'), '', true, true); ?>
						<?php //byt_render_field('', '', __('Bed size:', 'bookyourtravel'), $room_type_obj->get_custom_field('bed_size'), '', true, true); ?>
                        <?php //byt_render_field('', '', __('Max Occupancy:', 'bookyourtravel'), $room_type_obj->get_custom_field('max_guest_count').'Guests', '', true, true); ?>
						<?php //byt_render_field('', '', __('Room size:', 'bookyourtravel'), $room_type_obj->get_custom_field('room_size').'Square Metres', '', true, true); ?>
					</div>
				</li>
				<!--//room-->
				<?php 
				} 
				// Reset Second Loop Post Data
				wp_reset_postdata(); 
				// end while ?>
			</ul>	
            
            
			<?php } else if ($accommodation_obj->get_is_self_catered()) { 
				$accommodation_min_price = get_accommodation_min_price($accommodation_id, 0);
				if ($accommodation_min_price > 0) {
					byt_render_link_button("#", "gradient-button book-accommodation", "book-accommodation", __('Book', 'bookyourtravel'));
				} else {
					echo '<p>' . __('We are sorry, this accommodation is not available to book at the moment', 'bookyourtravel') . '</p>';
				 }
			} else { 
				byt_render_field('text-wrap', '', '', __('We are sorry, there are no rooms available at this accommodation at the moment', 'bookyourtravel'), '', true, true);
			} ?>
			<?php byt_render_tab_extra_fields('accommodation_extra_fields', $accommodation_extra_fields, 'availability', $accommodation_obj); ?>
			<?php do_action( 'byt_show_single_accommodation_availability_after' ); ?>

  </div>
</div>
    
	<!--inner navigation-->
	<nav class="inner-nav">
		<ul>
			<?php
			do_action( 'byt_show_single_accommodation_tab_items_before' );

			$first_display_tab = '';			
			$i = 0;
			if (is_array($tab_array) && count($tab_array) > 0) {
				foreach ($tab_array as $tab) {
				
					if (!isset($tab['hide']) || $tab['hide'] != '1') {
					
						$tab_label = '';
						if (isset($tab['label'])) {
							$tab_label = $tab['label'];
							$tab_label = get_translated_dynamic_string(get_option_id_context('accommodation_tabs') . ' ' . $tab['label'], $tab_label);
						}
					
						if($i==0)
							$first_display_tab = $tab['id'];
						if ($tab['id'] == 'reviews' && $enable_reviews) {
							byt_render_tab("accommodation", $tab['id'], '',  '<a href="#' . $tab['id'] . '" title="' . $tab_label . '">' . $tab_label . '</a>');
						} elseif ($tab['id'] == 'location' && !empty($accommodation_latitude) && !empty($accommodation_longitude)) {
							byt_render_tab("accommodation", $tab['id'], '',  '<a href="#' . $tab['id'] . '" title="' . $tab_label . '">' . $tab_label . '</a>');
						} elseif ($tab['id'] == 'things-to-do' && isset($accommodation_location)) {
							byt_render_tab("accommodation", $tab['id'], '',  '<a href="#' . $tab['id'] . '" title="' . $tab_label . '">' . $tab_label . '</a>');
						} else {
							byt_render_tab("accommodation", $tab['id'], '',  '<a href="#' . $tab['id'] . '" title="' . $tab_label . '">' . $tab_label . '</a>');
						}
					}
					$i++;
				}
			} 
			
			do_action( 'byt_show_single_accommodation_tab_items_after' ); 
			?>
		</ul>
	</nav>
	<!--//inner navigation-->
	<?php do_action( 'byt_show_single_accommodation_tab_content_before' );
    
    echo $date_from;
echo $date_to; ?>

	<section id="" class="tab-content <?php echo $first_display_tab == 'availability' ? 'initial' : ''; ?>">
		
	</section>	
	<!--description-->
	<section id="description" class="tab-content <?php echo $first_display_tab == 'description' ? 'initial' : ''; ?>  col-lg-12">
		<article>		
			<?php 
			do_action( 'byt_show_single_accommodation_description_before' );
			//byt_render_field("text-wrap", "", "", $accommodation_obj->get_description(), __('General', 'bookyourtravel'), false, false, false);
			byt_render_tab_extra_fields('accommodation_extra_fields', $accommodation_extra_fields, 'description', $accommodation_obj);
			do_action( 'byt_show_single_accommodation_description_after' ); 
			?>
            <?php do_action( 'byt_show_single_accommodation_facilites_before' ); ?>
			<?php 
			$facilities = $accommodation_obj->get_facilities();
			
			if ($facilities && count($facilities) > 0) { ?>
			<h1><?php _e('Services', 'bookyourtravel'); ?></h1>
			<div class="text-wrap">	
				<ul class="three-col">
				<?php
				for( $i = 0; $i < count($facilities); $i++) {
					$accommodation_facility = $facilities[$i];
					echo '<li>' . $accommodation_facility->name  . '</li>';
				} ?>					
				</ul>
			</div>
			<?php } // endif (!empty($accommodation_facilities)) ?>			
			<?php byt_render_tab_extra_fields('accommodation_extra_fields', $accommodation_extra_fields, 'facilities', $accommodation_obj); ?>			
			<?php do_action( 'byt_show_single_accommodation_facilites_after' ); ?>
            
            <?php 
			$generals = $accommodation_obj->get_generals();
			//var_dump($generals); exit;
			if ($generals && count($generals) > 0) { ?>
			<h1><?php _e('General Facilities', 'bookyourtravel'); ?></h1>
			<div class="text-wrap">	
				<ul class="three-col">
				<?php
				for( $i = 0; $i < count($generals); $i++) {
					$accommodation_general = $generals[$i];
					//var_dump($accommodation_general); exit;
					echo '<li>' . $accommodation_general->name  . '</li>';
				} ?>					
				</ul>
			</div>
			<?php } // endif (!empty($accommodation_facilities)) ?>			
			<?php //byt_render_tab_extra_fields('accommodation_extra_fields', $accommodation_extra_fields, 'facilities', $accommodation_obj); ?>	
            
             <?php 
			$areas = $accommodation_obj->get_common_areas();
			//var_dump($generals); exit;
			if ($areas && count($areas) > 0) { ?>
			<h1><?php _e('Extra Common Areas', 'bookyourtravel'); ?></h1>
			<div class="text-wrap">	
				<ul class="three-col">
				<?php
				for( $i = 0; $i < count($areas); $i++) {
					$accommodation_area = $areas[$i];
					//var_dump($accommodation_general); exit;
					echo '<li>' . $accommodation_area->name  . '</li>';
				} ?>					
				</ul>
			</div>
			<?php } // endif (!empty($accommodation_facilities)) ?>			
			<?php //byt_render_tab_extra_fields('accommodation_extra_fields', $accommodation_extra_fields, 'facilities', $accommodation_obj); ?>			
		</article>
	</section>
	<!--//description-->	
	<!--facilities-->
	<!--<section id="facilities" class="tab-content <?php echo $first_display_tab == 'facilities' ? 'initial' : ''; ?>">
		<article>
			
		</article>
	</section>-->
	<!--//facilities-->
	<?php if ((!empty($accommodation_latitude)) && (!empty($accommodation_longitude))) { ?>
	<!--location-->
	<section id="location" class="tab-content <?php echo $first_display_tab == 'location' ? 'active' : ''; ?>">
		<article>
			<?php do_action( 'byt_show_single_accommodation_location_before' ); ?>
			<!--<div class="gmap" id="map_canvas"></div>-->
			<?php byt_render_tab_extra_fields('accommodation_extra_fields', $accommodation_extra_fields, 'location', $accommodation_obj); ?>			
			<?php do_action( 'byt_show_single_accommodation_location_after' ); ?>
		</article>
	</section>
	<!--//location-->
	<?php }  ?>
	<?php if ($enable_reviews) { ?>
	<!--reviews-->
	<section id="reviews" class="tab-content <?php echo $first_display_tab == 'review' ? 'initial' : ''; ?>">
		<?php 
		do_action( 'byt_show_single_accommodation_reviews_before' );
		get_template_part('includes/parts/review', 'item'); 
		byt_render_tab_extra_fields('accommodation_extra_fields', $accommodation_extra_fields, 'reviews', $accommodation_obj); 
		do_action( 'byt_show_single_accommodation_reviews_after' ); 
		?>
	</section>
	<!--//reviews-->	
	<?php } // if ($enable_reviews) ?>
	<?php 
	if ($accommodation_location != null) { ?>
	<!--things to do-->
	<section id="things-to-do" class="tab-content <?php echo $first_display_tab == 'things-to-do' ? 'initial' : ''; ?>">
		<article>
			<?php do_action( 'byt_show_single_accommodation_location_before' ); ?>
			<?php 
				byt_render_field("", "", "", byt_render_image('', '', $accommodation_location->get_main_image(), $accommodation_location->get_title(), $accommodation_location->get_title(), false) . $accommodation_location->get_excerpt(), $accommodation_location->get_title());
				byt_render_field("", "", "", byt_render_image('', '', $accommodation_location->get_custom_field_image_uri('sports_and_nature_image', 'medium'), __('Sports and nature', 'bookyourtravel'), __('Sports and nature', 'bookyourtravel'), false) . $accommodation_location->get_custom_field('sports_and_nature'), __('Sports and nature', 'bookyourtravel'));
				byt_render_field("", "", "", byt_render_image('', '', $accommodation_location->get_custom_field_image_uri('nightlife_image', 'medium'), __('Nightlife', 'bookyourtravel'), __('Nightlife', 'bookyourtravel'), false) . $accommodation_location->get_custom_field('nightlife'), __('Nightlife', 'bookyourtravel'));
				byt_render_field("", "", "", byt_render_image('', '', $accommodation_location->get_custom_field_image_uri('culture_and_history_image', 'medium'), __('Culture &amp; history', 'bookyourtravel'), __('Culture &amp; history', 'bookyourtravel'), false) . $accommodation_location->get_custom_field('culture_and_history'), __('Culture &amp; history', 'bookyourtravel'));
			?>
			<hr />
			<?php byt_render_link_button(get_permalink($accommodation_location->get_id()), "gradient-button right", "", __('Read more', 'bookyourtravel')); ?>
			<?php byt_render_tab_extra_fields('accommodation_extra_fields', $accommodation_extra_fields, 'things-to-do', $accommodation_obj); ?>			
			<?php do_action( 'byt_show_single_accommodation_location_after' ); ?>
		</article>
	</section>
	<!--//things-to-do-->
	<?php } ?>
	<?php
	foreach ($tab_array as $tab) {
		if (count(byt_array_search($default_accommodation_tabs, 'id', $tab['id'])) == 0) {
		?>
			<section id="<?php echo $tab['id']; ?>" class="tab-content <?php echo ($first_display_tab == $tab['id'] ? 'initial' : ''); ?>">
				<article>
					<?php do_action( 'byt_show_single_accommodation_' . $tab['id'] . '_before' ); ?>
					<?php byt_render_tab_extra_fields('accommodation_extra_fields', $accommodation_extra_fields, $tab['id'], $accommodation_obj); ?>			
					<?php do_action( 'byt_show_single_accommodation_' . $tab['id'] . '_after' ); ?>
				</article>
			</section>
		<?php
		}
	}	
	do_action( 'byt_show_single_accommodation_tab_content_after' ); ?>
	</section>

<?php //echo get_you_also_like_posts();  ?>

	<!--//accommodation content-->	
<?php

} // end if
get_footer();