<?php
global $accommodation_obj, $currency_symbol, $enc_key, $add_captcha_to_forms;

$c_val_1_acc = mt_rand(1, 20);
$c_val_2_acc = mt_rand(1, 20);

$c_val_1_acc_str = contact_encrypt($c_val_1_acc, $enc_key);
$c_val_2_acc_str = contact_encrypt($c_val_2_acc, $enc_key);

$accommodation_check_in_time = $accommodation_obj->get_custom_field('check_in_time');
$accommodation_check_out_time = $accommodation_obj->get_custom_field('check_out_time');
?>
<script>

    window.datepickerDateFormat = 'yy-mm-dd';
    window.InvalidCaptchaMessage = <?php echo json_encode(__('Invalid captcha, please try again!', 'bookyourtravel')); ?>;
    window.bookingDateFrom = null;
    window.bookingDateTo = null;
    window.bookingFormFirstNameError = <?php echo json_encode(__('Please enter your first name', 'bookyourtravel')); ?>;
    window.bookingFormLastNameError = <?php echo json_encode(__('Please enter your last name', 'bookyourtravel')); ?>;
    window.bookingFormEmailError = <?php echo json_encode(__('Please enter valid email address', 'bookyourtravel')); ?>;
    window.bookingFormPhoneError = <?php echo json_encode(__('Please enter your phone number', 'bookyourtravel')); ?>;
    window.bookingFormConfirmEmailError1 = <?php echo json_encode(__('Please provide a confirm email', 'bookyourtravel')); ?>;
    window.bookingFormConfirmEmailError2 = <?php echo json_encode(__('Please enter the same email as above', 'bookyourtravel')); ?>;
    window.bookingFormAddressError = <?php echo json_encode(__('Please enter your address', 'bookyourtravel')); ?>;
    window.bookingFormCityError = <?php echo json_encode(__('Please enter your city', 'bookyourtravel')); ?>;
    window.bookingFormZipError = <?php echo json_encode(__('Please enter your zip code', 'bookyourtravel')); ?>;
    window.bookingFormDatesError = <?php echo json_encode(__('Please select booking dates', 'bookyourtravel')); ?>;
    window.bookingFormCountryError = <?php echo json_encode(__('Please enter your country', 'bookyourtravel')); ?>;

