<?php bunch_global_variable(); 
$options = _WSH()->option();
get_header('single');
$style2 = '';
$view = '';
$blog_color2 = ''; 

$settings  = _WSH()->option();
if(apartvilla_set($settings, 'search_blog_color')=='blog_color2' || apartvilla_set($_GET, 'blog_color') == 'blog_color2' ) $blog_color2 = 'blog_color2';

if(apartvilla_set($_GET, 'layout_style')) $layout = apartvilla_set($_GET, 'layout_style'); else
$layout = apartvilla_set( $settings, 'search_page_layout', 'right' );

if( !$layout || $layout == 'full' || apartvilla_set($_GET, 'layout_style')=='full' || $style2) $sidebar = ''; else
$sidebar = apartvilla_set( $settings, 'search_page_sidebar', 'blog-sidebar' );
_WSH()->page_settings = array('layout'=>$layout, 'view'=> $view, 'sidebar'=>$sidebar);
$classes = ( !$layout || $layout == 'full' || apartvilla_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-8 col-md-8 col-sm-12 col-xs-12 ' ;

if($style2) $classes = '';  

$bg = apartvilla_set($settings, 'search_page_header_img');
$title = apartvilla_set($settings, 'search_page_header_title');
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
				<?php if(have_posts()):?>
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
				
				<?php else : ?>
					<div class="<?php echo esc_attr($classes);?> search_post_area">
						<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'apartvilla' ); ?></p>
						<aside>
						<?php get_search_form(); ?>
						</aside>
					</div>
		    	<?php endif; ?>

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