<?php  
ob_start() ;?>

<!-- .call-to-action -->
<section class="call-to-action anim-5-all">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 call-to-action-text">
				<h1><?php echo balanceTags($title);?></h1>
			</div>
			<div class="col-lg-3 call-to-action-button anim-5-all text-center">
				<button  data-toggle="modal" data-target="#contact-agent-modal"><?php echo balanceTags($btn_text);?></button>
			</div>
		</div>
		<!-- .call-to-action -->
		<div class="call-to-action style-two clearfix">
			<div class="col-lg-9">
				<!-- .call-to-action-text -->
				<div class="call-to-action-text">
					<h2><?php echo balanceTags($sub_title);?></h2>
					<p><?php echo balanceTags($text);?></p>
				</div><!-- /.call-to-action-text -->
			</div>
			<div class="col-lg-3 text-center">
				<button data-toggle="modal" data-target="#contact-agent-modal"><?php echo balanceTags($schdule_btn);?></button>
			</div>
		</div><!-- /.call-to-action -->
	</div>
</section><!-- /.call-to-action -->

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>   