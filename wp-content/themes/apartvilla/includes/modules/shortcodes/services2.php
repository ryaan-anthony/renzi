<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   
   if( $cat ) $query_args['services_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   


<section class="featured-option style-two">
	<div class="container">
		<!-- .section-title -->
		<div class="section-title text-center">
			<span><?php echo balanceTags($title);?></span>
			<h2><span><?php echo balanceTags($sub_title);?></span></h2>
		</div><!-- /.section-title -->
		<div class="row">
			
            <?php while($query->have_posts()): $query->the_post();
					global $post; 
					$services_meta = _WSH()->get_meta();
			?>
            
            <div class="col-lg-4 single-featured-option">
				<div class="icon-holder">
					<?php the_post_thumbnail('apartvilla_one', array('class' => 'img-responsive'));?>
				</div>
				<div class="content">
					<h4><?php the_title();?></h4>
					<p><?php echo apartvilla_trim(get_the_content(), $text_limit);?></p>
				</div>
			</div>
			
            <?php endwhile;?>
            
		</div>
	</div>	
</section>

<?php endif; ?>

<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>