<?php  
ob_start() ;?>
<!-- .call-to-action -->
<section class="call-to-action">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-8 col-sm-8 call-to-action-text">
				<h1><?php echo balanceTags($title);?></h1>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-4 call-to-action-button anim-5-all text-center">
				<button><?php echo balanceTags($btn);?></button>
			</div>
		</div>
	</div>
</section><!-- /.call-to-action -->

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>   