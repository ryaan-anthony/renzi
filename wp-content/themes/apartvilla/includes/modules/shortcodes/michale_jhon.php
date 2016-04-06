<?php  
ob_start() ;?>

<section class="about-agent anim-3-all">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="img-holder">
					<img src="<?php echo esc_url(wp_get_attachment_url($img, 'full'));?>" alt="<?php esc_html_e('image', 'apartvilla');?>">
					<div class="social-icons">
						<ul>
							<li><a href="<?php echo esc_url($facebook_link);?>"><i class="fa fa-facebook"></i></a></li>
							<li><a href="<?php echo esc_url($twitter_link);?>"><i class="fa fa-twitter"></i></a></li>
							<li><a href="<?php echo esc_url($g_plus_link);?>"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="<?php echo esc_url($linkedin_link);?>"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>

			</div>
			<div class="col-md-7">
				<div class="agent-info-text">
					<!-- .section-title -->
					<div class="section-title">
						<span><?php echo balanceTags($sub_title);?></span>
						<h2><span><?php echo balanceTags($title);?></span></h2>				
					</div><!-- /.section-title -->
					<p><?php echo balanceTags($text);?></p>
					
					<div class="contact-button">
						<ul>
							<li class="hvr-bounce-to-right">
								<span class="icon-box"><i class="fa fa-phone"></i></span> 
								<span class="text"><?php echo balanceTags($phone);?></span></li>
							<li class="hvr-bounce-to-right">
								<span class="icon-box"><i class="fa fa-envelope-o"></i></span>
								<span class="text"><?php echo sanitize_email($email);?></span>
							</li>
						</ul>
					</div>
					<!-- .section-title -->
					<div class="section-title style-two">
						<h2><span><?php echo balanceTags($practice_heading);?></span></h2>				
					</div><!-- /.section-title -->

					<ul class="practice-areas">
                    	<?php $fearures = explode("\n",$feature_str);?>
						<?php foreach($fearures as $features):?>
                            <li><?php echo balanceTags($features);?></li>
                        <?php endforeach;?>
					</ul>

				</div>
			</div>
		</div>
	</div>
</section>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>   