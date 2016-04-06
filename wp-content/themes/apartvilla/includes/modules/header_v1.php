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

<!-- #banner -->
<section id="banner" class="banner-one">
	<div class="container">
		<div class="porperty-details">
			<div class="border">
				<!-- .logo -->
				<div class="logo">
					<?php if(apartvilla_set($options, 'header_v1_logo_image')):?>
		                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(apartvilla_set($options, 'header_v1_logo_image'));?>" alt="<?php esc_html_e('image', 'apartvilla');?>"></a>
					<?php else:?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/img/resources/logo.png');?>" alt="<?php esc_html_e('image', 'apartvilla');?>"></a>
					<?php endif;?>
				</div><!-- /.logo -->
				<?php if(apartvilla_set($options, 'header_v1_address')):?>
				<!-- .address -->
				<div class="address">
					<p><?php echo apartvilla_set($options, 'header_v1_address');?></p>
				</div><!-- /.address -->
				<?php endif;?>
				<?php if($villa_features = apartvilla_set($options, 'header_v1_villa_features')):
					$features = explode("\n",$villa_features);
				?>
				<!-- .options -->
				<div class="options">
					<ul>
						<?php foreach($features as $key => $value):?>
							<li><?php echo balanceTags($value);?></li>
						<?php endforeach;?>
					</ul>
				</div><!-- /.options -->
				<?php endif;?>
				<!-- .price -->
				<?php if(apartvilla_set($options, 'header_v1_villa_price')):?>
				<div class="price">
					<label class="number"><?php esc_html_e('Price: ', 'apartvilla');?></label>
					<b class="number price-number"><?php echo apartvilla_set($options, 'header_v1_villa_price');?></b>
				</div><!-- /.price -->
				<?php endif;?>
				<?php if(apartvilla_set($options, 'header_v1_visit')):?>
				<div class="text-center">
					<a href="#" data-toggle="modal" data-target=".contact-agent-modal" class="schedule-visit-btn-2"><?php esc_html_e('Schedule Visit ', 'apartvilla');?><i class="fa fa-arrow-circle-right"></i></a>
				</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</section><!-- /#banner -->

<section class="header-v2-wrap header-v3 stricky">

	<!-- .header-inner -->
	<header class="header-inner header-v2 header-v3">
		<div class="container">
			<div class="row">
				<!-- .logo -->
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6  logo anim-5 anim-5-all">
					
					<?php if(apartvilla_set($options, 'main_logo_image')):?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" src="<?php echo esc_url(apartvilla_set($options, 'main_logo_image'));?>" alt="<?php esc_html_e('image', 'apartvilla');?>"></a>
					<?php else:?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" src="<?php echo esc_url(get_template_directory_uri().'/img/resources/logo-2.png');?>" alt="<?php esc_html_e('image', 'apartvilla');?>"></a>
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