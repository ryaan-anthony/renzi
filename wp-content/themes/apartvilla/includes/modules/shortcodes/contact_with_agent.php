<?php
   ob_start();
?>

<section class="contact-agent contact-content anim-5-all">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- .section-title -->
				<div class="section-title text-center">
					<span><?php echo balanceTags($sub_title);?></span>
					<h2><span><?php echo balanceTags($title);?></span></h2>				
				</div><!-- /.section-title -->
				<!-- .contact-form-wrap -->
				<div class="contact-form-wrap">
                	<?php echo do_shortcode(bunch_base_decode($contact_with_agent_form));?>
				</div><!-- /.contact-form-wrap -->
			</div>
		</div>
	</div>
</section>

<?php return ob_get_clean();?>		