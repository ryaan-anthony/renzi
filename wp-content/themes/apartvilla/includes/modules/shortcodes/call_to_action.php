<?php  
ob_start() ;?>

<!-- #luxury-villa -->
<section id="luxury-villa">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<!-- .section-title -->
				<div class="section-title">
					<span><?php echo balanceTags($title);?></span>
					<h2><span><?php echo balanceTags($sub_title);?></span></h2>
				</div><!-- /.section-title -->
			</div>
			<div class="col-lg-9">
				<p><?php echo balanceTags($text);?></p>
			</div>
		</div>
	</div>
</section><!-- /#luxury-villa -->

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>   