<?php  
ob_start() ;?>

<!-- .contact-content -->
<section class="anim-3-all padding_bot">
	<div class="container">
		
		<!-- .call-to-action -->
		<div class="call-to-action style-two clearfix">
			<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
				<!-- .call-to-action-text -->
				<div class="call-to-action-text">
					<h2><?php echo balanceTags($title);?></h2>
					<p><?php echo balanceTags($text);?></p>
				</div><!-- /.call-to-action-text -->
			</div>
			<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 text-center">
				<button><?php echo balanceTags($btn_text);?></button>
			</div>
		</div><!-- /.call-to-action -->
	</div>
</section><!-- /.contact-content -->

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>   