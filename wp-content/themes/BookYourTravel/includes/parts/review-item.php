<?php
	global $entity_obj, $score_out_of_10, $accommodation_obj;
	$base_id = $entity_obj->get_base_id();
	$reviews_total = get_reviews_count($base_id);
	$post_type = $entity_obj->get_entity_type();
	
	$guest_reviews_info = '';
	if ($post_type == 'accommodation')
		$guest_reviews_info = __('Guest reviews are written by our customers <strong>after their stay</strong> at %s.', 'bookyourtravel');
	elseif ($post_type == 'tour')
		$guest_reviews_info = __('Guest reviews are written by our customers <strong>after their tour</strong> of %s.', 'bookyourtravel');
	elseif ($post_type == 'cruise')
		$guest_reviews_info = __('Guest reviews are written by our customers <strong>after their voyage</strong> on %s.', 'bookyourtravel');
	
	if ($reviews_total > 0) {
	?>
	<!--<article>
		<h1><?php _e(ucfirst($entity_obj->get_entity_type()) . ' review scores and score breakdown', 'bookyourtravel'); ?></h1>
		<div class="score">
		<?php 
			$review_score = $entity_obj->get_custom_field('review_score', false, true);
			$score_out_of_10 = round($review_score * 10);
		?>
			<span class="achieved"><?php echo $score_out_of_10; ?></span><span> / 10</span>
			<p class="info"><?php echo sprintf(__('Based on %d reviews', 'bookyourtravel'), $reviews_total); ?></p>
			<p class="disclaimer"><?php echo sprintf($guest_reviews_info, $entity_obj->get_title()); ?></p>
		</div>		
		<dl class="chart">
			<?php 
			$total_possible = $reviews_total * 10;	
			
			$review_fields = list_review_fields($post_type, true);
			foreach ($review_fields as $review_field) {
				$field_id = $review_field['id'];
				$field_label = $review_field['label'];
				$field_value = intval($total_possible > 0 ? (sum_review_meta_values($base_id, $field_id) / $total_possible) * 10 : 0);
			?>
			<dt><?php echo $field_label; ?></dt>
			<dd><span style="width:<?php echo $field_value * 10; ?>%;"><?php echo $field_value; ?>&nbsp;&nbsp;&nbsp;</span></dd>
			<?php
			}
			?>
		</dl>
	</article>-->
    
    
    <?php 
	$review_score = get_post_meta($post->ID, 'review_score', true);
	$review_count = get_post_meta($post->ID, 'review_count', true); ?>
     <div class="services-heading2"><h2><?php _e($reviews_total . ' People have reviewed this Hotel', 'bookyourtravel');?></h2></div>
        <div class="services-cont">
            
            <div class="row"> 
            <div class="col-xs-12 col-sm-7 col-md-8 "> 
			<?php
			$reviews_query = list_reviews($base_id);
			while ($reviews_query->have_posts()) : 
				global $post;
				$reviews_query->the_post();
			?>
             
             <div class="col-xs-12 col-sm-5 col-md-3 "> 
			
				 <div class="customer-photo"><?php echo get_avatar( get_the_author_meta( 'ID' ), 70 ); ?></div>
				<div class="customer-name"><?php the_author(); ?></span><br /> <?php the_author_description(); ?> <br /><br /> </span> </div>
				
                <div class="topcontributor"> 
            <h2> Top Contributor </h2>
            
            <p> <img src="<?php bloginfo('template_url'); ?>/images/review-icon1.jpg" width="15" height="16" alt=""> <?php echo $review_count; ?>  reviews </p>
            
            <!-- <p> <img src="<?php bloginfo('template_url'); ?>/images/review-icon2.jpg" width="15" height="16" alt=""> 34 cities </p>
             
             <p> <img src="<?php bloginfo('template_url'); ?>/images/review-icon3.jpg" width="15" height="16" alt=""> 43 helpful votes </p>-->
             
            
            
            </div>
            </div>
            
            
            <div class="col-xs-12 col-sm-7 col-md-9 review-txt"> 
            
              <em>"<?php echo get_post_meta($post->ID, 'review_title', true); ?>"</em>
                
              <div class="rating-blc">
                    <div class="left-rate">
                        <div class="cont-score">
                            <div class="score-v1" style="width:<?php echo 150 * $review_score; ?>px"></div>
                        </div>
                    </div>
                </div>
				<p><?php echo get_post_meta($post->ID, 'review_likes', true); ?></p>
               <p style="margin-bottom:95px;"> <!--Was this review helpful?  <a href="#">Yes</a> 12 --></p>
              
               </div>
               
              
           
			<!--//review-->
			<?php endwhile; 
				// Reset Second Loop Post Data
				wp_reset_postdata(); 
			?>
            
             </div>
  
  <div class="col-xs-12 col-sm-5 col-md-4  related-cont"> 
  <h2> Related Hotels</h2>
            
    <?php function get_you_also_like_posts() {
    global $post;
	
	$args = array(
		'posts_per_page'   => 3,
		'orderby'          => 'DESC',
		'post_id'          => array( $post->ID ),
		'post_type'        => 'accommodation',
		'post_status'      => 'publish' ); 
    $like_posts = get_posts( $args );
	//print_r($like_posts); exit;
    foreach ( $like_posts as $like_post ) {
		//var_dump($like_post);
		$post_thumbnail_id = get_post_thumbnail_id( $like_post->ID );
		$review_count = get_post_meta($like_post->ID, 'review_count', true);
		$review_score = get_post_meta($like_post->ID, 'review_score', true); 
		$star_count = get_post_meta($like_post->ID, 'accommodation_star_count', true); 
		
		$url = wp_get_attachment_url( $post_thumbnail_id );
    ?>
            
            <div class="related-hotels-row"> <img src="<?php echo $url ?>" width="70" height="70" alt=""><b><a href="<?php echo get_permalink( $like_post->ID ); ?>"><?php echo  apply_filters( 'the_title', $like_post->post_title, $like_post->ID )?></a></b> <br/> 
            <?php for ($i=0;$i<$star_count;$i++) { ?>
						<img src="<?php echo get_byt_file_uri('/images/ico/star.png'); ?>" alt="">
						<?php } ?>
            <a href="#"> <?php echo $review_count ?> Reviews </a> <br/>  <img src="<?php bloginfo('template_url'); ?>/images/show-prices.jpg" width="109" height="30" alt=""></div>
   <?php } }  ?>
   <?php echo get_you_also_like_posts();  ?>
</div>
</div>
            
            
            </div>
            
          
        </div> 
             

<?php } else { ?>
	<article>
	<h3><?php echo sprintf(__('We are sorry, there are no reviews yet for this %s.', 'bookyourtravel'), $post_type); ?></h3>
	</article>
<?php } ?>