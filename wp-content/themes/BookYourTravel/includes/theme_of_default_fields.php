<?php

function get_default_tab_array($option_id) {

	global $default_accommodation_tabs, $default_tour_tabs, $default_car_rental_tabs, $default_location_tabs, $default_cruise_tabs;

	$tab_array = array();
	
	if ($option_id == 'accommodation_tabs') {
		$tab_array = $default_accommodation_tabs;
	} elseif ($option_id == 'tour_tabs') {
		$tab_array = $default_tour_tabs;
	} elseif ($option_id == 'car_rental_tabs') {
		$tab_array = $default_car_rental_tabs;
	} elseif ($option_id == 'location_tabs') {
		$tab_array = $default_location_tabs;
	} elseif ($option_id == 'cruise_tabs') {
		$tab_array = $default_cruise_tabs;
	}
	
	return $tab_array;
}

function get_default_review_fields_array($option_id) {
	
	global $default_accommodation_review_fields, $default_tour_review_fields, $default_cruise_review_fields;
	$default_values = array();
	
	if ($option_id == 'accommodation_review_fields') {
		$default_values = $default_accommodation_review_fields;
	} elseif ($option_id == 'tour_review_fields') {
		$default_values = $default_tour_review_fields;
	} elseif ($option_id == 'cruise_review_fields') {
		$default_values = $default_cruise_review_fields;
	}
	
	return $default_values;
}

global $repeatable_field_types;
$repeatable_field_types = array(
	'text' => __('Text field', 'bookyourtravel'),
	'textarea' => __('Text area field', 'bookyourtravel'),
	'image' => __('Image field', 'bookyourtravel')
);

// Accommodations
global $default_accommodation_tabs;
$default_accommodation_tabs = array(
	array('label' => __('Availability', 'bookyourtravel'), 'id' => 'availability', 'hide' => 0),
	array('label' => __('Description', 'bookyourtravel'), 'id' => 'description', 'hide' => 0),
	array('label' => __('Facilities', 'bookyourtravel'), 'id' => 'facilities', 'hide' => 0),
	array('label' => __('General', 'bookyourtravel'), 'id' => 'general', 'hide' => 0),
	array('label' => __('Area', 'bookyourtravel'), 'id' => 'area', 'hide' => 0),
	array('label' => __('Location', 'bookyourtravel'), 'id' => 'location', 'hide' => 0),
	array('label' => __('Things to do', 'bookyourtravel'), 'id' => 'things-to-do', 'hide' => 0),
	array('label' => __('Reviews', 'bookyourtravel'), 'id' => 'reviews', 'hide' => 0)
);

global $default_accommodation_extra_fields;
$default_accommodation_extra_fields = array(
	array('label' => __('Check-in time', 'bookyourtravel'), 'id' => 'check_in_time', 'type' => 'text', 'tab_id' => 'description', 'hide' => 0),
	array('label' => __('Check-out time', 'bookyourtravel'), 'id' => 'check_out_time', 'type' => 'text', 'tab_id' => 'description', 'hide' => 0),
	array('label' => __('Cancellation / Prepayment', 'bookyourtravel'), 'id' => 'cancellation_prepayment', 'type' => 'textarea', 'tab_id' => 'description', 'hide' => 0),
	array('label' => __('Children and extra beds', 'bookyourtravel'), 'id' => 'children_and_extra_beds', 'type' => 'textarea', 'tab_id' => 'description', 'hide' => 0),
	array('label' => __('Pets', 'bookyourtravel'), 'id' => 'pets', 'type' => 'textarea', 'tab_id' => 'description', 'hide' => 0),
	array('label' => __('Accepted credit cards', 'bookyourtravel'), 'id' => 'accepted_credit_cards', 'type' => 'textarea', 'tab_id' => 'description', 'hide' => 0),
	array('label' => __('Activities', 'bookyourtravel'), 'id' => 'activities', 'type' => 'textarea', 'tab_id' => 'facilities', 'hide' => 0),
	array('label' => __('Internet', 'bookyourtravel'), 'id' => 'internet', 'type' => 'textarea', 'tab_id' => 'facilities', 'hide' => 0),
	array('label' => __('Parking', 'bookyourtravel'), 'id' => 'parking', 'type' => 'textarea', 'tab_id' => 'facilities', 'hide' => 0),
	array('label' => __('General', 'bookyourtravel'), 'id' => 'general', 'hide' => 0),
	array('label' => __('Areas', 'bookyourtravel'), 'id' => 'area', 'hide' => 0),
);

