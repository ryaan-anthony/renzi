<?php $options = get_option(BUNCH_NAME.'_theme_options');
	$slides1 = array();
	$slides3 = array();
?>
<?php if(apartvilla_set($options, 'whole_footer')):?>
<!-- #footer-home -->
<footer id="footer-home" class="anim-5-all text-center-sm text-center-xs">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-left">
				<?php if(apartvilla_set($options, 'footer_logo_image')):?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" src="<?php echo esc_url(apartvilla_set($options, 'footer_logo_image'));?>" alt="<?php esc_html_e('image', 'apartvilla');?>"></a>
				<?php else:?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" src="<?php echo esc_url(get_template_directory_uri().'/img/resources/footer-logo.png');?>" alt="<?php esc_html_e('image', 'apartvilla');?>"></a>
				<?php endif;?>
			</div>
			<div class="col-lg-7 col-md-7 col-sm-12 pull-right text-right text-center-sm text-center-xs">
				<?php if(apartvilla_set($options, 'footer_menu')):?>
				<!-- .footer-menu -->
				<div class="footer-menu">
					<ul>
						<?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'container_id' => 'navbar-collapse-1',
								'container_class'=>'navbar-collapse collapse navbar-right',
								'menu_class'=>'nav navbar-nav',
								'fallback_cb'=>false, 
								'items_wrap' => '%3$s', 
								'container'=>false,
								'walker'=> new Bunch_Bootstrap_walker()  
							) ); ?>
					</ul>
				</div><!-- /.footer-menu -->
				<?php endif;?>
				<!-- .footer-copyright -->
				<?php if(apartvilla_set($options, 'copy_right')):?>
				<div class="footer-copyright">
					<p><?php echo apartvilla_set($options, 'copy_right');?></p>
				</div><!-- /.footer-copyright -->
				<?php endif;?>
			</div>
		</div>
	</div>
</footer><!-- /#footer-home -->

<!-- Modal -->
<div class="modal fade contact-agent-modal" id="contact-agent-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<?php if(apartvilla_set($options, 'modal_title')):?>
					<h4 class="modal-title text-center" id="myModalLabel"><?php echo apartvilla_set($options, 'modal_title');?></h4>
				<?php endif;?>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="modal-agent-info-box">
					<?php if(apartvilla_set($options, 'agent_image')):?>
						<div class="img-holder">
							<img src="<?php echo esc_url(apartvilla_set($options, 'agent_image'));?>" alt="<?php esc_html_e('image', 'apartvilla');?>">
						</div>
					<?php endif;?>
					<div class="content">
						<h3><span class="name"><?php echo apartvilla_set($options, 'agent_name');?></span> <span class="position"><?php echo apartvilla_set($options, 'agent_designation');?></span></h3>
						<p><?php esc_html_e('Phone :', 'apartvilla'); echo apartvilla_set($options, 'agent_phone');?> &emsp; <?php esc_html_e('Email :', 'apartvilla'); echo apartvilla_set($options, 'agent_display_email');?></p>
					</div>
				</div>
				<?php if(apartvilla_set($options, 'contactform7_shortcode')):?>
				<div class="modal-contact-form clearfix">
					<!-- .contact-form-wrap -->
					<div class="contact-form-wrap anim-5-all">
						<?php echo do_shortcode( apartvilla_set($options, 'contactform7_shortcode') );?>
					</div><!-- /.contact-form-wrap -->					
				</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>
<!-- /Modal -->


<?php endif;?>
<?php if(apartvilla_set($options, 'header_v1_slides')) $slides1 = apartvilla_set(apartvilla_set($options, 'header_v1_slides'), 'header_v1_slides'); 
	  if(apartvilla_set($options, 'header_v3_slides')) $slides3 = apartvilla_set(apartvilla_set($options, 'header_v3_slides'), 'header_v3_slides');?>
<script type="text/javascript">
// 1.bannerSlider
function bannerSlider () {
	if ($('.banner-one').length) {			
		$(".banner-one").vegas({
			timer: false,
			transition: [ 'fade2' ],
		    slides: [
		        <?php foreach($slides1 as $key => $value):
					if(apartvilla_set($value, 'tocopy')) continue;
				?>
					{ src: "<?php echo apartvilla_set($value, 'v1_slide_img');?>" },
				<?php endforeach;?>
		        
		    ]
		});
	};
	if ($('.banner-two').length) {			
		$(".banner-two").vegas({
			timer: false,
			transition: [ 'fade2' ],
		    slides: [
		        <?php foreach($slides3 as $key => $value):
					if(apartvilla_set($value, 'tocopy')) continue;
				?>
					{ src: "<?php echo apartvilla_set($value, 'v3_slide_img');?>" },
				<?php endforeach;?>
		    ]
		});
	};
}
jQuery(document).on('ready', function () {
	(function ($) {
		bannerSlider();
	})(jQuery);
});
	
</script>

<?php wp_footer(); ?>

</body>

</html>