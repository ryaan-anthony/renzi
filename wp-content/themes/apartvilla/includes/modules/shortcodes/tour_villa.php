<?php  
ob_start() ;?>


<!-- #check-video -->
<section id="check-video" class="anim-5-all">
	<div class="container">
		<div class="row">
			<!-- .check-video-box -->
			<div class="col-lg-6 col-md-6 check-video-box">
				<div class="img-holder">
					<img src="<?php echo esc_url(wp_get_attachment_url($image, 'full'));?>" alt="<?php esc_html_e('image', 'apartvilla');?>">
					<div class="content">
						<a class="video-fancybox" title="Awesome RealEsate" href="<?php echo esc_url($video_link);?>"><i class="fa fa-play-circle"></i></a>
					</div>
				</div>
			</div><!-- /.check-video-box -->
			<!-- .check-video-text -->
			<div class="col-lg-6 col-md-6 check-video-text">
				<!-- .section-title -->
				<div class="section-title">
					<span><?php echo balanceTags($title);?></span>
					<h2><span><?php echo balanceTags($sub_title);?></span></h2>
				</div><!-- /.section-title -->
				<p><?php echo balanceTags($text);?></p>
				<a href="<?php echo esc_url($btn_link);?>"><?php echo balanceTags($btn_text);?></a>
			</div><!-- /.check-video-text -->
		</div>
	</div>
</section><!-- /#check-video -->

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>   