</script>	
<?php do_action('byt_show_accommodation_booking_form_before'); ?>
<div class="container"> 
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-9 booking-formleft">
            <form id="accommodation-booking-form" method="post" action="" class="booking" style="display:none">
                <h4 class="alert alert-success">Congratulations! You've got the best deal in HOTEL</h4>
                <div class="booking-formheading">
                    <!--<span>01 </span>--> You have to pay AMOUNT directly at the hotel.<?php //_e('Submit booking', 'bookyourtravel')  ?>
                    <div class="booking-formpayment">(Payment details subject to hotel's terms and conditions)</div>
                </div>

                <div class="error" style="display:none;"><div><p></p></div></div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-4"> 
                        <label for="first_name"><?php _e('First name *', 'bookyourtravel') ?></label>
                        <input type="text" id="first_name" name="first_name" data-required />
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-4"> 
                        <label for="last_name"><?php _e('Last name *', 'bookyourtravel') ?></label>
                        <input type="text" id="last_name" name="last_name" data-required />
                    </div>			
                    <div class="col-xs-12 col-sm-10 col-md-8"> 
                        <label for="email"><?php _e('Email address *', 'bookyourtravel') ?></label>
                        <input type="email" id="email" name="email" data-required />
                    </div>

                    <div class="col-xs-12 col-sm-10 col-md-8"> 

                        <label for="confirm_email"><?php _e('Confirm email address *', 'bookyourtravel') ?></label>
                        <input type="email" id="confirm_email" name="confirm_email" data-required data-conditional="confirm" />
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-4 confim-txt">   <div class="row"> <?php _e('You\'ll receive a confirmation email', 'bookyourtravel') ?>  </div> </div>
                    <div class="clearfix"> </div>

                    <div class="col-xs-12 col-sm-5 col-md-4"> 
                        <label for="phone"><?php _e('Phone *', 'bookyourtravel') ?></label>
                        <input type="text" id="phone" name="phone" data-required />
                    </div>

                    <div class="col-xs-12 col-sm-5 col-md-4 select-field2"> 
                        <label for="zip"><?php _e('Postal Code *', 'bookyourtravel') ?></label>
                        <input type="text" id="zip" name="zip" data-required />
                    </div>

                    <div class="col-xs-12 col-sm-10 col-md-8">
                        <label for="address"><?php _e('Street Address and Number *', 'bookyourtravel') ?></label>
                        <input type="text" id="address" name="address" data-required />
                    </div>
                    <div class="clearfix">  </div>
                    <div class="col-xs-12 col-sm-5 col-md-4"> 
                        <label for="town"><?php _e('Town / City *', 'bookyourtravel') ?></label>
                        <input type="text" id="town" name="town" data-required />
                    </div>

                    <div class="col-xs-12 col-sm-5 col-md-4 select-field2"> 
                        <label for="country"><?php _e('Country *', 'bookyourtravel') ?></label>
                        <input type="text" id="country" name="country" data-required />
                    </div>		
                    <div class="col-xs-12 col-sm-8 col-md-8" style="display: none;"> 
                        <label><?php _e('Booking dates', 'bookyourtravel') ?></label>
                        <div id="accommodation_vacancy_datepicker"></div>
                    </div>
                    <div class="row loading" id="datepicker_loading" style="display:none;">
                        <div class="ball"></div>
                        <div class="ball1"></div>
                    </div>
                    <div class="row twins dates_row" style="display:none;">
                        <div class="col-xs-12 col-sm-8 col-md-8"> 
                            <label><?php _e('Check-in from', 'bookyourtravel') ?></label>
                            <span id="date_from_text"></span>
                            <?php
                            echo $_SESSION['from_date'] . "----" . $_SESSION['to_date'];
                            $from_dt = new DateTime($_SESSION['from_date'], new DateTimeZone('UTC'));
                            $from_date = str_pad($from_dt->getTimestamp(), 13, 0, STR_PAD_RIGHT) . "\n";
                            $to_dt = new DateTime($_SESSION['to_date'], new DateTimeZone('UTC'));
                            $to_date = str_pad($to_dt->getTimestamp(), 13, 0, STR_PAD_RIGHT) . "\n";
                            ?>
                            <input type="hidden" name="selected_date_from" id="selected_date_from" value="<?php echo $from_date; ?>" />
                            <?php
                            if (!empty($accommodation_check_in_time)) {
                                echo ' ' . $accommodation_check_in_time;
                            }
                            ?>
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8"> 
                            <label><?php _e('Check out at', 'bookyourtravel') ?></label>
                            <span id="date_to_text"></span>
                            <input type="hidden" name="selected_date_to" id="selected_date_to" value="<?php echo $to_date; ?>" />
                            <?php
                            if (!empty($accommodation_check_out_time)) {
                                echo ' ' . $accommodation_check_out_time;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row triplets bf_room_type_row">
                        <div class="col-xs-12 col-sm-8 col-md-8" style="display:none;"> 
                            <label for="booking_form_adults"><?php _e('Adults', 'bookyourtravel') ?></label>
                            <select id="booking_form_adults" name="booking_form_adults">
                                <option value="<?php echo $_SESSION['adult']?>"></option><!--custom added-->
                            </select>
                        </div>
                        <div class="f-item booking_form_children" style="display: none;">
                            <label for="booking_form_children"><?php _e('Children', 'bookyourtravel') ?></label>
                            <select id="booking_form_children" name="booking_form_children">
                                <option value="<?php echo $_SESSION['children']?>"></option><!--custom added-->
                            </select>
                        </div>
                        <div class="f-item bf_room_type_cell" style="display:none;">
                            <label><?php _e('Room type', 'bookyourtravel') ?></label>
<!--                            <span id="room_type"></span>-->
                            <input type="hidden" name="room_type_id" id="room_type_id" />
                        </div>
                    </div>

<!--                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-4">
                            <label><?php _e('Special requirements: <span>(Not Guaranteed)</span>', 'bookyourtravel') ?></label>
                            <textarea id="requirements" name="requirements" rows="10" cols="50"></textarea>
                        </div>
                        <span class="info"><?php _e('Please write your requests in English.', 'bookyourtravel') ?></span>
                    </div>-->
                    <?php if ($add_captcha_to_forms) { ?>
                        <div class="row captcha">
                            <div class="col-xs-12 col-sm-5 col-md-4">
                                <label><?php echo sprintf(__('How much is %d + %d', 'bookyourtravel'), $c_val_1_acc, $c_val_2_acc) ?>?</label>
                                <input type="text" required="required" id="c_val_s_acc" name="c_val_s_acc" />
                                <input type="hidden" name="c_val_1_acc" id="c_val_1_acc" value="<?php echo $c_val_1_acc_str; ?>" />
                                <input type="hidden" name="c_val_2_acc" id="c_val_2_acc" value="<?php echo $c_val_2_acc_str; ?>" />
                            </div>
                        </div>
                    <?php } ?>



                    <div class="col-xs-12 col-sm-12 col-md-12 ">  <div class="guest-heading"> Guest Information </div></div>

                    <div class="col-xs-12 col-sm-12 col-md-12 guestfield"> 
                        <b> Purpose of your trip </b> <br/>

                        <input class="" name="purpose" type="radio" value="Leisure" checked> Leisure
                        <label><input class="" name="purpose" type="radio" value="Business">  Business</label>

                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12 guestfield"> 
                        <b>Your estimated time of arrival (Optional)</b> <br/>

                        Your estimated time of arrival (Optional)
                    </div>



                    <div class="col-xs-12 col-sm-6 col-md-5 guestfield"> 
                        <select id="time_zone " name="time_zone">
                            <option>UK</option>
                        </select>

                    </div>



                    <div class="col-xs-12 col-sm-2 col-md-4 confim-txt2">   <div class="row">  - Time is for 	time zone </div> </div>
                    <div class="clearfix"></div>

                    <div class="col-xs-12 col-sm-6 col-md-6 guestfield "> 
                        <b> Do you have any special requests? </b>
                        <br/> (e.g. late arrival, room on a higher/lower floor etc.) 
                        <textarea id="requirements" name="requirements" rows="" cols=""></textarea>
                        Please write your request in English

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 guestfield "> 
                        <input id="staying_at_hotel" name="staying_at_hotel" type="checkbox" value="1"> I am not staying at the hotel. I am making this booking for someone else.

                    </div>

                    <div class="col-xs-12 col-sm-5 col-md-4"> 
                         
                        
                        <label for="guest_first_name"><?php _e('1 Guest First Name', 'bookyourtravel') ?> </label>
                        <input type="text"  id="guest_first_name" name="guest_first_name" data-required />
                    </div> 

                    <div class="col-xs-12 col-sm-5 col-md-4"> 
                        
                        <label for="guest_last_name"><?php _e('1 Guest Last Name', 'bookyourtravel') ?></label>
                        <input type="text" id="guest_last_name" name="guest_last_name" data-required >

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 guestfield ">  

                        <div class="guest-heading"> Guest Information </div>

                        By continuing with your reservation you agree to the <a href="#">Terms and Conditions</a></div>



                    <div class="col-xs-12 col-sm-8 col-md-8"> 
                        <input type="hidden" name="room_count" id="room_count" value="1" />
                        <?php byt_render_submit_button("gradient-button", "submit-accommodation-booking", __('Submit booking', 'bookyourtravel')); ?>
                        <?php byt_render_link_button("#", "gradient-button cancel-accommodation-booking", "cancel-accommodation-booking", __('Cancel', 'bookyourtravel')); ?>
                    </div>
                </div>
            </form>
        </div>
        
        
        
        <div class="col-xs-12 col-sm-5 col-md-3 booking-formright price_row" style="display:none">
  <article class="panel panel2 panel-primary " >
            <div class="panel-heading">
        <h3 class="panel-title">Check details and book</h3>
      </div>
      
      <div class="booked-hoteldetails"> 
       <div class="row"> 
       
       <div class="col-xs-5 col-sm-5 col-md-5">
<!--         <img src="images/booked-hotelimg.jpg" width="77" height="52" alt="">-->
           
       </div>
         
         <div class="col-xs-7 col-sm-7 col-md-7"> 
         
         <div class="row"> <h2> <?php echo $accommodation_obj->get_title(); '' ?> </h2>
        <span class="stars pull-left"> 
             <?php for ($i=0;$i<$accommodation_obj->get_custom_field('star_count');$i++) { ?>
						<img src="<?php echo get_byt_file_uri('/images/ico/star.png'); ?>" alt="">
						<?php } ?>
        </span><br>
        
<!--           <img src="images/star.jpg" width="80" height="23" alt="">-->
           9-Fane Road, Off Mall 
Road, Lahore, PK



           
           </div>
           
           
         
         </div>
         
         
         
         </div>
         <div class="checkin-details"> 
Check-in		   <span> <?php $fm_dt = strtotime($_SESSION['from_date']); echo date("D, j M Y ", $fm_dt);?> </span> <br/>
Check-out		   <span> <?php $too_dt = strtotime($_SESSION['to_date']); echo date("D, j M Y ", $too_dt);?></span><br/>
For:	     <span>  1 Night, <?php echo $_SESSION['max_guest_count'];?> Persons,in 1 Room <br/> </span>

</div>

         
         
         
      <div class="approximate-details">
      
    <p> <b>  Approximate price in Pakistan? </b></p>

<p>  Average nightly rate	     <span><b>  Rs155.42 </b></span> </p>

<p> <b> <span style="float:left;" id="room_type"></span> , Free Parking, </b> Free 
Wireless Internet</p>
      
       </div>   
       
       
       <div class="days-rates">
           <table class="breakdown tablesorter">
                        <thead></thead>
                        <tfoot></tfoot>
                        <tbody></tbody>
                    </table>
           
<!--   Wednesday, 11, 5, 2014      <span>  Rs129.32 </span>
Thursday, 11, 6, 2014	       <span>  Rs115.71  </span>
Friday, 11, 7, 2014	       <span>  Rs115.71  </span>
Saturday, 11,8, 2014	      <span>   Rs136.13  </span>
Sunday, 11, 9, 2014	       <span>  Rs217.81 </span>
Monday, 11, 10, 2014	        <span> Rs217.81 </span>-->
      
       </div>
       
<!--       <div class="days-rates">
  <b> Taxes  </b>    <span> Rs149.19 </span>

      
       </div>-->
       
      
<!--         <div class="total-price"> 
    <p>  Total Pirce    <span> Rs1,081.68 </span> </p>
     
     <p> (including taxes)
(Nightly price breakdown may include 
rounding)</p>

<p> <b>  You will pay in the hotel's currency  </b> <span> 3,973.00</span> </p>
         
         </div>-->
         
      </div>
      
         
      <div class="total-price2"> 
      
      <div class="total-price-greenbg"> 
      Total due now      Rs,00
      </div>
      
     <div class="total-price2-txt"> You won't be charged now. You'll pay 
at the hotel. </div>
      
      </div>
      
      
      
      
      
      
      
      
      
      

  
    </article>
    
    
    
    
    <div class="booking-help"> 
    
    
<h2> Need help Booking? </h2>

<p> Call our customer services team on the 
number below to speak to one of our 
advisors who will help you with all of 
your holiday needs.</p>

<p> <img src="images/phone-icon2.jpg" width="31" height="31" alt=""> <b> Book online or call</b>  </p>
<p> <img src="images/flag.jpg" width="22" height="14" alt=""> <span> +44 (223) 60 88 169 </span> 
<i> Available 24/7 </i>  </p>
    
    </div>
    
    
      
      </div>
        
        
        
        <div class="col-xs-12 col-sm-5 col-md-3 booking-formright">
            <div class="row price_row" style="display:none">
                <div class="col-xs-12 col-sm-8 col-md-8"> 
                    <script>
                        window.adultCountLabel = <?php echo json_encode(__('Adults', 'bookyourtravel')); ?>;
                        window.pricePerAdultLabel = <?php echo json_encode(__('Price per adult', 'bookyourtravel')); ?>;
                        window.childCountLabel = <?php echo json_encode(__('Children', 'bookyourtravel')); ?>;
                        window.pricePerChildLabel = <?php echo json_encode(__('Price per child', 'bookyourtravel')); ?>;
                        window.pricePerDayLabel = <?php echo json_encode(__('Price per day', 'bookyourtravel')); ?>;
<?php
$total_price_label = __('Total price', 'bookyourtravel');
if ($accommodation_obj->get_is_price_per_person() && $accommodation_obj->get_count_children_stay_free() > 0)
    $total_price_label = sprintf(__('Total price (first %d children stay free)', 'bookyourtravel'), $accommodation_obj->get_count_children_stay_free());
?>
                        window.priceTotalLabel = <?php echo json_encode($total_price_label); ?>;
                        window.dateLabel = <?php echo json_encode(__('Date', 'bookyourtravel')); ?>;
                    </script>
<!--                    <table class="breakdown tablesorter">
                        <thead></thead>
                        <tfoot></tfoot>
                        <tbody></tbody>
                    </table>-->
                </div>
            </div>
        </div>
    </div>
    <div class="loading" id="wait_loading" style="display:none">
        <div class="ball"></div>
        <div class="ball1"></div>
    </div>

    <?php do_action('byt_show_accommodation_booking_form_after'); ?>