// Tours
global $default_tour_tabs;
$default_tour_tabs = array(
	array('label' => __('Description', 'bookyourtravel'), 'id' => 'description', 'hide' => 0),
	array('label' => __('Availability', 'bookyourtravel'), 'id' => 'availability', 'hide' => 0),
	array('label' => __('Location', 'bookyourtravel'), 'id' => 'location', 'hide' => 0),
	array('label' => __('Reviews', 'bookyourtravel'), 'id' => 'reviews', 'hide' => 0)
);

global $default_tour_extra_fields;
$default_tour_extra_fields = array(
	array('label' => __('Activities', 'bookyourtravel'), 'id' => 'activities', 'type' => 'textarea', 'tab_id' => 'description', 'hide' => 0),
);

// Car rentals
global $default_car_rental_tabs;
$default_car_rental_tabs = array(
	array('label' => __('Description', 'bookyourtravel'), 'id' => 'description', 'hide' => 0)
);

global $default_car_rental_extra_fields;
$default_car_rental_extra_fields = array(
	array('label' => __('CO2 emission', 'bookyourtravel'), 'id' => 'co2_emission', 'type' => 'text', 'tab_id' => 'description', 'hide' => 0)
);

// Locations
global $default_location_tabs;
$default_location_tabs = array(
	array('label' => __('General information', 'bookyourtravel'), 'id' => 'general_info', 'hide' => 0),
	array('label' => __('Sports &amp; nature', 'bookyourtravel'), 'id' => 'sports_and_nature', 'hide' => 0),
	array('label' => __('Nightlife', 'bookyourtravel'), 'id' => 'nightlife', 'hide' => 0),
	array('label' => __('Culture and history', 'bookyourtravel'), 'id' => 'culture', 'hide' => 0),
	array('label' => __('Hotels', 'bookyourtravel'), 'id' => 'hotels', 'hide' => 0),
	array('label' => __('Self catered', 'bookyourtravel'), 'id' => 'self-catered', 'hide' => 0),
	array('label' => __('Tours', 'bookyourtravel'), 'id' => 'tours', 'hide' => 0),
);

global $default_location_extra_fields;
$default_location_extra_fields = array(
	array('label' => __('Sports &amp; nature', 'bookyourtravel'), 'id' => 'sports_and_nature', 'type' => 'textarea', 'tab_id' => 'sports_and_nature', 'hide' => 0),
	array('label' => __('Sports and nature image', 'bookyourtravel'), 'id' => 'sports_and_nature_image', 'type' => 'image', 'tab_id' => 'sports_and_nature', 'hide' => 0),
	array('label' => __('Nightlife info', 'bookyourtravel'), 'id' => 'nightlife', 'type' => 'textarea', 'tab_id' => 'nightlife', 'hide' => 0),
	array('label' => __('Nightlife image', 'bookyourtravel'), 'id' => 'nightlife_image', 'type' => 'image', 'tab_id' => 'nightlife', 'hide' => 0),
	array('label' => __('Culture and history info', 'bookyourtravel'), 'id' => 'culture_and_history', 'type' => 'textarea', 'tab_id' => 'culture', 'hide' => 0),
	array('label' => __('Culture and history image', 'bookyourtravel'), 'id' => 'culture_and_history_image', 'type' => 'image', 'tab_id' => 'culture', 'hide' => 0),
	array('label' => __('Visa requirements', 'bookyourtravel'), 'id' => 'visa_requirements', 'type' => 'textarea', 'tab_id' => 'general_info', 'hide' => 0),
	array('label' => __('Languages spoken', 'bookyourtravel'), 'id' => 'languages_spoken', 'type' => 'text', 'tab_id' => 'general_info', 'hide' => 0),
	array('label' => __('Currency used', 'bookyourtravel'), 'id' => 'currency', 'type' => 'text', 'tab_id' => 'general_info', 'hide' => 0),
	array('label' => __('Area (km2)', 'bookyourtravel'), 'id' => 'area', 'type' => 'text', 'tab_id' => 'general_info', 'hide' => 0),
);

// Cruises
global $default_cruise_tabs;
$default_cruise_tabs = array(
	array('label' => __('Description', 'bookyourtravel'), 'id' => 'description', 'hide' => 0),
	array('label' => __('Availability', 'bookyourtravel'), 'id' => 'availability', 'hide' => 0),
	array('label' => __('Facilities', 'bookyourtravel'), 'id' => 'facilities', 'hide' => 0),
	array('label' => __('Reviews', 'bookyourtravel'), 'id' => 'reviews', 'hide' => 0)
);

