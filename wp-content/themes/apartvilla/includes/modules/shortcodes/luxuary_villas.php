<?php ob_start(); ?>

<!-- #about-section -->
<section id="about-section" class="parallax-section" style="background-image: url('<?php echo wp_get_attachment_url($background_img, 'full');?>');">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 text-center-sm text-center-xs">
				<!-- .img-holder -->
				<div class="img-holder">
					<img src="<?php echo esc_url(wp_get_attachment_url($img, 'full'));?>" alt="<?php esc_html_e('image', 'apartvilla');?>">
				</div><!-- /.img-holder -->
			</div>
			<!-- .about-text -->
			<div class="col-lg-8 col-md-8 about-text">
				<!-- .section-title -->
				<div class="section-title">
					<span><?php echo balanceTags($subtitle);?></span>
					<h2><span><?php echo balanceTags($title);?></span></h2>				
				</div><!-- /.section-title -->
				<p><?php echo balanceTags($text);?></p>
				<!-- .room-amount -->
				<ul class="room-amount text-center clearfix">
                
					<?php echo do_shortcode( $contents );?>
                    
				</ul><!-- /.room-amount -->
			</div><!-- /.about-text -->
		</div>
	</div>
</section><!-- /#about-section -->

<?php return ob_get_clean(); ?>