<!-- .blog-wrap -->
<div class="col-lg-6 col-md-6 col-sm-6 blog-wrap hvr-float-shadow">
	<div class="col-lg-6 col-md-12 img-wrap">
		<?php the_post_thumbnail('270x202', array('class'=> 'img-responsive'));?>
		<h2><?php echo get_the_date('d M')?></h2>
	</div>
	<div class="col-lg-6 col-md-12 content-wrap">
		<h2><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h2>
		<p><?php echo _apartvilla_trim(get_the_content(), 20);?></p>
		<ul>
			<li><span><b><?php esc_html_e('By ', 'apartvilla');?></b><?php the_author();?></span></li>
			<li><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php esc_html_e('Learn more ', 'apartvilla');?></a></li>
		</ul>
	</div>
</div> <!-- /.blog-wrap -->
