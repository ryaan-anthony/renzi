<?php bunch_global_variable();  
$options = _WSH()->option();
get_header();

$settings  = _WSH()->option();
if(apartvilla_set($_GET, 'layout_style')) $layout = apartvilla_set($_GET, 'layout_style'); else
$layout = apartvilla_set( $settings, 'archive_page_layout', 'right' );
if( !$layout || $layout == 'full' || apartvilla_set($_GET, 'layout_style')=='full' ) $sidebar = ''; else
$sidebar = apartvilla_set( $settings, 'archive_page_sidebar', 'blog-sidebar' );
_WSH()->page_settings = array('layout'=>$layout, 'view'=> $view, 'sidebar'=>$sidebar);
$classes = ( !$layout || $layout == 'full' || apartvilla_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-8 col-md-8 col-sm-7 col-xs-12 ' ;
if($layout == 'both') $classes = ' col-lg-6 col-md-6 col-sm-6 col-xs-12 ';  
$title = apartvilla_set($options, 'archive_title');
$bg = apartvilla_set($options, 'archive_bg');
?>

<!-- Page Banner -->
<section class="page-banner" <?php if($bg):?>style="background-image:url('<?php echo esc_url($bg);?>');"<?php endif;?>>
	<div class="auto-container">
		<h1><?php if($title) echo balanceTags($title); else wp_title('');?></h1>
	</div>
</section>
<!-- Blog -->
<section id="blog" class="blog-area section sponsors">
<div class="auto-container">
	<div class="row">
	<!-- sidebar area -->
			<?php if( $layout == 'left' ): ?>
			
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
            <div class="side-bar col-lg-4 col-md-4 col-sm-5 col-xs-12">        
            	<div class="sidebar">
                	<?php dynamic_sidebar( $sidebar ); ?>
                </div>
            </div>
			<?php } ?>

		    <?php endif; ?>
		<!-- Blog Left Side Begins -->
		<!-- sidebar area -->
			<?php if( $layout == 'both' ): ?>
			
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
            <div class="side-bar col-lg-3 col-md-3 col-sm-5 col-xs-12">        
            	<div class="sidebar">
                	<?php dynamic_sidebar( $sidebar ); ?>
                </div>
            </div>
			<?php } ?>

		    <?php endif; ?>
		<div class="<?php echo esc_attr($classes);?>">
		<br />
		<br />
			
			<?php while( have_posts() ): the_post();?>
                	<!-- blog post item -->
                    <!-- Post -->
					<div id="post-<?php the_ID(); ?>" <?php post_class();?>>
                		<?php get_template_part( 'blog-sponsor' ); ?>
                	<!-- blog post item -->
                    </div><!-- End Post -->
            <?php endwhile;?> 

			<!-- Pagination -->
			<div class="post-nav wow fadeInRight" data-animation="fadeInUp" data-animation-delay="300">
					
					<?php apartvilla_the_pagination(); ?>
			
			</div>	<!-- Pagination Ends-->
		
		</div><!-- Blog Left Side Ends -->
		
		
		<!-- sidebar area -->
			<?php if( $layout == 'both' ): ?>
			
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
            <div class="side-bar col-lg-3 col-md-3 col-sm-5 col-xs-12">        
            	<div class="sidebar">
                	<?php dynamic_sidebar( $sidebar ); ?>
                </div>
            </div>
			<?php } ?>

		    <?php endif; ?>
			
			<!-- sidebar area -->
			<?php if( $layout == 'right' ): ?>
			
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
            <div class="side-bar col-lg-4 col-md-4 col-sm-5 col-xs-12">       
            	<div class="sidebar">
                	<?php dynamic_sidebar( $sidebar ); ?>
                </div>
            </div>
			<?php }?>

		    <?php endif; ?>
		    <!-- sidebar area -->
		
	</div>

</div>
</section>
<!-- Our Blog Section Ends -->

<?php get_footer(); ?>