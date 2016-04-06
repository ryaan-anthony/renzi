<?php
   ob_start();
   ?>

<!-- .contact-content -->
<section class="contact-content anim-3-all">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- .section-title -->
				<div class="section-title text-center">
					<span><?php echo balanceTags($title);?></span>
					<h2><span><?php echo balanceTags($sub_title);?></span></h2>
					<p><?php echo balanceTags($text);?></p>
				</div><!-- /.section-title -->
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<!-- .contact-form-wrap -->
				<div class="contact-form-wrap">
                	<?php echo do_shortcode(bunch_base_decode($room_dimension_form));?>
				</div><!-- /.contact-form-wrap -->
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<!-- .agent-info -->
				<div class="agent-info style-two text-center">
					<img src="<?php echo esc_url(wp_get_attachment_url($image, 'full'));?>" alt="<?php esc_html_e('image', 'apartvilla');?>">
					<!-- .content -->
					<div class="content">
						<h3><?php echo balanceTags($author_title);?></h3>
						<p class="certificate"><?php echo balanceTags($certificate);?></p>
						<p><?php echo esc_html_e('Phone :', 'apartvilla');?> <?php echo balanceTags($phone);?></p>
						<p><?php echo esc_html_e('Email :', 'apartvilla');?> <?php echo sanitize_email($email);?></p>
					</div><!-- /.content -->
					<div class="social-icons">
						<ul>
							<li><a href="<?php echo esc_url($facebook_link);?>"><i class="fa fa-facebook"></i></a></li>
							<li><a href="<?php echo esc_url($twitter_link);?>"><i class="fa fa-twitter"></i></a></li>
							<li><a href="<?php echo esc_url($g_plus_link);?>"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="<?php echo esc_url($linkedin_link);?>"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div><!-- /.agent-info -->
			</div>
		</div>

	</div>
</section><!-- /.contact-content -->

<?php return ob_get_clean();?>		