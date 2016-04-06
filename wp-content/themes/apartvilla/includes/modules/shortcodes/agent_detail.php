<?php  
ob_start() ;?>

<section id="agent-information">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="img-holder">
					<img src="<?php echo esc_url(wp_get_attachment_url($img, 'full'));?>" alt="<?php esc_html_e('image', 'apartvilla');?>">
				</div>
			</div>
			<div class="col-md-8">
				<div class="agent-information-text">
					<!-- .section-title -->
					<div class="section-title">
						<span><?php echo balanceTags($sub_title);?></span>
						<h2><span><?php echo balanceTags($title);?></span></h2>
					</div><!-- /.section-title -->
					<h4><?php echo balanceTags($des_title);?></h4>
					<p class="certificate">(<?php echo balanceTags($designation);?>)</p>
					<p><?php echo balanceTags($text);?></p>
					<div class="row">
						<div class="col-md-6">
							<ul class="contact-text">
								<li><?php echo balanceTags($address);?></li>
								<li><?php echo balanceTags($address2);?></li>
							</ul>
						</div>
						<div class="col-md-6">
							<ul class="contact-text">
								<li><?php esc_html_e('Phone :', 'apartvilla');?> <?php echo balanceTags($phone);?></li>
								<li><?php esc_html_e('Email :', 'apartvilla');?> <?php echo balanceTags($email);?></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>   