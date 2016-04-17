<?php bunch_global_variable();
$options = _WSH()->option();

get_header('single');
$style2 = '';
$view = '';
$blog_color2 = '';


$meta = _WSH()->get_term_meta( '_bunch_category_settings' );
_WSH()->page_settings = $meta;
if(apartvilla_set($meta, 'cat_blog_color')=='blog_color2' || apartvilla_set($_GET, 'blog_color') == 'blog_color2' ) $blog_color2 = 'blog_color2';
if(apartvilla_set($_GET, 'layout_style')) $layout = apartvilla_set($_GET, 'layout_style'); else
$layout = apartvilla_set( $meta, 'layout', 'right' );

if( !$layout || $layout == 'full' || apartvilla_set($_GET, 'layout_style')=='full' || $style2) $sidebar = ''; else
$sidebar = apartvilla_set( $meta, 'sidebar', 'blog-sidebar' );

$classes = ( !$layout || $layout == 'full' || apartvilla_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-8 col-md-8 col-sm-12 col-xs-12 ' ;

$bg = apartvilla_set($meta, 'cat_bg');
$title = apartvilla_set($meta, 'cat_title');
?>
<!-- .blog-container -->
<section class="blog-container <?php if($layout == 'left' || $layout == 'right') echo ' two-side-background'; if($blog_color2) echo ' dark-bg';?>">
	<div class="container">
		<div class="page-title">
            <h2><?php if($title) echo balanceTags($title); else wp_title('');?></h2>
		</div>
		<div class="page-content">
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
	</div>
</section><!-- /.blog-container -->

<?php get_footer(); ?>
