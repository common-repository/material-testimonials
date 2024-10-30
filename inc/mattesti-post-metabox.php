<?php

add_action('add_meta_boxes','mattesti_meta_box_init');

function mattesti_meta_box_init(){
	add_meta_box('mattesti-meta-box','Details','mattesti_meta_box_ctr', 'testimonials' ,'normal','default');
}

function mattesti_meta_box_ctr(){
	global $post;
	wp_nonce_field(basename(__FILE__),'mattesti_meta_box_nonce');
	?>
	<style type="text/css">
		label.colored-label{
			margin-right: 20px;
    		margin-bottom: 15px;
    		display: inline-block;
		}

		label.colored-label>span {
		    height: 25px;
		    width: 50px;
		    display: inline-block;
		    line-height: 25px;
    		text-align: center;
		    vertical-align: middle;
		    -webkit-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    		box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
		}
	</style>
	<table border="0" width="100%" cellpadding="0" cellspacing="10">
		<tbody>
			<tr>
				<td>Sub Title:</td>
				<td><input type="text" class="widefat" name="mattesti-sub-title" value="<?php echo esc_attr_e( get_post_meta($post->ID, 'mattesti-sub-title', true), 'material-testimonials' ); ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><h3>Social Links</h3></td>
			</tr>
			<tr>
				<td>Facebook:</td>
				<td><input type="text" class="widefat" name="mattesti-facebook-url" value="<?php echo esc_url(get_post_meta($post->ID, 'mattesti-facebook-url', true)); ?>"></td>
			</tr>
			<tr>
				<td>Twitter:</td>
				<td><input type="text" class="widefat" name="mattesti-twitter-url" value="<?php echo esc_url(get_post_meta($post->ID, 'mattesti-twitter-url', true)); ?>"></td>
			</tr>
			<tr>
				<td>LinkedIn:</td>
				<td><input type="text" class="widefat" name="mattesti-linkedin-url" value="<?php echo esc_url(get_post_meta($post->ID, 'mattesti-linkedin-url', true)); ?>"></td>
			</tr>
			<tr>
				<td>Instagram:</td>
				<td><input type="text" class="widefat" name="mattesti-instagram-url" value="<?php echo esc_url(get_post_meta($post->ID, 'mattesti-instagram-url', true)); ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><h3>Background Color</h3></td>
			</tr>
			<tr>
				<td colspan="2">
					<?php
					$selectedBGColor = (get_post_meta($post->ID, 'mattesti-bg-color', true)=='')?'#fee25b':get_post_meta($post->ID, 'mattesti-bg-color', true);
					$bg_color = array('#fee25b', '#01bfa5', '#35a2c9', '#3bc168', '#8d4696', '#dc4c70', '#ee534f', '#ff6f8a', '#305bc4', '#2cd1a7', '#27abff', '#203f5e');


					foreach ($bg_color as $value) {
						?>
						<label class="colored-label"><input type="radio" name="mattesti-bg-color" value="<?php esc_attr_e( $value, 'material-testimonials' ); ?>" <?php checked( $selectedBGColor, $value ); ?>> <span style="background-color: <?php esc_attr_e( $value, 'material-testimonials' ); ?>;"></span></label>
						<?php
					}
					?>
				</td>
			</tr>
			<tr>
				<td colspan="2"><h3>Text Color</h3></td>
			</tr>
			<tr>
				<td colspan="2">
					<?php
					$selectedTextColor = (get_post_meta($post->ID, 'mattesti-text-color', true)=='')?'#ffffff':get_post_meta($post->ID, 'mattesti-text-color', true);

					?>
					<label class="colored-label"><input type="radio" value="#ffffff" name="mattesti-text-color" <?php checked( $selectedTextColor, '#ffffff' ); ?>> <span style="background-color: #203f5e; color: #ffffff;">Text</span></label>
					<label class="colored-label"><input type="radio" value="#212121" name="mattesti-text-color" <?php checked( $selectedTextColor, '#212121' ); ?>> <span style="background-color: #fee25b; color: #212121;">Text</span></label>
				</td>
			</tr>
		</tbody>
	</table>
	<?php
}


add_action('save_post','mattesti_meta_box_save',10,2);

function mattesti_meta_box_save($post_id, $post){
	if(!isset($_POST['mattesti_meta_box_nonce'])|| !wp_verify_nonce($_POST['mattesti_meta_box_nonce'], basename(__FILE__)))
		return $post_id;
	
	if(!current_user_can('edit_post', $post->ID))
		return $post_id;


	if(get_post_type($post_id)=='testimonials'){
		update_post_meta($post_id, 'mattesti-facebook-url', sanitize_text_field($_POST['mattesti-facebook-url']));
		update_post_meta($post_id, 'mattesti-twitter-url', sanitize_text_field($_POST['mattesti-twitter-url']));
		update_post_meta($post_id, 'mattesti-linkedin-url', sanitize_text_field($_POST['mattesti-linkedin-url']));
		update_post_meta($post_id, 'mattesti-instagram-url', sanitize_text_field($_POST['mattesti-instagram-url']));
		update_post_meta($post_id, 'mattesti-sub-title', sanitize_text_field($_POST['mattesti-sub-title']));
		
		update_post_meta($post_id, 'mattesti-bg-color', sanitize_text_field($_POST['mattesti-bg-color']));
		update_post_meta($post_id, 'mattesti-text-color', sanitize_text_field($_POST['mattesti-text-color']));
	}
}

?>