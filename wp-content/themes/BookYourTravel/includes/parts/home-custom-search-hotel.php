<?php 
	global $custom_search_results_page, $search_box_submit_button_text;
	global $enable_hotel_search, $enable_tour_search, $enable_self_catered_search, $enable_car_rental_search, $enable_cruise_search;
	global $search_box_what_text, $search_box_where_text, $search_box_when_text, $search_box_who_text, $search_box_submit_button_text;
	global $search_box_drivers_age_text, $search_box_guests_text, $search_box_car_type_text, $search_box_rooms_text, $search_box_cabins_text;	
		
					
	$searchable_count = 0;			
	if ($enable_hotel_search)
		$searchable_count++;
	if ($enable_self_catered_search)
		$searchable_count++;
	if ($enable_car_rental_search)
		$searchable_count++;	
	if ($enable_tour_search)
		$searchable_count++;
	if ($enable_cruise_search)
		$searchable_count++;	
		
	if ($searchable_count > 0) {
			
		$search_box_submit_button_text = of_get_option('search_box_submit_button_text', __('Proceed to results?', 'bookyourtravel'));
		$search_box_what_text = of_get_option('search_box_what_text', __('What?', 'bookyourtravel'));
		$search_box_where_text = of_get_option('search_box_where_text', __('Where?', 'bookyourtravel'));
		$search_box_when_text = of_get_option('search_box_when_text', __('When?', 'bookyourtravel'));
		$search_box_who_text = of_get_option('search_box_who_text', __('Who?', 'bookyourtravel'));
		
		$search_box_guests_text = of_get_option('search_box_guests_text', __('Guests', 'bookyourtravel'));
		$search_box_rooms_text = of_get_option('search_box_rooms_text', __('No of Rooms', 'bookyourtravel'));
		$search_box_cabins_text = of_get_option('search_box_cabins_text', __('Cabins', 'bookyourtravel'));
		$search_box_drivers_age_text = of_get_option('search_box_drivers_age_text', __("Driver's age?", 'bookyourtravel'));
		$search_box_car_type_text = of_get_option('search_box_car_type_text', __('Car type?', 'bookyourtravel'));
	?>
		<!--search-->
		<script>	
			window.searchAccommodationLocationLabel = '<?php echo of_get_option('search_box_accommodation_location_text', __('Your destination', 'bookyourtravel')); ?>';
			window.searchAccommodationLocationPlaceholder = '<?php echo of_get_option('search_box_accommodation_location_placeholder', __('City, region, district or specific accommodation', 'bookyourtravel')); ?>';
			window.searchCarRentalLocationLabel = '<?php echo of_get_option('search_box_car_rental_location_text', __('Pick up from', 'bookyourtravel')); ?>';
			window.searchCarRentalLocationPlaceholder = '<?php echo of_get_option('search_box_car_rental_location_placeholder', __('I want to pickup car in', 'bookyourtravel')); ?>';
			window.searchTourLocationLabel = '<?php echo of_get_option('search_box_tour_location_text', __('Tour location', 'bookyourtravel')); ?>';
			window.searchTourLocationPlaceholder = '<?php echo of_get_option('search_box_tour_location_placeholder', __('City, region, district or specific tour', 'bookyourtravel')); ?>';
			window.searchAccommodationDateFromLabel = '<?php echo of_get_option('search_box_accommodation_date_from_text', __('Check-in date', 'bookyourtravel')); ?>';
			window.searchAccommodationDateToLabel = '<?php echo of_get_option('search_box_accommodation_date_to_text', __('Check-out date', 'bookyourtravel')); ?>';
			window.searchCarRentalDateFromLabel = '<?php echo of_get_option('search_box_car_rental_date_from_text', __('Pick-up date', 'bookyourtravel')); ?>';
			window.searchCarRentalDateToLabel = '<?php echo of_get_option('search_box_car_rental_date_to_text', __('Drop-off date', 'bookyourtravel')); ?>';
			window.searchTourDateFromLabel = '<?php echo of_get_option('search_box_tour_date_from_text', __('Start date', 'bookyourtravel')); ?>';		
			window.searchCruiseDateFromLabel = '<?php echo of_get_option('search_box_cruise_date_from_text', __('Start date', 'bookyourtravel')); ?>';	
		</script>
		<div class="search-widget">
        <div class="search-headingbg"> BOOK NOW & PAY LATER AT THE HOTEL ! </div>
			<form id="main-search" method="get" action="<?php echo $custom_search_results_page; ?>">
				<?php 			
				render_home_search_what_column($searchable_count); 
				?>
				<div class=" <?php echo ($searchable_count <= 1) ? 'first' : ''?>">
					<div class="form">
						<?php
						render_home_search_where_column($searchable_count);
						render_home_search_when_column($searchable_count);
						render_home_search_who_column($searchable_count);
						?>
						<input type="submit" value="Search Hotels" class="search-btnbg" id="search-submit" />
					</div><!--//.form-->
				</div><!--.forms-->
			</form>
            <!--//search-->	
<?php	
	}
	
	function render_home_search_where_column($searchable_count) {
		global $enable_hotel_search, $enable_tour_search, $enable_self_catered_search, $enable_car_rental_search, $enable_cruise_search;
		global $search_box_what_text, $search_box_where_text, $search_box_when_text, $search_box_who_text, $home_search_box_column_count;
	?>
		<!--column-->
		<div class="fullwidth"> <b class="destination-heading">Destination </b>
			<script>
				window.whereCount = <?php echo $home_search_box_column_count; ?>;
			</script>
			<!--<h4><span class="where_count">0<?php echo $home_search_box_column_count; ?></span> <?php echo $search_box_where_text; ?></h4>-->
			<div class="f-item">
				<!--<label for="search_term"></label>-->
				<input type="text" placeholder="" class="text-field" id="search_term" name="term" />
			</div>
		</div>
		<!--//column-->
	<?php 
		$home_search_box_column_count++;
	}
	
	function render_home_search_when_column($searchable_count) {
		global $search_box_when_text, $home_search_box_column_count;	
	?>
		<!--column-->
		
			<script>
				window.whenCount = <?php echo $home_search_box_column_count; ?>;
			</script>
			<!--<h4><span class="when_count">0<?php echo $home_search_box_column_count; ?></span> <?php echo $search_box_when_text; ?></h4>-->
            
			<div class="one-half textfield-cont f-item datepicker"> 
				<label for="search_date_from"></label>
				<div class="datepicker-wrap"><input class="text-field textfield2" type="text" placeholder="mm / dd / yyyy" id="search_date_from" name="from" /></div>
			</div>
			<div class="one-half last textfield-cont f-item datepicker">
				<label for="search_date_to"></label>
				<div class="datepicker-wrap"><input class="text-field textfield2"  type="text" placeholder="mm / dd / yyyy" id="search_date_to" name="to" /></div>
			</div>
		
		<!--//column-->
	<?php
		$home_search_box_column_count++;
	}
	
	function render_home_search_who_column($searchable_count) {
		global $search_box_who_text, $home_search_box_column_count, $search_box_drivers_age_text, $search_box_guests_text, $search_box_car_type_text, $search_box_rooms_text, $search_box_cabins_text;	

		$car_types_args = array(
			'orderby'       => 'name', 
			'order'         => 'ASC',
			'hide_empty'    => true, 
			'fields'        => 'all', 
		); 
		$car_types = get_terms(array('car_type'), $car_types_args);
	?>
		<!--column-->
		
			<script>
				window.whoCount = <?php echo $home_search_box_column_count; ?>;
			</script>
			<!--<h4><span class="who_count">0<?php echo $home_search_box_column_count; ?></span> <?php echo $search_box_who_text; ?></h4>-->
			<div class="f-item spinner">
				<label for="search_guests"><?php echo $search_box_guests_text; ?></label>
				<input type="text" id="search_guests" name="guests" />
			</div>
			<div class="f-item spinner small">
				<label for="search_age"><?php echo $search_box_drivers_age_text; ?></label>
				<input type="text" id="search_age" name="age" />
			</div>
			<?php if ($car_types && count($car_types) > 0) { ?>
			<div class="f-item">
				<label for="search_car_type"><?php echo $search_box_car_type_text; ?></label>
				<select name="car_type" id="search_car_type">
					<option selected="selected" value=""><?php _e('No Preference', 'bookyourtravel'); ?></option>
					<?php foreach ($car_types as $car_type) {
						echo "<option value='{$car_type->term_id}'>{$car_type->name}</option>";
					}?>
				</select>
			</div>
			<?php } ?>
		<div class="one-third">
				<label for="search_rooms"><?php echo $search_box_rooms_text; ?></label>
				<!--<input type="text" id="search_rooms" name="rooms" />-->
    <select id="search_rooms" name="rooms" class="selectfield">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
			
             <div class="one-third">Adults
    <select name="adults" class="selectfield">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="one-third last">Children
    <select name="childrens" class="selectfield">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
            
			<div class="f-item spinner">
				<label for="search_cabins"><?php echo $search_box_cabins_text; ?></label>
				<input type="text" id="search_cabins" name="cabins" />
			</div>
		</div>
		<!--//column-->	
	<?php
		$home_search_box_column_count++;
	}

	function render_home_search_what_column($searchable_count) {
		global $enable_hotel_search, $enable_tour_search, $enable_self_catered_search, $enable_car_rental_search, $enable_cruise_search;
		global $search_box_what_text, $search_box_where_text, $search_box_when_text, $search_box_who_text, $home_search_box_column_count;

		$home_search_box_column_count = 1;

		if ($searchable_count > 1) { ?>
			<!--column-->
			<div class="column radios hidden">
				<script>
					window.whatCount = <?php echo $home_search_box_column_count; ?>;
				</script>
				<h4><span class="what_count">0<?php echo $home_search_box_column_count; ?></span> <?php echo $search_box_what_text; ?></h4>
				<?php if ($enable_hotel_search) {?>
				<script>window.activeSearchableNumber = 1;</script>
				<div class="f-item checked" >
					<input type="radio" name="what" id="hotel" value="1" checked="checked" />
					<label for="hotel"> <?php _e('Hotel', 'bookyourtravel'); ?></label>
				</div>
				<?php } ?>
				<?php if ($enable_self_catered_search) { 
				if (!$enable_hotel_search) {
				?>
				<script>window.activeSearchableNumber = 2;</script>
				<?php } ?>
				<div class="f-item <?php echo $enable_hotel_search ? '' : 'active'?>" >
					<input type="radio" name="what" id="self_catered" value="2" <?php echo $enable_hotel_search ? '' : ' checked="checked"' ?> />
					<label for="self_catered"> <?php _e('Self Catering', 'bookyourtravel'); ?></label>
				</div>
				<?php } ?>
				<?php if ($enable_car_rental_search) {
				if (!$enable_hotel_search && !$enable_self_catered_search) {
				?>
				<script>window.activeSearchableNumber = 3;</script>
				<?php } ?>
				<div class="f-item <?php echo ($enable_hotel_search || $enable_self_catered_search) ? '' : 'active'?>">
					<input type="radio" name="what" id="car_rental" value="3" <?php echo ($enable_hotel_search || $enable_self_catered_search) ? '' : ' checked="checked"' ?> />
					<label for="car_rental"> <?php _e('Rent a Car', 'bookyourtravel'); ?></label>
				</div>
				<?php } ?>
				<?php if ($enable_tour_search) {
				if (!$enable_hotel_search && !$enable_self_catered_search && !$enable_car_rental_search) {
				?>
				<script>window.activeSearchableNumber = 4;</script>
				<?php } ?>
				<div class="f-item <?php echo ($enable_hotel_search || $enable_self_catered_search || $enable_car_rental_search) ? '' : 'active'?>" >
					<input type="radio" name="what" id="tour" value="4" <?php echo ($enable_hotel_search || $enable_self_catered_search || $enable_car_rental_search) ? '' : ' checked="checked"' ?> />
					<label for="tour"> <?php _e('Tour', 'bookyourtravel'); ?></label>
				</div>
				<?php } ?>
				<?php if ($enable_cruise_search) {
				if (!$enable_hotel_search && !$enable_self_catered_search && !$enable_car_rental_search && !$enable_tour_search) {
				?>
				<script>window.activeSearchableNumber = 5;</script>
				<?php } ?>
				<div class="f-item <?php echo ($enable_hotel_search || $enable_self_catered_search || $enable_car_rental_search || $enable_tour_search) ? '' : 'active'?>" >
					<input type="radio" name="what" id="cruise" value="5" <?php echo ($enable_hotel_search || $enable_self_catered_search || $enable_car_rental_search || $enable_tour_search) ? '' : ' checked="checked"' ?> />
					<label for="cruise"> <?php _e('Cruise', 'bookyourtravel'); ?></label>
				</div>
				<?php } ?>
			</div>
			<!--//column-->
		<?php
			$home_search_box_column_count++;
		} else {
			if ($enable_hotel_search) {
				echo '<input type="hidden" id="what" name="what" value="1" />';
				echo '<script>window.activeSearchableNumber = 1;</script>';
			} elseif ($enable_self_catered_search) {
				echo '<input type="hidden" id="what" name="what" value="2" />';
				echo '<script>window.activeSearchableNumber = 2;</script>';
			} elseif ($enable_car_rental_search) {
				echo '<input type="hidden" id="what" name="what" value="3" />';
				echo '<script>window.activeSearchableNumber = 3;</script>';
			} elseif ($enable_tour_search) {
				echo '<input type="hidden" id="what" name="what" value="4" />';
				echo '<script>window.activeSearchableNumber = 4;</script>';
			} elseif ($enable_cruise_search) {
				echo '<input type="hidden" id="what" name="what" value="5" />';
				echo '<script>window.activeSearchableNumber = 5;</script>';
			}
		}
	}
	?>
	
	<!--<div class="search-widget">
   
   <div class="search-headingbg"> BOOK NOW & PAY LATER AT THE HOTEL ! </div>
   
   <div class="fullwidth"> 
   <b class="destination-heading">Destination </b>
   <input name="" type="text" class="text-field" value="e.g. city, region, district or specific hotel">
   </div>
   
     <div class="one-half textfield-cont"> 
     Check-in Date
      <input name="" type="text" class="text-field textfield2"  value="mm / dd / yyyy">
      </div>
       <div class="one-half last textfield-cont"> 
       
       Check-out Date
       
        <input name="" type="text" class="text-field textfield2"  value="mm / dd / yyyy">
       
       </div>
       
        <div class="one-third">
        No of Rooms 
        <select name="" class="selectfield">
          <option>1</option>
           <option>2</option>
            <option>3</option>
             <option>4</option>
              <option>5</option>
        </select>
        
        </div>
        <div class="one-third">Adults 
         <select name="" class="selectfield">
          <option>1</option>
           <option>2</option>
            <option>3</option>
             <option>4</option>
              <option>5</option>
        </select>
        </div>
        <div class="one-third last">Children 
         <select name="" class="selectfield">
          <option>1</option>
           <option>2</option>
            <option>3</option>
             <option>4</option>
              <option>5</option>
        </select>
         </div>
         
         <input name="" type="button" value="Search Hotels" class="search-btnbg">
   
   </div>-->
   
   
  