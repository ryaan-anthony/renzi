<?php bunch_global_variable();
$options = _WSH()->option();
get_header('single');
$style2 = '';
$view = '';
$blog_color2 = '';

if( $wp_query->is_posts_page ) {
	$meta = _WSH()->get_meta('_bunch_layout_settings', get_queried_object()->ID);
	$meta1 = _WSH()->get_meta('_bunch_header_settings', get_queried_object()->ID);
	if(apartvilla_set($meta, 'page_blog_color')=='blog_color2' || apartvilla_set($_GET, 'blog_color') == 'blog_color2' ) $blog_color2 = 'blog_color2';
	if(apartvilla_set($_GET, 'layout_style')) $layout = apartvilla_set($_GET, 'layout_style'); else
	$layout = apartvilla_set( $meta, 'layout', 'right' );
	if( !$layout || $layout == 'full' || apartvilla_set($_GET, 'layout_style')=='full' || $style2) $sidebar = ''; else
	$sidebar = apartvilla_set( $meta, 'sidebar', 'default-sidebar' );
	$bg = apartvilla_set($meta1, 'page_bg');
	$title = apartvilla_set($meta1, 'page_title');
} else {

	$settings  = _WSH()->option();
	if(apartvilla_set($settings, 'archive_blog_style')=='blog_style2' || apartvilla_set($_GET, 'blog_style') == 'blog_style2' ) $style2 = 'blog_style2';
	if(apartvilla_set($settings, 'archive_blog_color')=='blog_color2' || apartvilla_set($_GET, 'blog_color') == 'blog_color2' ) $blog_color2 = 'blog_color2';

	if(apartvilla_set($_GET, 'layout_style')) $layout = apartvilla_set($_GET, 'layout_style'); else
	$layout = apartvilla_set( $settings, 'archive_page_layout', 'right' );
	if( !$layout || $layout == 'full' || apartvilla_set($_GET, 'layout_style')=='full' || $style2) $sidebar = ''; else
	$sidebar = apartvilla_set( $settings, 'archive_page_sidebar', 'default-sidebar' );
	$bg = apartvilla_set($settings, 'archive_page_header_img');
	$title = apartvilla_set($settings, 'archive_page_header_title');
}

$classes = ( !$layout || $layout == 'full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12' : ' col-lg-8 col-md-8 col-sm-7 col-xs-12 ';
if($style2) $classes = '';
?>
<!-- #page-title -->
<section id="page-title" <?php if($bg):?>style="background-image: url('<?php echo esc_attr($bg)?>');"<?php endif;?>>

</section><!-- /#page-title -->
<?php if($style2):?>
<!-- .blog-container.blog-2-col -->
<section id="blogs" class="blog-container blog-2-col">
	<div class="container">
		<?php while( have_posts() ): the_post();?>
			<div id="post-<?php the_ID(); ?>" <?php post_class();?>>
    		<?php get_template_part( 'blog' ); ?>
      </div><!-- End Post -->
		<?php endwhile;?>
		<div class="clearfix"></div>
		<!-- .pagination -->
		<div class="pagination text-center clearfix anim-5-all">
			<?php apartvilla_the_pagination(); ?>
		</div><!-- /.pagination -->

	</div>
</section><!-- /.blog-container.blog-2-col -->

<?php else:?>
<!-- .blog-container -->
<section class="blog-container">
	<div class="container">
				<?php while( have_posts() ): the_post();?>
          <!-- Post -->
					<div id="post-<?php the_ID(); ?>" <?php post_class();?>>
        		<?php get_template_part( 'blog' ); ?>
          </div><!-- End Post -->
        <?php endwhile;?>
			<!-- .pagination -->
			<div class="pagination anim-5-all">
				<?php apartvilla_the_pagination(); ?>
			</div><!-- /.pagination -->

	</div>
</section><!-- /.blog-container -->

<?php endif;?>

<?php get_footer(); ?>
