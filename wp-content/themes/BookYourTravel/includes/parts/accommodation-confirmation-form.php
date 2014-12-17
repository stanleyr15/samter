<?php do_action( 'byt_show_accommodation_confirm_form_before' ); ?>

<form id="accommodation-confirmation-form" method="post" action="" class="booking" >
<!--    style="display:none"-->
    <div id="div1">
        <div class="booking-sucess"> 
  
  <div class="thankyou-message"> 
  
  <div class="thankyou-icon"> <img src="<?php echo bloginfo('template_url')?>/images/thankyou-img.jpg" width="82" height="72" alt=""></div>
  
  <div class="col-xs-12 col-sm-8 col-md-10"> 
  
 <h2>Thank you! Your booking is complete.</h2>
  
  <p> You successfully confirmed your email address and your booking. </p>

  <p><input name="" type="button" class="print-btn" value="Print" onclick="PrintElem('#mydiv')"></p>
  
  </div>
  
  
  </div>
  
  
  
  <div class="thankyou-bookingdetails"> 
  
  <div class="row">
  <div class="col-xs-12 col-sm-6 col-md-4 thankyou-bookingdetails-part"> 
  
  <b>Booking Number     	: </b>	<span> 385yu8 </span>
  
  </div>
  
    <div class="col-xs-12 col-sm-6 col-md-4 thankyou-bookingdetails-part" > 
  
  <b>Booking Name        	: </b>	<span id="confirm_first_name"> </span>
  
  </div>
  
    <div class="col-xs-12 col-sm-6 col-md-4 thankyou-bookingdetails-part"> 
  
  <b>Booker Phone  	: </b>	<span id="confirm_phone"> </span>
  
  </div>
  
  
   <div class="col-xs-12 col-sm-6 col-md-4 thankyou-bookingdetails-part"> 
  
  <b>Date   	  	: </b>	<span> CURRENT DATE </span>
  
  </div>
  
  <div class="col-xs-12 col-sm-6 col-md-4 thankyou-bookingdetails-part"> 
  
  <b>Email	 	  	: </b>	<span id="confirm_email_address"></span>
  
  </div>
  
  
  <div class="col-xs-12 col-sm-6 col-md-4 thankyou-bookingdetails-part"> 
  
  <b>Home Address		 	  	: </b>	<span id="confirm_town"></span>
  
  </div>
  
  
  </div>
  
  
  </div>
  
  
  
  <div class="thankyou-hotelfull-name"> 
  
  <div class="row">   <div class="col-xs-12 col-sm-12 col-md-4"> <span> Novotel Waterloo</span> <img src="images/star.jpg" width="80" height="23" alt=""></div> 
   <div class="col-xs-12 col-sm-12 col-md-8"> <b> This is a "Pay When You Stay" room. </b> The hotel will bill you the amount shown below at the time of your hotel stay. 
The actual charqes for your hotel room are shown in the local currency below. </div>
  </div>
 
  
  </div>
  
  
  <div class="row">  
  <div class="col-xs-12 col-sm-6 col-md-6 thank-you-chk-details"> 
  
  <div class="row">
  
    <div class="col-xs-12 col-sm-4 col-md-3"> <img src="<?php echo bloginfo('template_url')?>/images/thanku-hotel-img.jpg"  alt=""></div> 
    
    <div class="col-xs-12 col-sm-8 col-md-9"> <img src="<?php echo bloginfo('template_url')?>/images/loaction-icon.jpg" width="11" height="13" alt=""> Address: 113 Lambeth Road, SE1 7LS, London <br/> 
   <b> Check-in	</b>     <span id="confirm_date_from"></span> <br/> 
   <b>Check-out	</b>   <span id="confirm_date_to"> </span><br/> 
   <b>For:	</b> 					   <span>  1 Night, 2 Persons,in 1 Room</span> <br/> 

</div> 
    </div>
  
  </div> 
  
  <div class="col-xs-12 col-sm-6 col-md-6 thank-you-chk-details thank-you-chk-details-right"> 
  
  <div class="row">
  
  
   <div class="col-xs-12 col-sm-12 col-md-12"> <i> Room1.  1 x Club Double/Twin Room - Advanced Purchase</i> </div>
   
   <div class="col-xs-12 col-sm-5 col-md-3"> <img src="<?php echo bloginfo('template_url')?>/images/booked-hotelimg.jpg"  alt=""></div> 
    
    <div class="col-xs-12 col-sm-7 col-md-9"> 
   <b> Price per night<br/> <em> (all taxes included)	</em>	</b>     <span> GBP 100 </span> <br/> 
   <b>	</b>                				           <span> PKR 1500 </span><br/> 
   <b>You Pay today</b> 					   <span>  PKR 0</span> <br/> 

