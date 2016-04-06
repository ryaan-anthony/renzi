<!-- .single-blog-post -->
<div class="single-blog-post anim-5-all">
	<!-- .img-holder -->
	<?php if(has_post_thumbnail()):?>
    <div class="img-holder">
		<?php the_post_thumbnail('1170x308', array('class' => 'img-responsive'));?>
		<div class="overlay"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><i class="fa fa-link"></i></a></div>
	</div><!-- /.img-holder -->
    <?php endif;?>
	<!-- .post-meta -->
	<div class="post-meta">
		<div class="date-holder">
			<b><?php echo get_the_date('d');?></b> <?php echo get_the_date('M');?>
		</div>
		<div class="title-holder">
			<h2 class="title"><a title="<?php the_title_attribute();?>" href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h2>
			<ul>
				<li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php esc_html_e('By ', 'apartvilla');?><?php the_author();?></a></li>
				<li><?php the_category();?></li>
				<li><a href="<?php echo esc_url(get_permalink(get_the_id()));?>#comments"><?php comments_number( 'Comment: 0', 'Comment: 1', 'Comments: %' ); ?></a></li>
			</ul>
		</div>
	</div><!-- /.post-meta -->
	<!-- .content -->
	<div class="content">
		<p><?php echo get_the_excerpt();?></p>

		<a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="read-more"><?php esc_html_e('Read More', 'apartvilla');?></a>
	</div><!-- /.content -->
</div>			