<?php  
   global $post;
   $count = 0;
   $query_args = array('post_type' => 'post' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   if( $cat ) $query_args['category_name'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   

<!-- #blogs -->
<section id="blogs" class="anim-5-all">
	<div class="container">
		<!-- .section-title -->
		<div class="section-title text-center">
			<span><?php echo balanceTags($title);?></span>
			<h2><span><?php echo balanceTags($sub_title);?></span></h2>
		</div><!-- /.section-title -->
		<div class="row">
			
            <?php while($query->have_posts()): $query->the_post();
				global $post; 
				$post_meta = _WSH()->get_meta();
			?>
            
            <div class="col-lg-4 col-md-4 col-sm-6">
				<!-- .single-blog-post -->
				<div class="single-blog-post">
					<div class="img-holder">
						<?php the_post_thumbnail('apartvilla_two', array('class' => 'img-responsive'));?>
						<div class="overlay"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><i class="fa fa-link"></i></a></div>
						<div class="date">
							<b><?php echo get_the_date('d');?></b> <?php echo get_the_date('M');?>
						</div>
					</div>
					<ul>
						<li><span><?php esc_html_e('By:', 'apartvilla');?><?php the_author();?></span></li>
						<li><a href="<?php echo esc_url(get_permalink(get_the_id()));?>#Comments:"><?php comments_number();?></a></li>
					</ul>
					<h2 class="title"><?php the_title();?></h2>
					<p><?php echo apartvilla_trim(get_the_content(), $text_limit);?></p>
					<a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php esc_html_e('Read more', 'apartvilla');?><i class="fa fa-angle-double-right"></i></a>
				</div><!-- /.single-blog-post -->
			</div>
			
            <?php endwhile;?>
            
		</div>
	</div>
</section><!-- /#blogs -->

<?php endif; ?>

<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>