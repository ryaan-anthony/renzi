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
            <ul class="navigation clearfix">
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
				<?php if( $call_back_page = apartvilla_set( $options, 'header_v3_call_back_page' ) ): ?>
				<!-- .call-back -->
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 pull-left call-back">
					<a href="<?php echo esc_url(get_permalink( $call_back_page )); ?>"><i class="fa fa-phone"></i> <?php esc_html_e('Request Call Back', 'apartvilla');?></a>
				</div><!-- /.call-back -->
				<?php endif;?>
				<!-- .contact-info -->
				<div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 pull-right text-right">
					<ul class="contact-info">
						<?php if(apartvilla_set($options, 'header_v3_email')):?><li><a href="#"><i class="fa fa-envelope"></i> <?php echo apartvilla_set($options, 'header_v3_email');?></a></li><?php endif;?>
						<?php if(apartvilla_set($options, 'header_v3_phone')):?><li><a href="#"><i class="fa fa-phone"></i> <?php echo apartvilla_set($options, 'header_v3_phone');?></a></li><?php endif;?>
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
					<?php if(apartvilla_set($options, 'header_v3_logo_image')):?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" src="<?php echo esc_url(apartvilla_set($options, 'header_v3_logo_image'));?>" alt="<?php esc_html_e('image', 'apartvilla');?>"></a>
					<?php else:?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" src="<?php echo esc_url(get_template_directory_uri().'/img/resources/header-inner-logo.png');?>" alt="<?php esc_html_e('image', 'apartvilla');?>"></a>
					<?php endif;?>
				</div><!-- /.logo -->
				<!-- .main-menu -->
				<nav class="col-lg-9 col-md-9 col-sm-8 col-xs-6  pull-right text-right main-menu">
					<!-- .navbar-collapse -->
		            <div class="navbar-collapse collapse clearfix">
		            	<!-- .navigation -->
			            <ul class="navigation clearfix">
			                <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
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



<!-- #banner -->
<section id="banner" class="banner-two style-two">
	<div class="container">
		<div class="porperty-details">
			<div class="clearfix">
				<?php if(apartvilla_set($options, 'header_v3_address')):?>
				<!-- .address -->
				<div class="address">
					<p><?php echo apartvilla_set($options, 'header_v3_address');?></p>
				</div><!-- /.address -->
				<?php endif;?>
				<!-- .options -->
				<?php if($villa_features = apartvilla_set($options, 'header_v3_villa_features')):
					$features = explode("\n",$villa_features);
				?>
				<div class="options">
					<ul>
						<?php foreach($features as $key => $value):?>
							<li><?php echo balanceTags($value);?></li>
						<?php endforeach;?>
					</ul>
				</div><!-- /.options -->
				<?php endif;?>
				<!-- .price -->
				<?php if(apartvilla_set($options, 'header_v3_villa_price')):?>
				<div class="price">
					<label class="number"><?php esc_html_e('Price: ', 'apartvilla');?></label>
					<b class="number price-number"><?php echo apartvilla_set($options, 'header_v3_villa_price');?></b>
				</div><!-- /.price -->
				<?php endif;?>
				<?php if(apartvilla_set($options, 'header_v3_visit')):?>
						<a href="#"  data-toggle="modal" data-target="#contact-agent-modal" class="schedule-visit"><?php esc_html_e('shedule visit', 'apartvilla');?></a>
				<?php endif;?>
			</div>
		</div>
	</div>
</section><!-- /#banner -->