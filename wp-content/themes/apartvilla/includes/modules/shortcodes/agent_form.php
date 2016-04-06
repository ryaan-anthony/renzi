<?php  
ob_start() ;?>

<section class="contact-style-two anim-5-all" id="contact-section">
	<div class="container">
		<div class="row">
			<div class="col-md-5 contact-info-wrap">
				<!-- .section-title -->
				<div class="section-title">
					<span><?php echo balanceTags($sub_title);?></span>
					<h2><span><?php echo balanceTags($title);?></span></h2>
				</div><!-- /.section-title -->
				<div class="contact-info">
					<ul>
						<li><?php echo balanceTags($address);?></li>
						<li><?php esc_html_e('Phone :', 'apartvilla');?> <?php echo balanceTags($phone);?></li>
						<li><?php esc_html_e('Email :', 'apartvilla');?> <?php echo balanceTags($email);?></li>
					</ul>
				</div>
			</div>
			<div class="col-md-7 right-side-overlay-full">
				<!-- .contact-form-wrap -->
				<div class="contact-form-wrap">
                	<?php echo do_shortcode(bunch_base_decode($agent_detail_form));?>
				</div><!-- /.contact-form-wrap -->
			</div>
		</div>
	</div>
</section>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>   