<?php ob_start(); ?>


<!-- .take-a-tour-video-box -->
<section class="take-a-tour-video-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- .section-title -->
				<div class="section-title text-center">
					<span><?php echo balanceTags($subtitle);?></span>
					<h2><span><?php echo balanceTags($title);?></span></h2>
					<p><?php echo balanceTags($text);?></p>
				</div><!-- /.section-title -->
				<!-- .check-video-box -->
				<div class="check-video-box">
					<div class="img-holder">
						<img src="<?php echo esc_url(wp_get_attachment_url($img, 'full'));?>" alt="<?php esc_html_e('image', 'apartvilla');?>">
						<div class="content">
							<a class="video-fancybox" title="Awesome RealEsate" href="<?php echo esc_url($video_link);?>"><i class="fa fa-play-circle"></i></a>
						</div>
					</div>
				</div><!-- /.check-video-box -->
				<!-- .room-amount -->
				<ul class="room-amount text-center clearfix">
					<?php echo do_shortcode( $contents );?>
				</ul><!-- /.room-amount -->
			</div>
		</div>
	</div>
</section><!-- /.take-a-tour-video-box -->

<?php return ob_get_clean(); ?>