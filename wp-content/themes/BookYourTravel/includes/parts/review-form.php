<?php 
global $entity_obj; 

if (is_user_logged_in()) {
	$post_type = $entity_obj->get_entity_type();
	$post_id = $entity_obj->get_base_id();
	$review_fields = list_review_fields($post_type);
?>
	<script>
		window.postType = '<?php echo $post_type; ?>';
		window.postId = '<?php echo $post_id; ?>';
		window.reviewFields = new Array();
		<?php if (count($review_fields) > 0) { 
		foreach ($review_fields as $field) {?>
		reviewFields.push("<?php echo $field['id']; ?>");
		<?php }
		} ?>
		window.reviewFormLikesError = <?php echo json_encode(__('Please enter your likes', 'bookyourtravel')); ?>;
		window.reviewFormDislikesError = <?php echo json_encode(__('Please enter your dislikes', 'bookyourtravel')); ?>;
	</script>
	<?php do_action( 'byt_show_' . $post_type . '_review_form_before' ); ?>
	<!--full-width content-->
	<section class="full-width review-<?php echo $post_type; ?>-section" style="display:none">
		<article class="static-content">
			<form id="" method="post" action="" class="review review-<?php echo $post_type; ?>-form">
				<h1><?php echo sprintf(__('We would like to know your opinion about %s', 'bookyourtravel'), $entity_obj->get_title()); ?></h1>
				<div class="error" style="display:none;"><span></span></div>
				<p><?php _e('Please score the following:', 'bookyourtravel'); ?></p>
				<table>
					<tr>
						<th><?php _e('Element', 'bookyourtravel'); ?></th>
						<?php for ( $i = 1; $i <= 10; $i++ ) {
							echo '<th>' . $i . '</th>';
						} ?>
					</tr>
					<?php
					foreach($review_fields as $field) {
					?>
					<tr>
						<th><?php echo $field['label']; ?></th>
						<?php for ( $i = 1; $i <= 10; $i++ ) {
							echo '<td><input type="radio" id="reviewField_' . $field['id'] . '_' . $i . '" value="' . $i . '" name="reviewField_' . $field['id'] . '" /></td>';
						} ?>
					</tr>
					<?php } ?>
				</table>
				<h3><?php echo sprintf(__('title for the %s?', 'bookyourtravel'), $post_type); ?></h3>
                <div class="f-item">
					<input type="text" id="title" name="title" />
				</div> 
				<div class="f-item">
					<textarea id="likes" name='likes' rows="10" cols="10" ></textarea>
				</div>				
				<h3><?php echo sprintf(__('What did you not like about the %s?', 'bookyourtravel'), $post_type); ?></h3>
				<div class="f-item">
					<textarea id="dislikes" name='dislikes' rows="10" cols="10" ></textarea>
				</div>	
				<?php byt_render_link_button("#", "gradient-button cancel-" . $post_type . "-review", "", __('Cancel', 'bookyourtravel')); ?>
				<?php byt_render_submit_button("gradient-button", "submit-" . $post_type . "-review", __('Submit review', 'bookyourtravel')); ?>
			</form>
		</article>
	</section>
	<!--//full-width content-->
	<?php do_action( 'byt_show_' . $post_type . '_review_form_after' ); ?>
<?php 
}
