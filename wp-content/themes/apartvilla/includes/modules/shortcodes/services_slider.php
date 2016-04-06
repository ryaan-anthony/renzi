<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   
   if( $cat ) $query_args['services_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   


<!-- .sliding-gallery -->
<section class="sliding-gallery <?php if($dark_background == true) echo 'dark-bg'; ?>">
	<div class="container-fluid">
		<!-- .section-title -->
		<div class="section-title text-center">
			<span><?php echo balanceTags($title);?></span>
			<h2><span><?php echo balanceTags($sub_title);?></span></h2>
            <?php if($text):?>
            	<p><?php echo balanceTags($text);?></p>
            <?php endif;?>
		</div><!-- /.section-title -->
		<div class="row">
			<!-- .image-gallery -->
			<div class="image-gallery bx-slider">

				<!-- .single-gallery -->
				
                <?php while($query->have_posts()): $query->the_post();
					global $post; 
					$services_meta = _WSH()->get_meta();
				?>
				<?php 
					$post_thumbnail_id = get_post_thumbnail_id($post->ID);
					$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
				?>
                
                <div class="single-gallery slide anim-5-all ">
					<div class="img-holder">
						<?php the_post_thumbnail('apartvilla_five', array('class' => 'img-responsive'));?>
						<div class="content">
							<div class="image-view">
								<a class="fancybox" href="<?php echo esc_url($post_thumbnail_url);?>">
									<i class="fa fa-camera"></i>
								</a>
							</div>
							<div class="title-holder"><h4><?php the_title();?></h4></div>
							<div class="link-view">
								<a href="#"><i class="fa fa-link"></i></a>
							</div>
						</div>
					</div>
				</div><!-- /.single-gallery -->
				
                <?php endwhile;?>
                
			</div><!-- /.image-gallery -->
		</div>
	</div>
</section><!-- /.sliding-gallery -->

<?php endif; ?>

<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>