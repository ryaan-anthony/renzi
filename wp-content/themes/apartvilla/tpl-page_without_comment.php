<?php /* Template Name: Page Without Comments */
$options = _WSH()->option();
get_header('single');

$settings  = apartvilla_set(apartvilla_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);

$meta = _WSH()->get_meta('_bunch_layout_settings');
$meta1 = _WSH()->get_meta('_bunch_header_settings');
if(apartvilla_set($meta, 'page_blog_color')=='blog_color2' || apartvilla_set($_GET, 'blog_color') == 'blog_color2' ) $blog_color2 = 'blog_color2';
if(apartvilla_set($_GET, 'layout_style')) $layout = apartvilla_set($_GET, 'layout_style'); else
$layout = apartvilla_set( $meta, 'layout', 'full' );
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
<section class="blog-container <?php if($layout != 'full') echo ' two-side-background'; if($blog_color2) echo ' dark-bg';?>">
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

		    <div class="<?php echo esc_attr($classes);?> pull-right white-right right-side ptb-80">
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
			
			<?php endif; ?>
			
			<?php if( $layout == 'full' ): ?>
				<div class="<?php echo esc_attr($classes);?> ptb-80">
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
			<?php endif;?>
			
			<?php if( $layout == 'right' ): ?>
			
			<div class="<?php echo esc_attr($classes);?> white-left ptb-80 left-content">
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