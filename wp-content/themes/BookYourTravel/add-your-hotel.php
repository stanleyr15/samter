<?php
/* 	Template Name: Add Your Hotel
 * The Front Page template file.
 *
 * This is the template of the page that can be selected to be shown as the front page.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage BookYourTravel
 * @since Book Your Travel 1.0
 */
global $currency_symbol;

get_header();
byt_breadcrumbs();
?>

<script type="text/javascript">
	jQuery(document).ready(function($) {
	// clear cf7 error msg on mouseover
	$(".wpcf7-form-control-wrap").mouseover(function(){
		$obj = $("span.wpcf7-not-valid-tip",this);
    	        $obj.css('display','none');
	});
});
	</script>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-7 col-md-9 booking-formleft">
      <div class="hotel-regsiter-heading">
        <h2>Introduce your hotel to the world</h2>
        We know you make an effort to get your guests to live a great experience every day. Don't you think many more should enjoy it? 
        Our travellers are eager to meet you!
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="hotel-registration-cont">
              <div class="hotel-registration-icon"> <img src="<?php bloginfo('template_url'); ?>/images/hotel-reg-icon1.png"  alt=""></div>
              <div class="hotel-registration-txt"> <b> Hotel form around the world </b>
                <p>From here, thousands of people 
                  form all around the world for hotels 
                  like yours </p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="hotel-registration-cont">
              <div class="hotel-registration-icon"> <img src="<?php bloginfo('template_url'); ?>/images/hotel-reg-icon2.png"  alt=""></div>
              <div class="hotel-registration-txt"> <b> More Bookings </b>
                <p>By increasing your hotel visbility 
                  you alsoincrease the number 
                  of guests </p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="hotel-registration-cont">
              <div class="hotel-registration-icon"> <img src="<?php bloginfo('template_url'); ?>/images/hotel-reg-icon3.png"  alt=""></div>
              <div class="hotel-registration-txt"> <b> You decide</b>
                <p>Your manage the prices and 
                  availability of your rooms in 
                  the website</p>
              </div>
            </div>
          </div>
        </div>
        <div class="add-hoteltxt">
          <h2> Add your hotel now, it won't take long and it's free </h2>
          Fill out this simple form and our team will contact you very soon </div>
        <div class="addhotel-form-heading">
          <h2> About Your Hotel </h2>
          Fill the below Fields with * are required </div>
        <?php echo do_shortcode('[contact-form-7 id="2078" title="Add your hotel"]'); ?> </div>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-3 booking-formright">
      <div class="reason-cont">
        <div class="reason-heading"> <img src="<?php bloginfo('template_url'); ?>/images/hand-icon.jpg" width="53" height="51" alt=""> 3 Reasons </div>
        <div class="points"> <img src="<?php bloginfo('template_url'); ?>/images/1.png" width="56" height="56" alt="">
          <h2> Visibility </h2>
          <div class="clearfix"></div>
          <p> ou show up in hotels searches around 
            the world</p>
        </div>
        <div class="points"> <img src="<?php bloginfo('template_url'); ?>/images/2.png" width="56" height="56" alt="">
          <h2> Control </h2>
          <div class="clearfix"></div>
          <p> ou show up in hotels searches around 
            the world</p>
        </div>
        <div class="points points2"> <img src="<?php bloginfo('template_url'); ?>/images/3.png" width="56" height="56" alt="">
          <h2> Without <br/>
            permanent costs </h2>
          <div class="clearfix"></div>
          <p> ou show up in hotels searches around 
            the world</p>
        </div>
      </div>
    </div>
    </article>
  </div>
</div>
<?php
//get_sidebar('home-footer');
get_footer();
?>
