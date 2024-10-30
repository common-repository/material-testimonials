<?php

add_action('admin_menu', 'mattesti_doc_page_create_menu');

function mattesti_doc_page_create_menu() {

 	add_submenu_page(
        'edit.php?post_type=testimonials',
        __( 'Documentation', 'material-testimonials' ),
        __( 'Documentation', 'material-testimonials' ),
        'manage_options',
        'mattesti-doc-page',
        'mattesti_doc_page_callback'
    );
	
}


function mattesti_doc_page_callback(){
	?>
	<style type="text/css">
		span.shortcode {
		    display: block;
		    margin: 2px 0;
		}

		span.shortcode > input {
		    background: inherit;
		    color: inherit;
		    font-size: 12px;
		    border: none;
		    box-shadow: none;
		    padding: 4px 8px;
		    margin: 0;
		}
	</style>
	<div class="wrap">
		<table width="100%" cellspacing="10" cellpadding="0">
			<tbody>
				<tr>
					<td><h3>Shortcode:</h3></td>
					<td><span class="shortcode"><input type="text" onfocus="this.select();" readonly="readonly" value="[material-testimonials]" class="large-text code"></span></td>
				</tr>
				<tr>
					<td colspan="2"><hr><h3>Options</h3></td>
				</tr>
				<tr>
					<td><b>style</b></td>
					<td>style1 (default), style2, style3, style4</td>
				</tr>
				<tr>
					<td><b>items</b></td>
					<td>Integer (default 3)</td>
				</tr>
				<tr>
					<td><b>margin</b></td>
					<td>Integer (default 15)</td>
				</tr>
				<tr>
					<td><b>speed</b></td>
					<td>Milliseconds (default 5000)</td>
				</tr>
				<tr>
					<td><b>controlColor</b></td>
					<td>color (default #c1c1c1)</td>
				</tr>
				<tr>
					<td><b>controlActiveColor</b></td>
					<td>color (default #212121)</td>
				</tr>
				<tr>
					<td><b>order</b></td>
					<td>DESC (default), ASC</td>
				</tr>
				<tr>
					<td><b>orderby</b></td>
					<td>date (default), title, rand, menu_order</td>
				</tr>
				<tr>
					<td><b>nav</b></td>
					<td>true (default), false</td>
				</tr>
				<tr>
					<td><b>loop</b></td>
					<td>true (default), false</td>
				</tr>
				
				<tr>
					<td><b>autoplay</b></td>
					<td>true (default), false</td>
				</tr>
				
				<tr>
					<td><b>hoverPause</b></td>
					<td>true (default), false</td>
				</tr>
				<tr>
					<td><b>drag</b></td>
					<td>true (default), false</td>
				</tr>
				<tr>
					<td><b>dots</b></td>
					<td>true (default), false</td>
				</tr>
				
				<tr>
					<td colspan="2" style="text-align: center;"><hr><h3>Demo</h3></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;">
						<h4>Style1</h4>
						<img src="<?php echo MATTESTI_PLUGIN; ?>img/style1.jpg">
						<hr>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;">
						<h4>Style2</h4>
						<img src="<?php echo MATTESTI_PLUGIN; ?>img/style2.jpg">
						<hr>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;">
						<h4>Style3</h4>
						<img src="<?php echo MATTESTI_PLUGIN; ?>img/style3.jpg">
						<hr>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;">
						<h4>Style4</h4>
						<img src="<?php echo MATTESTI_PLUGIN; ?>img/style4.jpg">
					</td>
				</tr>
			</tbody>
		</table>
		
	</div>
	<?php
}
?>