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
<section class="blog-container <?php if($layout == 'left' || $layout == 'right') echo ' two-side-background'; if($blog_color2) echo ' dark-bg';?>">
	<div class="container">
		<div class="row">
			<?php if( $layout == 'left' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left ptb-80">       
            	<div class="sidebar-wrap gray left-side anim-5-all">
                	<?php dynamic_sidebar( $sidebar ); ?>
                </div>
            </div>
			<?php }?>
			<?php endif; ?>
			
			<div class="<?php echo esc_attr($classes);?> <?php if($layout == 'left') echo ' pull-right white-right right-side ptb-80'; elseif($layout == 'right') echo ' white-left ptb-80 left-content'; else echo ' ptb-80';?>">
				<!-- .single-blog-post -->
				<?php while( have_posts() ): the_post();?>
                	<!-- blog post item -->
                    <!-- Post -->
					<div id="post-<?php the_ID(); ?>" <?php post_class();?>>
                		<?php get_template_part( 'blog' ); ?>
                	<!-- blog post item -->
                    </div><!-- End Post -->
                <?php endwhile;?>

				<!-- .pagination -->
				<div class="pagination anim-5-all">
					<?php apartvilla_the_pagination(); ?>
				</div><!-- /.pagination -->

			</div>
			
			<?php if( $layout == 'right' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ptb-80">       
            	<div class="sidebar-wrap gray anim-5-all">
                	<?php dynamic_sidebar( $sidebar ); ?>
                </div>
            </div>
			<?php }?>

		    <?php endif; ?>
		</div>
	</div>
</section><!-- /.blog-container -->

<?php get_footer(); ?>