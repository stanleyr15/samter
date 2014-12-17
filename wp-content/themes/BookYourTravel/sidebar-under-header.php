<?php
/**
 * The sidebar containing the under the header widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage BookYourTravel
 * @since Book Your Travel 1.0
 */
?>
<?php if ( is_active_sidebar( 'under-header' ) ) { ?>
	<div id="under-header-sidebar" class="under-header-sidebar widget-area clearfix" role="complementary">
		<ul>
		<?php dynamic_sidebar( 'under-header' ); ?>
		</ul>
	</div><!-- #secondary -->
<?php } else { ?>

	<div id="under-header-sidebar" class="under-header-sidebar widget-area clearfix" role="complementary">
   
         
     		<?php 
//		$widget_args = array(
//			'before_widget' => '',
//			'after_widget'  => '',
//			'before_title'  => '',
//			'after_title'   => '',
//		);
//		the_widget('byt_Header_Search_Widget', null, $widget_args); 
	?>


        </div>
<?php } 