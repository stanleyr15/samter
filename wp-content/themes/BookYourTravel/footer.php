<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content
 *
 * @package WordPress
 * @subpackage BookYourTravel
 * @since Book Your Travel 1.0
 */  
?>
			</div><!--//main content-->
		</div><!--//wrap-->
		<?php get_sidebar('above-footer'); ?>
	</div><!--//main-->
    </div>
	<!--footer-->
	<?php /*?><footer>
		<?php get_sidebar('footer'); ?>
		<div class="wrap clearfix">		
			<section class="bottom">
				<p class="copy"><?php echo of_get_option('copyright_footer', 'no entry'); ?></p>				
				<!--footer navigation-->				
				<?php if ( has_nav_menu( 'footer-menu' ) ) {
					wp_nav_menu( array( 
						'theme_location' => 'footer-menu', 
						'container' => 'nav', 
					) ); 
				} else { ?>
				<nav class="menu-main-menu-container">
					<ul class="menu">
						<li class="menu-item"><a href="<?php echo home_url(); ?>"><?php _e('Home', "bookyourtravel"); ?></a></li>
						<li class="menu-item"><a href="<?php echo admin_url('nav-menus.php'); ?>"><?php _e('Configure', "bookyourtravel"); ?></a></li>
					</ul>
				</nav>
				<?php } ?>
				<!--//footer navigation-->
			</section>
		</div>
	</footer><?php */?>
	<!--//footer-->
    <!-- custom footer-->
<footer>
  
  <div class="footerbg">
  
  
  <div class="wrap clearfix">  
  
  
  <div class="row"> 
  <div class="col-xs-12 col-sm-3 col-md-2"> 
 
 <h2>Get To Know	 </h2>
 
 <ul>
<li><a href="#">  About Us </a></li>
<li><a href="#">Help and FAQ </a></li>
<li><a href="#">Travel Blog</a>
<li>
 
 </ul>
  
  </div>
  
  <div class="col-xs-12 col-sm-3 col-md-2"> 
 
 <h2>Customer Service	 </h2>
 
 <ul>
<li><a href="#">  My Booking</a></li>
<li><a href="#">Contact Us </a></li>
 
 </ul>
  
  </div>
  
  <div class="col-xs-12 col-sm-3 col-md-2"> 
 
 <h2>Our Policies </h2>
 
 <ul>
<li><a href="#">  Privacy & Cookies</a></li>
<li><a href="#">Terms & Conditions</a></li>
 </ul>
  
  </div>
  
  
  
  <div class="col-xs-12 col-sm-3 col-md-2"> 
 
 <h2>Hoteliers </h2>
 
 <ul>
<li><a href="#"> Add your hotel</a></li>

 </ul>
  
  </div>
  
  <div class="col-xs-12 col-sm-12 col-md-3 col-md-offset-1"> 
 
 <div class="socialbg"> 
 
 <h2> Recommend Us</h2>
 <a href="#"><img src="<?php bloginfo('template_directory');?>/images/twitter.png"  alt=""></a> <a href="#"><img src="<?php bloginfo('template_directory');?>/images/fb.png" width="36" height="35" alt=""></a> <a href="#"><img src="<?php bloginfo('template_directory');?>/images/gplus.png" width="36" height="35" alt=""></a> <a href="#"><img src="<?php bloginfo('template_directory');?>/images/rss.png" width="36" height="35" alt=""></a></div>

 
 
  
  </div>
  
  
  
  </div>
  
  </div>
  
  
  <div class="footerbg2"> samter hotel booking © 2014 Website designing by: Digital Web Solutions </div>
  
  
   </div>
  

  
</footer>
<!--// custom footer-->
    
    
	<?php 
	get_template_part('includes/parts/login', 'lightbox');
	get_template_part('includes/parts/register', 'lightbox'); 
	?>	
<?php wp_footer(); ?>
<?php 
	if (WP_DEBUG) {
		$num_queries = get_num_queries();
		$timer = timer_stop(0);
		echo '<!-- ' . $num_queries . ' queries in ' . $timer . ' seconds. -->';
	} 
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>



<script type='text/javascript'><!--
   $(document).ready(function() {
    enableSelectBoxes();
   });
   
   function enableSelectBoxes(){
    $('div.selectBox').each(function(){
     $(this).children('span.selected').html($(this).children('div.selectOptions').children('span.selectOption:first').html());
     $(this).attr('value',$(this).children('div.selectOptions').children('span.selectOption:first').attr('value'));
     
     $(this).children('span.selected,span.selectArrow').click(function(){
      if($(this).parent().children('div.selectOptions').css('display') == 'none'){
       $(this).parent().children('div.selectOptions').css('display','block');
      }
      else
      {
       $(this).parent().children('div.selectOptions').css('display','none');
      }
     });
     
     $(this).find('span.selectOption').click(function(){
      $(this).parent().css('display','none');
      $(this).closest('div.selectBox').attr('value',$(this).attr('value'));
      $(this).parent().siblings('span.selected').html($(this).html());
     });
    });    
   }//-->
  </script>
</body>
</html>