<!-- .single-blog-post -->
<div class="single-blog-post anim-5-all">
	<?php if(has_post_thumbnail()):?>
		<!-- .row -->
		<div class="row">
<?php endif;?>
<?php if(has_post_thumbnail()):?>
	<!-- .img-holder -->
	    <div class="img-holder col-md-4">
				<a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_post_thumbnail('1170x308', array('class' => 'img-responsive'));?></a>
				<div class="overlay"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><i class="fa fa-link"></i></a></div>
			</div><!-- /.img-holder -->
  <?php endif;?>
	<!-- .post-meta -->
	<div class="<?php if(has_post_thumbnail()):?>col-md-8<?php endif;?>">
		<div class="title-holder">
			<h2 class="title"><a title="<?php the_title_attribute();?>" href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h2>
			<p><?php the_category();?></p>
		</div>
		<!-- .content -->
		<div class="content">
			<p><?php echo get_the_excerpt();?></p>

			<a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="learn-more"><?php esc_html_e('Learn More About This Property', 'apartvilla');?></a>
		</div><!-- /.content -->
	</div><!-- /.post-meta -->

	<?php if(has_post_thumbnail()):?>
		</div><!-- /.row -->
  <?php endif;?>
</div>
