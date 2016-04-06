<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   
   if( $cat ) $query_args['services_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   


<!-- #property-highlight -->
<section id="property-highlight">
	<div class="container">
		<div class="row">
			<!-- .full-img -->
			<div class="col-lg-5 col-md-12 col-sm-12 full-img">
				<!-- .img-holder -->
				<div class="img-holder">
					<img src="<?php echo esc_url(wp_get_attachment_url($img, 'full'));?>" alt="<?php esc_html_e('image', 'apartvilla');?>">
				</div><!-- /.img-holder -->
			</div><!-- /.full-img -->
			<!-- .property-highlight-text -->
			<div class="col-lg-7 col-md-12 col-sm-12 property-highlight-text">
				<!-- .section-title -->
				<div class="section-title">
					<h2><span><?php echo balanceTags($title);?></span></h2>
				</div><!-- /.section-title -->
				<div class="row">
					
                    <?php while($query->have_posts()): $query->the_post();
							global $post; 
							$services_meta = _WSH()->get_meta();
					?>
                    
                    <div class="col-lg-6 col-md-6 col-sm-6">
						<!-- .single-property-highlight -->
						<div class="single-property-highlight">
							<h3><?php the_title();?></h3>
							<p><?php echo apartvilla_trim(get_the_content(), $text_limit);?></p>
						</div><!-- /.single-property-highlight -->
					</div>
                    
                    <?php endwhile;?>

				</div>
			</div><!-- /.property-highlight-text -->
		</div>
	</div>
</section><!-- /#property-highlight -->

<?php endif; ?>

<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>