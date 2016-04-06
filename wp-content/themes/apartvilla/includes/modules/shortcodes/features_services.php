<?php  
ob_start() ;?>

<!-- #property-highlight -->
<section id="property-highlight" class="about-page">
	<div class="container">
		<div class="row">
			<!-- .full-img -->
			<div class="col-lg-5 col-md-12 col-sm-12 full-img">
				<!-- .img-holder -->
				<div class="img-holder">
					<img src="<?php echo esc_url(wp_get_attachment_url($img, 'full'));?>" alt="<?php esc_html_e('image', 'apartvilla');?>">
				</div><!-- /.img-holder -->
			</div><!-- /.full-img -->
			<!-- .property-highlight-text -->
			<div class="col-lg-7 col-md-12 col-sm-12 property-highlight-text">
				<!-- .section-title -->
				<div class="section-title">
					<span><?php echo balanceTags($title);?></span>
					<h2><span><?php echo balanceTags($sub_title);?></span></h2>
				</div><!-- /.section-title -->
				<!-- .facility-list -->
				<ul class="facility-list">
					<?php $fearures = explode("\n",$feature_str);?>
					<?php foreach($fearures as $feature):?>
                        <li><i class="fa fa-check-square-o"></i><?php echo balanceTags($feature);?></li>
                    <?php endforeach;?>
				</ul><!-- /.facility-list -->
                
                <ul class="facility-list">
					<?php $fearures = explode("\n",$features_str);?>
					<?php foreach($fearures as $features):?>
                        <li><i class="fa fa-check-square-o"></i><?php echo balanceTags($features);?></li>
                    <?php endforeach;?>
				</ul><!-- /.facility-list -->
			</div><!-- /.property-highlight-text -->
		</div>
	</div>
</section><!-- /#property-highlight -->

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>   