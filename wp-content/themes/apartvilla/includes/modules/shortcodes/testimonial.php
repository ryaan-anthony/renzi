<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_testimonials' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   
   if( $cat ) $query_args['testimonials_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   

<div class="col-lg-push-0 col-md-push-3 col-sm-push-3 col-xs-push-0">
    <!-- .testimonial-wrap -->
    <div class="testimonial-wrap ">
        <div class="border">
            <div class="owl-carousel owl-theme">
                
                <?php while($query->have_posts()): $query->the_post();
					global $post; 
					$testimonials_meta = _WSH()->get_meta();
				?>
                
                <!-- .single-testimonail -->
                <div class="single-testimonail item">
                    <?php the_post_thumbnail('apartvilla_one', array('class' => 'img-responsive'));?>
                    <span class="qoute"><?php echo esc_html_e('“', 'apartvilla');?></span>
                    <p><?php echo apartvilla_trim(get_the_content(), $text_limit);?></p>
                    <span class="name"><?php the_title();?></span>
                </div><!-- /.single-testimonail -->
                
                <?php endwhile;?>
                
            </div>
        </div>
    </div><!-- /.testimonial-wrap -->
</div>

<?php endif; ?>

<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>