<?php  
ob_start() ;?>

<!-- #about-page-content -->
<section id="about-page-content">
	<div class="container">
		<div class="row">
			<!-- .about-page-text -->
			<div class="col-lg-6 col-md-6 about-page-text">
				<!-- .section-title -->
				<div class="section-title">
					<span><?php echo balanceTags($title);?></span>
					<h2><span><?php echo balanceTags($sub_title);?></span></h2>				
				</div><!-- /.section-title -->
				<p><?php echo balanceTags($contents);?></p>
			</div><!-- /.about-page-text -->
			<!-- .about-page-image -->
			<div class="col-lg-6 col-md-6 about-page-image text-right">
				<img src="<?php echo esc_url(wp_get_attachment_url($img, 'full'));?>" alt="<?php esc_html_e('image', 'apartvilla');?>">
			</div><!-- /.about-page-image -->
		</div>
	</div>
</section><!-- /#about-page-content -->

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>   