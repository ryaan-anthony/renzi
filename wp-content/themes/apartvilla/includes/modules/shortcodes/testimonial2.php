<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_testimonials' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   
   if( $cat ) $query_args['testimonials_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   


<section class="testimonial has-overlay parallax-section" style="background-image: url('<?php echo wp_get_attachment_url($img, 'full');?>');">
	<div class="container">
		<!-- .testimonial-wrap -->
		<div class="testimonial-wrap-style-two">
			<div class="clearfix">
				<div class="owl-carousel owl-theme">
					
                    <?php while($query->have_posts()): $query->the_post();
						global $post; 
						$testimonials_meta = _WSH()->get_meta();
					?>
                    
                    <!-- .single-testimonail -->
					<div class="single-testimonail item">
						<div class="img-holder">
                            <?php the_post_thumbnail('apartvilla_one', array('class' => 'img-responsive'));?>
						</div>
						<div class="content clearfix">
							<p><span class="qoute">“</span><?php echo apartvilla_trim(get_the_content(), $text_limit);?></p>
							<div class="meta">
								<span class="name"><?php the_title();?></span>
								<span class="postion"><?php echo apartvilla_set($testimonials_meta, 'designation');?></span>
							</div>
						</div>
					</div><!-- /.single-testimonail -->
					
                    <?php endwhile;?>
                    
				</div>
			</div>
		</div><!-- /.testimonial-wrap -->
	</div>
</section>

<?php endif; ?>

<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>