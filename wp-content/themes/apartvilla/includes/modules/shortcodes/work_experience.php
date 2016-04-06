<?php  
ob_start() ;?>

<section class="agent-experience">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- .section-title -->
				<div class="section-title">
					<span><?php echo balanceTags($sub_title);?></span>
					<h2><span><?php echo balanceTags($title);?></span></h2>				
				</div><!-- /.section-title -->

				<p><?php echo balanceTags($text);?></p>

				<p><b><?php echo balanceTags($bold_text);?></b></p>

				<p><?php echo balanceTags($text2);?></p>
			</div>
		</div>
	</div>
</section>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>   