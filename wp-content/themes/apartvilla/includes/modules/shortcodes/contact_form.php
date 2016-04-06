<?php
   ob_start();
   ?>

<!-- #appointment -->
<section id="appointment" class="anim-5-all <?php if($dark_background == true) echo 'dark-background'; ?>">
	<div class="container">
		<div class="row">
			<!-- .agent-info -->
			<div class="col-lg-7 col-md-8 col-lg-offset-0 col-md-offset-2 agent-info">
				<!-- .img-holder -->
				<div class="img-holder text-center-xs">
					<img src="<?php echo esc_url(wp_get_attachment_url($image, 'full'));?>" alt="<?php esc_html_e('image', 'apartvilla');?>">
				</div><!-- /.img-holder -->
				<!-- .content -->
				<div class="content">
					<!-- .section-title -->
					<div class="section-title">
						<span><?php echo balanceTags($title);?></span>
						<h2><span><?php echo balanceTags($sub_title);?></span></h2>
					</div><!-- /.section-title -->
					<h3><?php echo balanceTags($author_title);?></h3>
					<p><?php echo balanceTags($certificate);?></p>
					<p><?php echo esc_html_e('Phone :', 'apartvilla');?> <?php echo balanceTags($phone);?></p>
					<p><?php echo esc_html_e('Email :', 'apartvilla');?> <?php echo balanceTags($email);?></p>
				</div><!-- /.content -->
			</div><!-- /.agent-info -->
			<!-- .contact-form-wrap -->
			<div class="col-lg-5 col-md-7 col-lg-offset-0 col-md-offset-2 contact-form-wrap">
				<h3><?php echo balanceTags($contact_title);?></h3>
				<?php echo do_shortcode(bunch_base_decode($contact_our_agent));?>
			</div><!-- /.contact-form-wrap -->
		</div>
	</div>
</section><!-- /#appointment -->

<?php return ob_get_clean();?>		