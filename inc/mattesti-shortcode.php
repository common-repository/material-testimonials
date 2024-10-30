<?php

function mattesti_shortcode_handler( $atts ) {
    $arr = shortcode_atts( array(
        'style' => 'style1',
        'items' => '3',
        'nav'   => 'true',
        'loop'	=> 'true',
        'margin'=> 15,
        'autoplay'=> 'true',
        'speed' => 5000,
        'hoverPause' => 'true',
        'drag' => 'true',
        'dots' => 'true',
        'controlColor' => '#c1c1c1',
        'controlActiveColor' => '#212121',
        'orderby' => 'date',
        'order' => 'DESC'
    ), $atts );

    static $uid = 1;
    

    $args = array(
    	'post_type' => 'testimonials',
    	'order'		=> $arr['order'],
    	'orderby'		=> $arr['orderby'],
    	'posts_per_page' => -1,
    	'post_status' => 'publish'
    );

    $the_query = new WP_Query( $args );
	
    ob_start();
	
	if ( $the_query->have_posts() ) {
		?>
		<style type="text/css">
			#material-testimonials-<?php echo $uid; ?> .owl-dots .owl-dot span{
				background-color: <?php echo $arr['controlColor']; ?> !important;
			}

			#material-testimonials-<?php echo $uid; ?> .owl-dots .owl-dot.active span,
			#material-testimonials-<?php echo $uid; ?> .owl-dots .owl-dot:hover span{
				background-color: <?php echo $arr['controlActiveColor']; ?> !important;
			}

			#material-testimonials-<?php echo $uid; ?> .owl-nav [class*=owl-]{
				background-color: <?php echo $arr['controlColor']; ?> !important;
			}

			#material-testimonials-<?php echo $uid; ?> .owl-nav [class*=owl-]:hover,
			#material-testimonials-<?php echo $uid; ?> .owl-nav [class*=owl-]:active{
				background-color: <?php echo $arr['controlActiveColor']; ?> !important;
			}
		</style>
		<div id='material-testimonials-<?php echo $uid; ?>' class="material-testimonials owl-carousel owl-theme">
			<?php
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$post_id = get_the_id();
				?>
					<div class="item">
						<?php if($arr['style']=='style4'){ ?>
							<div class="testimonial style4 shadow" style="background-color: <?php echo esc_attr(get_post_meta($post_id, 'mattesti-bg-color', true)) ?>; color: <?php echo esc_attr(get_post_meta($post_id, 'mattesti-text-color', true)); ?>;">
								<div class="testimonial-wrapper">
									<div class="testimonial-image">
										<img src="<?php echo (has_post_thumbnail())? get_the_post_thumbnail_url($post_id): MATTESTI_PLUGIN.'img/default1.png'; ?>">
									</div>
									<div class="testimonial-col">
										<p class="testimonial-title"><b><?php the_title(); ?></b></p>
										<p class="testimonial-subtitle"><i><?php echo esc_attr(get_post_meta($post_id, 'mattesti-sub-title', true)); ?></i></p>
										<ul class="mattesti-social-icons">
											<?php
											if($facebook_url = esc_url(get_post_meta($post_id, 'mattesti-facebook-url', true))){
												?>
												<li><a target="_blank" href="<?php echo $facebook_url; ?>"><i class="fa fa-facebook"></i></a></li>
												<?php
											}
											
											if($twitter_url = esc_url(get_post_meta($post_id, 'mattesti-twitter-url', true))){
												?>
												<li><a target="_blank" href="<?php echo $twitter_url; ?>"><i class="fa fa-twitter"></i></a></li>
												<?php
											}
											
											if($linkedin_url = esc_url(get_post_meta($post_id, 'mattesti-linkedin-url', true))){
												?>
												<li><a target="_blank" href="<?php echo $linkedin_url; ?>"><i class="fa fa-linkedin"></i></a></li>
												<?php
											}

											if($instagram_url = esc_url(get_post_meta($post_id, 'mattesti-instagram-url', true))){
												?>
												<li><a target="_blank" href="<?php echo $instagram_url; ?>"><i class="fa fa-instagram"></i></a></li>
												<?php
											}
											?>
										</ul>
									</div>
								</div>
								<div class="testimonial-content"><?php the_content(); ?></div>
							</div>
						<?php }elseif($arr['style']=='style3'){ ?>
							<div class="testimonial style3 shadow" style="background-color: <?php echo esc_attr(get_post_meta($post_id, 'mattesti-bg-color', true)) ?>; color: <?php echo esc_attr(get_post_meta($post_id, 'mattesti-text-color', true)); ?>;">
								<div class="testimonial-wrapper-col1">
									<div class="testimonial-image">
										<img src="<?php echo (has_post_thumbnail())? get_the_post_thumbnail_url($post_id): MATTESTI_PLUGIN.'img/default1.png'; ?>">
									</div>
									<p class="testimonial-title"><b><?php the_title(); ?></b></p>
									<p class="testimonial-subtitle"><i><?php echo esc_attr(get_post_meta($post_id, 'mattesti-sub-title', true)); ?></i></p>
									<ul class="mattesti-social-icons">
										<?php
										if($facebook_url = esc_url(get_post_meta($post_id, 'mattesti-facebook-url', true))){
											?>
											<li><a target="_blank" href="<?php echo $facebook_url; ?>"><i class="fa fa-facebook"></i></a></li>
											<?php
										}
										
										if($twitter_url = esc_url(get_post_meta($post_id, 'mattesti-twitter-url', true))){
											?>
											<li><a target="_blank" href="<?php echo $twitter_url; ?>"><i class="fa fa-twitter"></i></a></li>
											<?php
										}
										
										if($linkedin_url = esc_url(get_post_meta($post_id, 'mattesti-linkedin-url', true))){
											?>
											<li><a target="_blank" href="<?php echo $linkedin_url; ?>"><i class="fa fa-linkedin"></i></a></li>
											<?php
										}

										if($instagram_url = esc_url(get_post_meta($post_id, 'mattesti-instagram-url', true))){
											?>
											<li><a target="_blank" href="<?php echo $instagram_url; ?>"><i class="fa fa-instagram"></i></a></li>
											<?php
										}
										?>
									</ul>
								</div>
								<div class="testimonial-wrapper-col2">
									<div class="testimonial-content"><?php the_content(); ?></div>
								</div>
							</div>
						<?php }elseif($arr['style']=='style2'){ ?>	
							<div class="testimonial style2" >
								<div class="shadow testimonial-wrapper" style="background-color: <?php echo esc_attr(get_post_meta($post_id, 'mattesti-bg-color', true)) ?>; color: <?php echo esc_attr(get_post_meta($post_id, 'mattesti-text-color', true)); ?>;">
									<div class="testimonial-image">
										<img src="<?php echo (has_post_thumbnail())? get_the_post_thumbnail_url($post_id): MATTESTI_PLUGIN.'img/default1.png'; ?>">
									</div>
									<div class="testimonial-content"><?php the_content(); ?></div>
									<p class="testimonial-title"><b><?php the_title(); ?></b></p>
									<p class="testimonial-subtitle"><i><?php echo esc_attr(get_post_meta($post_id, 'mattesti-sub-title', true)); ?></i></p>
									<ul class="mattesti-social-icons">
										<?php
										if($facebook_url = esc_url(get_post_meta($post_id, 'mattesti-facebook-url', true))){
											?>
											<li><a target="_blank" href="<?php echo $facebook_url; ?>"><i class="fa fa-facebook"></i></a></li>
											<?php
										}
										
										if($twitter_url = esc_url(get_post_meta($post_id, 'mattesti-twitter-url', true))){
											?>
											<li><a target="_blank" href="<?php echo $twitter_url; ?>"><i class="fa fa-twitter"></i></a></li>
											<?php
										}
										
										if($linkedin_url = esc_url(get_post_meta($post_id, 'mattesti-linkedin-url', true))){
											?>
											<li><a target="_blank" href="<?php echo $linkedin_url; ?>"><i class="fa fa-linkedin"></i></a></li>
											<?php
										}

										if($instagram_url = esc_url(get_post_meta($post_id, 'mattesti-instagram-url', true))){
											?>
											<li><a target="_blank" href="<?php echo $instagram_url; ?>"><i class="fa fa-instagram"></i></a></li>
											<?php
										}
										?>
									</ul>
								</div>
								
							</div>
						<?php }else{ ?>
							<div class="shadow testimonial style1" style="background-color: <?php echo esc_attr(get_post_meta($post_id, 'mattesti-bg-color', true)) ?>; color: <?php echo esc_attr(get_post_meta($post_id, 'mattesti-text-color', true)); ?>;">
								<div class="testimonial-image">
									<img src="<?php echo (has_post_thumbnail())? get_the_post_thumbnail_url($post_id): MATTESTI_PLUGIN.'img/default1.png'; ?>">
								</div>
								<div class="testimonial-content"><?php the_content(); ?></div>
								<p class="testimonial-title"><b><?php the_title(); ?></b></p>
								<p class="testimonial-subtitle"><i><?php echo esc_attr(get_post_meta($post_id, 'mattesti-sub-title', true)); ?></i></p>
								<ul class="mattesti-social-icons">
									<?php
									if($facebook_url = esc_url(get_post_meta($post_id, 'mattesti-facebook-url', true))){
										?>
										<li><a target="_blank" href="<?php echo $facebook_url; ?>"><i class="fa fa-facebook"></i></a></li>
										<?php
									}
									
									if($twitter_url = esc_url(get_post_meta($post_id, 'mattesti-twitter-url', true))){
										?>
										<li><a target="_blank" href="<?php echo $twitter_url; ?>"><i class="fa fa-twitter"></i></a></li>
										<?php
									}
									
									if($linkedin_url = esc_url(get_post_meta($post_id, 'mattesti-linkedin-url', true))){
										?>
										<li><a target="_blank" href="<?php echo $linkedin_url; ?>"><i class="fa fa-linkedin"></i></a></li>
										<?php
									}

									if($instagram_url = esc_url(get_post_meta($post_id, 'mattesti-instagram-url', true))){
										?>
										<li><a target="_blank" href="<?php echo $instagram_url; ?>"><i class="fa fa-instagram"></i></a></li>
										<?php
									}
									?>
								</ul>
							</div>
						<?php } ?>
					</div>
				<?php
			}
			?>
		</div>
		<?php
		wp_reset_postdata();
	}
	
	?>
	<script type="text/javascript">
		(function($){
			$(window).load(function(){
				$('#material-testimonials-<?php echo $uid; ?>').owlCarousel({
				    loop: Boolean(<?php echo $arr['loop']; ?>),
				    nav: Boolean(<?php echo $arr['nav']; ?>),
				    margin: parseInt(<?php echo $arr['margin']; ?>),
				    autoplay: Boolean(<?php echo $arr['autoplay']; ?>),
				    autoplayTimeout: parseInt(<?php echo $arr['speed']; ?>),
				    autoplayHoverPause: Boolean(<?php echo $arr['hoverPause']; ?>),
				    touchDrag: Boolean(<?php echo $arr['drag']; ?>),
				    mouseDrag: Boolean(<?php echo $arr['drag']; ?>),
				    dots: Boolean(<?php echo $arr['dots']; ?>),
				    navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
				    responsive:{
				        0:{
				            items:1
				        },
				        800:{
				            items:2
				        },
				        1200:{
				            items: parseInt(<?php echo $arr['items']; ?>)
				        }
				    }
				});
			});
			
		})(jQuery);
	</script>
	<?php
	$uid++;
	return ob_get_clean();
}
add_shortcode( 'material-testimonials', 'mattesti_shortcode_handler' );

?>