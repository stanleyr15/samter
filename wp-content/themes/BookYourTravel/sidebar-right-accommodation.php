<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage BookYourTravel
 * @since Book Your Travel 1.0
 */

global $post, $current_user, $accommodation_obj, $currency_symbol, $price_decimal_places, $score_out_of_10, $enable_reviews,$default_accommodation_extra_fields;;
$accommodation_location = $accommodation_obj->get_location(); 


?>



<div id="secondary" class="right-sidebar widget-area hotel-desc" role="complementary">
			<article class="accommodation-details hotel-details clearfix">
				<h3>Choose Your Room</h3>
                <?php $review_score = get_post_meta($post->ID, 'review_score', true); 
				 $review_count = get_post_meta($post->ID, 'review_count', true); ?>
                
               
				
				
						
				<?php /*?><?php if ($score_out_of_10 > 0) { ?><span class="rating"><?php echo $score_out_of_10*10; ?> / 10</span><?php } ?><?php */?>
                
                <div class="rating-blc">
                    <div class="left-rate">
                        <div class="cont-score">
                            <div class="score-v1" style="width:<?php echo 150 * $review_score; ?>px">  </div>
                        </div>
                    </div>
                </div>
                
               <div> Hotel Rating based on <?php echo $review_count; ?> Reviews</div>
				<?php 
				if ($enable_reviews) {
					$reviews_by_current_user_query = list_reviews($accommodation_obj->get_base_id(), $current_user->ID);	
					if (!$reviews_by_current_user_query->have_posts() && is_user_logged_in()) {
						byt_render_link_button("#", "gradient-button right leave-review review-accommodation", "", __('Leave a review', 'bookyourtravel'));
					} 
				}
				if ($accommodation_obj->get_custom_field('contact_email')) {
					byt_render_link_button("#", "gradient-button right contact-accommodation", "", __('Send inquiry', 'bookyourtravel'));
				} ?>
			</article>				

        
     <article class="accommodation-details hotel-map clearfix">
      <h3><?php echo $accommodation_obj->get_custom_field('address'); ?></h3>
        <!--map-->
        <div class="gmap" id="map_canvas"></div>
        <!--//map-->
        <script type="text/javascript">
		jQuery(document).ready(function(){
			//alert('aaa');
		window.InitializeMap();
			
		});
		</script>

        </article>
        
        
		
        
	<?php 
		wp_reset_postdata(); 
		dynamic_sidebar( 'right-accommodation' ); ?>
</div><!-- #secondary -->