</div> 
    </div>
  
  </div>
 <div class=" col-xs-12 col-sm-12 col-md-12"> 
  
  <div class="total-pricebg"> 
  
  <div class="col-xs-12 col-sm-6 col-md-6"> <b> Total Price </b> <br/>  <span> (all taxes included) </span>	</div>
  
  <div class="col-xs-12 col-sm-6 col-md-6 total-right"> <b>GBP 100    PKR 1500</b>	</div>
  
  </div>
  </div>
  
   <div class=" col-xs-12 col-sm-12 col-md-12">  
   
   <div class="locationmap"> 
   
   <h2>Location on Map </h2>
   
   <div class="map"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9288846.204449672!2d-3.4433237999999995!3d55.3617609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited+Kingdom!5e0!3m2!1sen!2sin!4v1418648049173" width="100%" height="450" frameborder="0" style="border:0"></iframe></div>
   
   </div>
   
   </div>
  
  
   </div>
  
  
        </div>
<!--	<fieldset>
		<h3><span>02 </span><?php _e('Confirmation', 'bookyourtravel') ?></h3>
                <button onclick="myFunction()">Print</button>
		<div class="text-wrap">
			<p><?php _e('Thank you. We will get back you with regards your reservation within 24 hours.', 'bookyourtravel') ?></p>
		</div>				
		<h3><?php _e('Traveller info', 'bookyourtravel') ?></h3>
		<div class="text-wrap">
			<div class="output">
				<p><?php _e('First name', 'bookyourtravel') ?>: </p>
				<p id="confirm_first_name"></p>
				<p><?php _e('Last name', 'bookyourtravel') ?>: </p>
				<p id="confirm_last_name"></p>
				<p><?php _e('Email address', 'bookyourtravel') ?>: </p>
				<p id="confirm_email_address"></p>
				<p><?php _e('Phone', 'bookyourtravel') ?>: </p>
				<p id="confirm_phone"></p>
				<p><?php _e('Street', 'bookyourtravel') ?>: </p>
				<p id="confirm_street"></p>
				<p><?php _e('Town/City', 'bookyourtravel') ?>: </p>
				<p id="confirm_town"></p>
				<p><?php _e('Zip code', 'bookyourtravel') ?>: </p>
				<p id="confirm_zip"></p>
				<p><?php _e('Country', 'bookyourtravel') ?>:</p>
				<p id="confirm_country"></p>
				<p><?php _e('Adults', 'bookyourtravel') ?>:</p>
				<p id="confirm_adults"></p>
				<p><?php _e('Children', 'bookyourtravel') ?>:</p>
				<p id="confirm_children"></p>
				<p><?php _e('Date from', 'bookyourtravel') ?>:</p>
				<p id="confirm_date_from"></p>
				<p><?php _e('Date to', 'bookyourtravel') ?>:</p>
				<p id="confirm_date_to"></p>
				<p><?php _e('Total price', 'bookyourtravel') ?>:</p>
				<p id="confirm_total"></p>
			</div>
		</div>			
		<h3><?php _e('Special requirements', 'bookyourtravel') ?></h3>
		<div class="text-wrap">
			<p id="confirm_requirements"></p>
		</div>				
		<div class="text-wrap">
			<p><?php echo sprintf(__('<strong>We wish you a pleasant stay</strong><br /><i>your %s team</i>', 'bookyourtravel'), of_get_option('contact_company_name', 'BookYourTravel')) ?></p>
		</div>
	</fieldset>-->
    </div>
    
</form>

<script> function printContent(el){ 
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent; window.print(); 
    document.body.innerHTML = restorepage; } 
</script> 
<h1>My page</h1> 
<div id="div12">DIV 1 content...</div> <button onclick="printContent('div1')">Print Content</button>
<div id="div2">DIV 2 content...</div> <button onclick="printContent('div2')">Print Content</button> 
<p id="p1">Paragraph 1 content...</p> <button onclick="printContent('p1')">Print Content</button>



<?php do_action( 'byt_show_accommodation_confirm_form_after' ); ?>
<!--<script>
function myFunction() {
    window.print();
}
</script>-->
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=900,width=900');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ mywindow.document.write('<link rel="stylesheet" href="http://localhost/samter/trunk/wp-content/themes/BookYourTravel/css/style.css" type="text/css" media="all"/>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>