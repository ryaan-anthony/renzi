<?php $options = _WSH()->option();
get_header('single');
$style2 = '';
$view = '';
$blog_color2 = ''; 
 
$settings  = apartvilla_set(apartvilla_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
$meta = _WSH()->get_meta('_bunch_layout_settings');
$meta1 = _WSH()->get_meta('_bunch_header_settings');
$meta2 = _WSH()->get_meta();
_WSH()->page_settings = $meta;

if(apartvilla_set($meta, 'page_blog_color')=='blog_color2' || apartvilla_set($_GET, 'blog_color') == 'blog_color2' ) $blog_color2 = 'blog_color2';
if(apartvilla_set($_GET, 'layout_style')) $layout = apartvilla_set($_GET, 'layout_style'); else
$layout = apartvilla_set( $meta, 'layout', 'full' );
$layout = (apartvilla_set( $meta, 'layout')) ? apartvilla_set( $meta, 'layout') : 'full';
if( !$layout || $layout == 'full' || apartvilla_set($_GET, 'layout_style')=='full' ) $sidebar = ''; else
$sidebar = apartvilla_set( $meta, 'sidebar', 'blog-sidebar' );
$classes = ( !$layout || $layout == 'full' || apartvilla_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-8 col-md-8 col-sm-12 col-xs-12 ' ;
/** Update the post views counter */

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
<section class="blog-container single-blog-page <?php if($layout == 'left' || $layout == 'right') echo ' two-side-background'; if($blog_color2 == 'blog_color2') echo ' dark-bg';?>">
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
                	<!-- .single-blog-post -->
					<div class="single-blog-post single-page-content anim-5-all">
						<!-- .img-holder -->
						<div class="img-holder">
							
							<?php the_post_thumbnail('apartvilla_three', array('class' => 'img-responsive'));?>
													
						</div><!-- /.img-holder -->
						<div class="post-meta">
							<div class="date-holder">
								<b><?php echo get_the_date('d');?></b> <?php echo get_the_date('M');?>
							</div>
							<div class="title-holder">
								<h2 class="title"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h2>
								<ul>
									<li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php esc_html_e('By ', 'apartvilla');?><?php the_author();?></a></li>
									<li><?php the_category();?></li>
									<li><a href="<?php echo esc_url(get_permalink(get_the_id()));?>#comments"><?php comments_number( 'Comment: 0', 'Comment: 1', 'Comments: %' ); ?></a></li>
								</ul>
							</div>
						</div>
						<div class="content">
							<?php the_content();?>
							<span class="tags"><?php the_tags();?></span>
						</div>
						
						<!-- .author-box -->
						<div class="author-box">
							<!-- .top-author-info -->
							<div class="top-author-info dt">
								<!-- .img-holder -->
								<div class="img-holder dtc">
									<?php echo get_avatar(get_the_author_meta( 'ID' ), 120 ); ?>
								</div><!-- /.img-holder -->
								<div class="top-author-info-content dtc">
									<h4><?php the_author_meta('user_firstname')?> <?php the_author_meta('user_lastname'); ?></h4>
									<p><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?></p>
								</div>
							</div><!-- /.top-author-info -->
							<div class="bottom-author-info clearfix">
	
								<div class="submitted-post">
									<span><?php esc_html_e('Total ', 'apartvilla'); echo count_user_posts( get_the_author_meta('ID') ); esc_html_e(' Posts', 'apartvilla');?></span>
								</div>
								<div class="social-icons">
									<ul>
										<?php if($value = get_the_author_meta('facebook') ): ?>
											<li><a href="<?php echo esc_url($value); ?>"><i class="fa fa-facebook"></i></a></li>
										<?php endif; ?>
										<?php if($value = get_the_author_meta('twitter') ): ?>
											<li><a href="<?php echo esc_url($value); ?>"><i class="fa fa-twitter"></i></a></li>
										<?php endif; ?>
										<?php if($value = get_the_author_meta('dribble') ): ?>
											<li><a href="<?php echo esc_url($value); ?>"><i class="fa fa-dribble"></i></a></li>
										<?php endif; ?>
										<?php if($value = get_the_author_meta('flicker') ): ?>
											<li><a href="<?php echo esc_url($value); ?>"><i class="fa fa-flicker"></i></a></li>
										<?php endif; ?>
										<?php if($value = get_the_author_meta('google-pluse') ): ?>
											<li><a href="<?php echo esc_url($value); ?>"><i class="fa fa-google-pluse"></i></a></li>
										<?php endif; ?>
									</ul>
								</div>
							</div>
						</div><!-- /.author-box -->
						
						<!-- .comment-form -->
							<?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'apartvilla'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
							<?php comments_template(); ?><!-- end comments -->
						<!-- /.comment-form -->
	
					</div><!-- /.single-blog-post -->
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