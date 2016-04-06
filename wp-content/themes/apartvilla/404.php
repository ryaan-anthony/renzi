<?php
$options = _WSH()->option();

get_header('single');
$style2 = '';
$view = '';
$blog_color2 = ''; 
 
?>
<!-- #page-title -->
<section id="page-title">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2><?php esc_html_e('404 Page', 'apartvilla');?></h2>
			</div>
		</div>
	</div>
</section><!-- /#page-title -->

<!--  Your Blog Content Start From Here -->
<section id="blog_area" class="blog_area not_found">
    <!-- container -->
    <div class="container">
        <div class="row">
            <!-- blog post area -->
            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 blog_post_area">
            	<div class="message-welcome text-center">
                    <h1><?php esc_html_e('Not Found ', 'apartvilla');?></h1>
                    <p class="lead"><?php esc_html_e('Look like something went wrong! The page you were looking for is not here. ', 'apartvilla');?></p>
                    <a href="<?php echo esc_url(home_url('/'));?>" title="" class="btn btn-primary btn-lg"><?php esc_html_e('BACK TOP HOME', 'apartvilla');?></a>
                </div><!-- end message -->
			</div>
            <!-- blog post area -->
		
        </div>
    </div>
    <!-- container -->
</section>
<!--  Your Blog Content End Here -->  		

<!--  Your Blog Content End Here -->  		
<?php get_footer(); ?>