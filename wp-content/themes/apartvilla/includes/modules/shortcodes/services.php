<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   
   if( $cat ) $query_args['services_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   


<!-- .featured-option -->
<section class="featured-option">
	<div class="container">
		<div class="row">
			
            <?php while($query->have_posts()): $query->the_post();
					global $post; 
					$services_meta = _WSH()->get_meta();
			?>
            
            <div class="col-lg-4 col-md-4 col-sm-4 single-featured-option">
				<div class="icon-holder">
                	<i class="<?php echo apartvilla_set($services_meta, 'social_icon')?>"></i>
				</div>
				<div class="content">
					<h4><?php the_title();?></h4>
					<p><?php echo apartvilla_trim(get_the_content(), $text_limit);?></p>
				</div>
			</div>
            
            <?php endwhile;?>

		</div>
	</div>
</section><!-- /.featured-option -->

<?php endif; ?>

<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>