global $default_cruise_extra_fields;
$default_cruise_extra_fields = array(
	array('label' => __('Departure time', 'bookyourtravel'), 'id' => 'check_in_time', 'type' => 'text', 'tab_id' => 'description', 'hide' => 0),
	array('label' => __('Arrival time', 'bookyourtravel'), 'id' => 'check_out_time', 'type' => 'text', 'tab_id' => 'description', 'hide' => 0),
	array('label' => __('Cancellation / Prepayment', 'bookyourtravel'), 'id' => 'cancellation_prepayment', 'type' => 'textarea', 'tab_id' => 'description', 'hide' => 0),
	array('label' => __('Pets', 'bookyourtravel'), 'id' => 'pets', 'type' => 'textarea', 'tab_id' => 'description', 'hide' => 0),
	array('label' => __('Accepted credit cards', 'bookyourtravel'), 'id' => 'accepted_credit_cards', 'type' => 'textarea', 'tab_id' => 'description', 'hide' => 0),
	array('label' => __('Activities', 'bookyourtravel'), 'id' => 'activities', 'type' => 'textarea', 'tab_id' => 'facilities', 'hide' => 0),
	array('label' => __('Internet', 'bookyourtravel'), 'id' => 'internet', 'type' => 'textarea', 'tab_id' => 'facilities', 'hide' => 0),

);

global $default_accommodation_review_fields;
$default_accommodation_review_fields = array(
	array('label' => __('Cleanliness', 'bookyourtravel'), 'id' => 'review_cleanliness', 'post_type' => 'accommodation', 'hide' => 0),
	array('label' => __('Comfort', 'bookyourtravel'), 'id' => 'review_comfort', 'post_type' => 'accommodation', 'hide' => 0),
	array('label' => __('Location', 'bookyourtravel'), 'id' => 'review_location', 'post_type' => 'accommodation', 'hide' => 0),
	array('label' => __('Staff', 'bookyourtravel'), 'id' => 'review_staff', 'post_type' => 'accommodation', 'hide' => 0),
	array('label' => __('Services', 'bookyourtravel'), 'id' => 'review_services', 'post_type' => 'accommodation', 'hide' => 0),
	array('label' => __('Value for money', 'bookyourtravel'), 'id' => 'review_value_for_money', 'post_type' => 'accommodation', 'hide' => 0),
	array('label' => __('Sleep quality', 'bookyourtravel'), 'id' => 'review_sleep_quality', 'post_type' => 'accommodation', 'hide' => 0),
);

global $default_tour_review_fields;
$default_tour_review_fields = array(
	array('label' => __('Overall', 'bookyourtravel'), 'id' => 'review_overall', 'post_type' => 'tour', 'hide' => 0),
	array('label' => __('Accommodation', 'bookyourtravel'), 'id' => 'review_accommodation', 'post_type' => 'tour', 'hide' => 0),
	array('label' => __('Transport', 'bookyourtravel'), 'id' => 'review_transport', 'post_type' => 'tour', 'hide' => 0),
	array('label' => __('Meals', 'bookyourtravel'), 'id' => 'review_meals', 'post_type' => 'tour', 'hide' => 0),
	array('label' => __('Guide', 'bookyourtravel'), 'id' => 'review_guide', 'post_type' => 'tour', 'hide' => 0),
	array('label' => __('Value for money', 'bookyourtravel'), 'id' => 'review_value_for_money', 'post_type' => 'tour', 'hide' => 0),
	array('label' => __('Program accuracy', 'bookyourtravel'), 'id' => 'review_program_accuracy', 'post_type' => 'tour', 'hide' => 0),
);

global $default_cruise_review_fields;
$default_cruise_review_fields = array(
	array('label' => __('Overall', 'bookyourtravel'), 'id' => 'review_overall', 'post_type' => 'cruise', 'hide' => 0),
	array('label' => __('Accommodation', 'bookyourtravel'), 'id' => 'review_accommodation', 'post_type' => 'cruise', 'hide' => 0),
	array('label' => __('Transport', 'bookyourtravel'), 'id' => 'review_transport', 'post_type' => 'cruise', 'hide' => 0),
	array('label' => __('Meals', 'bookyourtravel'), 'id' => 'review_meals', 'post_type' => 'cruise', 'hide' => 0),
	array('label' => __('Guide', 'bookyourtravel'), 'id' => 'review_guide', 'post_type' => 'cruise', 'hide' => 0),
	array('label' => __('Value for money', 'bookyourtravel'), 'id' => 'review_value_for_money', 'post_type' => 'cruise', 'hide' => 0),
	array('label' => __('Entertainment', 'bookyourtravel'), 'id' => 'review_entertainment', 'post_type' => 'cruise', 'hide' => 0),
	array('label' => __('Program accuracy', 'bookyourtravel'), 'id' => 'review_program_accuracy', 'post_type' => 'cruise', 'hide' => 0),
);