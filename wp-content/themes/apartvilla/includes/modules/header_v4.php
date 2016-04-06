<?php $options = _WSH()->option();
bunch_global_variable();
?>
<?php if(apartvilla_set($options, 'preloader')):?>
<!-- .preloader -->
<div class="preloader"></div>
<!-- /.preloader -->
<?php endif;?>
<?php if(apartvilla_set($options, 'side_menu')):?>
<!-- .hidden-bar -->
<section class="hidden-bar anim-5">
	<div class="hidden-bar-closer">
		<button class="btn">
			<i class="fa fa-close"></i>
		</button>
	</div>
	<!-- .hidden-bar-wrapper -->
	<div class="hidden-bar-wrapper">

		<!-- .logo -->
		<div class="logo text-center side_logo">
			<?php if(apartvilla_set($options, 'side_logo_image')):?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" src="<?php echo esc_url(apartvilla_set($options, 'side_logo_image'));?>" alt="<?php esc_html_e('image', 'apartvilla');?>"></a>
            <?php else:?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" src="<?php echo esc_url(get_template_directory_uri().'/img/resources/hidden-bar-logo.png');?>" alt="<?php esc_html_e('image', 'apartvilla');?>"></a>
            <?php endif;?>			
		</div><!-- /.logo -->
		<!-- .main-menu -->
		<div class="main-menu text-center">
	    	<!-- .navigation -->
	        <ul class="navigation scroll-menu clearfix">
	            <?php wp_nav_menu( array( 'theme_location' => 'side_menu', 'container_id' => 'navbar-collapse-1',
					'container_class'=>'navbar-collapse collapse navbar-right',
					'menu_class'=>'nav navbar-nav',
					'fallback_cb'=>false, 
					'items_wrap' => '%3$s', 
					'container'=>false,
					'walker'=> new Bunch_Bootstrap_walker()  
				) ); ?>
	        </ul><!-- /.navigation -->
		</div><!-- /.main-menu -->
	</div><!-- /.hidden-bar-wrapper -->
</section><!-- /.hidden-bar -->
<?php endif;?>

<section class="header-v2-wrap stricky">

	<!-- #top-bar -->
	<section id="top-bar" class="anim-3-all anim-3">
		<div class="container">
			<div class="row">
				<?php if( $call_back_page = apartvilla_set( $options, 'header_v4_call_back_page' ) ): ?>
				<!-- .call-back -->
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 pull-left call-back">
					<a href="<?php echo esc_url(get_permalink( $call_back_page )); ?>"><i class="fa fa-phone"></i> <?php esc_html_e('Request Call Back', 'apartvilla');?></a>
				</div><!-- /.call-back -->
				<?php endif;?>
				<!-- .contact-info -->
				<div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 pull-right text-right">
					<ul class="contact-info">
						<?php if(apartvilla_set($options, 'header_v4_email')):?><li><a href="#"><i class="fa fa-envelope"></i> <?php echo apartvilla_set($options, 'header_v4_email');?></a></li><?php endif;?>
						<?php if(apartvilla_set($options, 'header_v4_phone')):?><li><a href="#"><i class="fa fa-phone"></i> <?php echo apartvilla_set($options, 'header_v4_phone');?></a></li><?php endif;?>
					</ul>
				</div><!-- /.contact-info -->
			</div>
		</div>
	</section><!-- /#top-bar -->

	<!-- .header-inner -->
	<header class="header-inner header-v2">
		<div class="container">
			<div class="row">
				<!-- .logo -->
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6  logo anim-5 anim-5-all">
					<?php if(apartvilla_set($options, 'header_v4_logo_image')):?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" src="<?php echo esc_url(apartvilla_set($options, 'header_v4_logo_image'));?>" alt="<?php esc_html_e('image', 'apartvilla');?>"></a>
					<?php else:?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" src="<?php echo esc_url(get_template_directory_uri().'/img/resources/header-inner-logo.png');?>" alt="<?php esc_html_e('image', 'apartvilla');?>"></a>
					<?php endif;?>
				</div><!-- /.logo -->
				<!-- .main-menu -->
				<nav class="col-lg-9 col-md-9 col-sm-8 col-xs-6  pull-right text-right main-menu">
					<!-- .navbar-collapse -->
		            <div class="navbar-collapse collapse clearfix onepage_menu">
		            	<!-- .navigation -->
			            <ul class="navigation scroll-menu clearfix">
			                <?php wp_nav_menu( array( 'theme_location' => 'onepage_menu', 'container_id' => 'navbar-collapse-1',
									'container_class'=>'navbar-collapse collapse navbar-right',
									'menu_class'=>'nav navbar-nav',
									'fallback_cb'=>false, 
									'items_wrap' => '%3$s', 
									'container'=>false,
									'walker'=> new Bunch_Bootstrap_walker()  
								) ); ?>
			            </ul><!-- /.navigation -->
		            </div><!-- /.navbar-collapse -->
		            <!-- .navbar-header -->
					<?php if(apartvilla_set($options, 'side_menu')):?>
		            <div class="navbar-header">
		                <!-- .navbar-toggle -->    	
		                <button type="button" class="navbar-toggle hidden-bar-opener">
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
		                </button><!-- /.navbar-toggle -->    	
		            </div><!-- /.navbar-header -->
					<?php endif;?>
				</nav><!-- /.main-menu -->
			</div>
		</div>
	</header><!-- /.header-inner -->

</section>



<div id="banner-style-two" class="anim-5-all" <?php if(apartvilla_set($options, 'header_v4_banner_bg_image')) echo ' style="background-image:url('.apartvilla_set($options, 'header_v4_banner_bg_image').')"';?>>
	<div class="container clearfix">
		<div class="col-md-6 col-sm-6 banner-content pull-left">
			<div class="banner-content-box">
				<?php if(apartvilla_set($options, 'header_v4_banner_heading')) echo '<h1>'.apartvilla_set($options, 'header_v4_banner_heading').'</h1>';?>
				<?php if(apartvilla_set($options, 'header_v4_banner_address')) echo '<p>'.apartvilla_set($options, 'header_v4_banner_address').'</p>';?>
				<?php if(apartvilla_set($options, 'header_v4_banner_price')):?><p class="amount"><?php esc_html_e('Price : ', 'apartvilla');?><span class="number"><?php echo apartvilla_set($options, 'header_v4_banner_price');?></span> </p><?php endif;?>
			</div>
			<?php if(apartvilla_set($options, 'header_v4_visit')):?>
				<a href="#" data-toggle="modal" data-target="#contact-agent-modal"><?php esc_html_e('Schedule Visit ', 'apartvilla');?><i class="fa fa-arrow-circle-right"></i></a>
			<?php endif;?>
		</div>
		<div class="make-appointment contact-content pull-right">
			<?php echo do_shortcode( apartvilla_set($options, 'header_v4_contactform7_shortcode') );?>
		</div>
	</div>
</div>