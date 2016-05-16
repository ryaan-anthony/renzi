<?php
$options = _WSH()->option();
get_header('single');
$style2 = '';
$view = '';
$blog_color2 = '';


$settings  = apartvilla_set(apartvilla_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);

$meta = _WSH()->get_meta('_bunch_layout_settings');
$meta1 = _WSH()->get_meta('_bunch_header_settings');
if(apartvilla_set($meta, 'page_blog_color')=='blog_color2' || apartvilla_set($_GET, 'blog_color') == 'blog_color2' ) $blog_color2 = 'blog_color2';
if(apartvilla_set($_GET, 'layout_style')) $layout = apartvilla_set($_GET, 'layout_style'); else
$layout = apartvilla_set( $meta, 'layout', 'full' );
$layout = (apartvilla_set( $meta, 'layout')) ? apartvilla_set( $meta, 'layout') : 'full';
$sidebar = apartvilla_set( $meta, 'sidebar', 'blog-sidebar' );

$classes = ( !$layout || $layout == 'full' || apartvilla_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-8 col-md-8 col-sm-12 col-xs-12 ' ;

$bg = apartvilla_set($meta1, 'page_bg');
$title = apartvilla_set($meta1, 'page_title');
?>
<!-- #page-title -->
<section id="page-title" <?php if($bg):?>style="background-image: url('<?php echo esc_attr($bg)?>');"<?php endif;?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2><?php if($title) echo balanceTags($title); else wp_title('');?></h2>
			</div>
		</div>
	</div>
</section><!-- /#page-title -->
<!-- .blog-container -->
<section class="blog-container <?php if($layout == 'left' || $layout == 'right') echo ' two-side-background'; if($blog_color2 == 'blog_color2') echo ' dark-bg';?>">
	<div class="container">

			<div class="<?php echo esc_attr($classes);?>">
				<!-- .single-blog-post -->
				<?php while( have_posts() ): the_post();?>
        	<div class="page-content">
						<?php the_content();?>
					</div>
        <?php endwhile;?>

				<!-- .pagination -->
				<div class="pagination anim-5-all">
					<?php apartvilla_the_pagination(); ?>
				</div><!-- /.pagination -->

			</div>

	</div>
</section><!-- /.blog-container -->

<?php get_footer(); ?>
