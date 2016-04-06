<?php  
   global $post;
   $count = 0;
   $query_args = array('post_type' => 'post' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   if( $cat ) $query_args['category_name'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   


<!-- .blog-container.blog-2-col -->
<section id="blogs" class="blog-container blog-2-col">
	<div class="container">
		<!-- .section-title -->
		<div class="section-title text-center">
			<span><?php echo balanceTags($sub_title);?></span>
			<h2><span><?php echo balanceTags($title);?></span></h2>
		</div><!-- /.section-title -->
		<div class="row">
			
            <?php while($query->have_posts()): $query->the_post();
				global $post; 
				$post_meta = _WSH()->get_meta();
			?>
            
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<!-- .single-blog-post -->
				<div class="single-blog-post anim-5-all">
					<!-- .img-holder -->
					<div class="img-holder">
						<?php the_post_thumbnail('apartvilla_eight', array('class' => 'img-responsive'));?>
						<div class="overlay"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><i class="fa fa-link"></i></a></div>
					</div><!-- /.img-holder -->
					<!-- .post-meta -->
					<div class="post-meta">
						<div class="date-holder">
							<b><?php echo get_the_date('d');?></b> <?php echo get_the_date('M');?>
						</div>
						<div class="title-holder">
							<h2 class="title"><?php the_title();?></h2>
							<ul>
								<li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php esc_html_e('By:', 'apartvilla');?><?php the_author();?></a></li>
								<li><?php the_category();?></li>
								<li><a href="<?php echo esc_url(get_permalink(get_the_id()));?>#Comments:"><?php comments_number();?></a></li>
							</ul>
						</div>
					</div><!-- /.post-meta -->
					<!-- .content -->
					<div class="content">
						<p><?php echo apartvilla_trim(get_the_content(), $text_limit);?></p>

						<a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="read-more"><?php esc_html_e('Read more', 'apartvilla');?></a>
					</div><!-- /.content -->
				</div><!-- /.single-blog-post -->
			</div>
			
            <?php endwhile;?>
            
		</div>
	</div>
</section><!-- /.blog-container.blog-2-col -->

<?php endif; ?>

<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>