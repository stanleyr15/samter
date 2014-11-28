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
	<footer>
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
	</footer>
	<!--//footer-->
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