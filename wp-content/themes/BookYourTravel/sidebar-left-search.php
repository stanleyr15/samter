<?php
/**
 * The sidebar containing the left widget area for custom search results page.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage BookYourTravel
 * @since Book Your Travel 1.0
 */
?>
<?php if ( is_active_sidebar( 'left-search' ) ) { ?>

	<aside id="secondary" class="left-sidebar widget-area" role="complementary">
		<ul>
		<?php dynamic_sidebar( 'left-search' ); ?>
		</ul>
	</aside><!-- #secondary -->
<?php } else { ?>

<div class="col-xs-12 col-sm-4 col-md-3">
     		<?php 
		$widget_args = array(
			'before_widget' => '',
			'after_widget'  => ' ',
			'before_title'  => '',
			'after_title'   => '',
		);
		the_widget('byt_Search_Widget', null, $widget_args); 
		?>
         <!--<div class="panel-heading">Panel heading without title</div>-->


    </div>
<?php } 