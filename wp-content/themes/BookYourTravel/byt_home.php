<?php
/*	Template Name: Byt Home page
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
	
	if (have_posts()) { ?>
	<section class="full">
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class("static-content"); ?> id="page-<?php the_ID(); ?>">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bookyourtravel' ) ); ?>
			<?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
		</article>
	<?php endwhile; ?>
	</section>
   
   <div class="row"> 
	<?php  get_template_part('includes/parts/home-custom-search', 'hotel');  } 	?>
    
     <div class="col-xs-12 col-sm-6 col-md-7"> 
     <div class="home-right"> 
   
   <div class="slider-cont"> <!--<img src="images/slider.jpg" width="615" height="151" alt="">-->
   <?php putRevSlider("home_slider") ?>
   </div>
   
    </div>
    
    <div class="customer-servicecont"> 
   
   <div class="customservice-header">Customer Service</div>
   
   
   
   <div class="col-xs-12 col-sm-6 col-md-4 service-txt"> 
   
     <img src="<?php bloginfo('template_directory');?>/images/icon1.png"  alt="">  Manage Bookings </div>
   
   
  
     
     <div class="col-xs-12 col-sm-6 col-md-4 service-txt"> 
   
     <img src="<?php bloginfo('template_directory');?>/images/icon2.png"  alt="">  Cancellation </div>
     
      <div class="col-xs-12 col-sm-6 col-md-4 service-txt self-service-heading"> 
   
       Self Service </div>
       
  
       
       <div class="col-xs-12 col-sm-6 col-md-4 service-txt"> 
   
     <img src="<?php bloginfo('template_directory');?>/images/icon3.png"  alt="">  FAQs </div>
     
      
       <div class="col-xs-12 col-sm-6 col-md-4 service-txt"> 
   
     <img src="<?php bloginfo('template_directory');?>/images/icon4.png"  alt="">  FAQs </div>
     
       <div class="col-xs-12 col-sm-6 col-md-4 service-txt"> 
   
       <input name="" type="button" class="btns" value="Login"> </div>
     
     
     
   
   
   </div>
  
   </div>
    
		</div>
        </div>
        
        <div class="whyuse">


<div class="col-xs-12 col-sm-3 col-md-3 whyuse-heading"> WHY USE XYZ.COM? </div> 

<div class="col-xs-12 col-sm-3 col-md-3 "> <p> No Booking Charges </p> </div> 
<div class="col-xs-12 col-sm-3 col-md-3 "> <p>No Cancellation fees  </p>  </div> 
<div class="col-xs-12 col-sm-3 col-md-3 "> <p>Instant Confirmation </p>  </div> 
 </div>
        
    <?php 
	
	$enable_car_rentals = of_get_option('enable_car_rentals', 1); 
	$enable_accommodations = of_get_option('enable_accommodations', 1); 
	$enable_tours = of_get_option('enable_tours', 1); 
	$enable_cruises = of_get_option('enable_cruises', 1); 
	
 	get_template_part('includes/parts/post', 'latest'); 
	
	if ($enable_accommodations) {
		get_template_part('includes/parts/accommodation', 'latest'); 
	}

	if ($enable_tours) {
		get_template_part('includes/parts/tour', 'latest'); 
	}
	
	if ($enable_cruises) {
		get_template_part('includes/parts/cruise', 'latest'); 
	}

	if ($enable_car_rentals) {
?>
			<script>
				window.formMultipleError = <?php echo json_encode(__('You failed to provide {0} fields. They have been highlighted below.', 'bookyourtravel'));  ?>;
			</script>
<?php		
		get_template_part('includes/parts/car_rental', 'latest'); 
	}
	
	get_template_part('includes/parts/location', 'latest'); 

	wp_reset_postdata();
	
	?>
    <div class="row">
 
 <div class="col-xs-12 col-sm-6 col-md-5"> <div class="customer-servicecont partnerwithus"> 
   
   <div class="customservice-header">Hotel Owner? Partner with Us</div>
  

       <div class="col-xs-12 col-sm-12 col-md-12  partnerwith-txt"> 
       
     <p> <span>  Get Maximum business for your hotel round the year by registering it on </span></p>
      
      <p> Register your hotel with us free of cost</p>
      
      <p> <a href="<?php get_site_url()?>create-accommodations/"><input type="button" value="Submit Hotel Details" class="btns" name=""></a></p>

   
      </div>
     
     
     
   
   
   </div></div>
 <div class="col-xs-12 col-sm-6 col-md-7"> <div class="customer-servicecont partnerwithus"> 
   
   <div class="customservice-header">Top Cities to Visit</div>
  

       <div class="col-xs-12 col-sm-12 col-md-12  partnerwith-txt"> 
       
<?php 
$i=1;
global $wpdb;
query_posts('post_type=accommodation&showposts=5'); 
if(have_posts()) : while(have_posts()) : the_post();
?> 


<ul><!--<li> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> <span> $ <?php  //the_price(); ?> </span> </a></li>--></ul>


<?php
 $i++ ;
endwhile; endif;
wp_reset_query();
?>




 <?php      
  global $post;
	$args = array(
		'posts_per_page'   => 5,
		'orderby'          => 'DESC',
		'post_id'          => array( $post->ID ),
		'post_type'        => 'accommodation',
		'post_status'      => 'publish' ); 
    $like_posts = get_posts( $args );
    foreach ( $like_posts as $like_post ) {
		//var_dump($like_post);
		$review_count = get_post_meta($like_post->ID, 'post_title', true);
		$accomodation_price = get_post_meta($like_post->ID, '_accommodation_min_price', true); 
		$accommodation_obj = new byt_accommodation($like_post->ID);
		$url = wp_get_attachment_url( $post_thumbnail_id );
        echo '<ul><li> <a href="' . get_permalink( $like_post->ID ) . '"> ' .$accommodation_obj->get_title() . ' <span>$ '.$accomodation_price.' </span> </a></li></ul>';
		?>
    
   <?php //echo $review_count;
	}

 ?>

       
     
     <!--<ul> 
     
     <li> <a href="#">London Hostels <span>$30.42 </span> </a></li>
      <li> <a href="#">Barcelona Hostels <span>$22.85 </span> </a></li>
       <li> <a href="#">Belin Hostels <span>$28.16 </span> </a></li>
        <li> <a href="#">Rome Hostels <span>$24.12 </span> </a></li>
         <li> <a href="#">Budapest Hostels <span>$4153.95 </span> </a></li>
     
     
     </ul>-->
      
      
      
     

   
      </div>
     
     
     
   
   
   </div></div>
 
 
    </div>
    <?php 
	
//	get_sidebar('home-footer');
	get_footer(); 
?>