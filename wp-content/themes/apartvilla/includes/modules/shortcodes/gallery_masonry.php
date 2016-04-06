<?php 
wp_enqueue_script('jquery-mixitup');
bunch_global_variable();
$args = array('post_type' => 'bunch_gallery', 'showposts'=>$num, 'orderby'=>$sort, 'order'=>$order,'suppress_filters' => 'false');
$terms_array = explode(",",$exclude_cats);
if($exclude_cats) $args['tax_query'] = array(array('taxonomy' => 'gallery_category','field' => 'id','terms' => $terms_array,'operator' => 'NOT IN',));

$query = new WP_Query($args);
$data_filtration = '';
$data_posts = '';
?>


<?php if( $query->have_posts() ):
	
ob_start();?>

	<?php $count = 1; 
	$fliteration = array();?>
	<?php while( $query->have_posts() ): $query->the_post();
		global $post;
		$meta1 = _WSH()->get_meta();
		$post_terms = get_the_terms( get_the_id(), 'gallery_category');
		foreach( (array)$post_terms as $pos_term ) $fliteration[$pos_term->term_id] = $pos_term;
		$temp_category = get_the_term_list(get_the_id(), 'gallery_category', '', ', ');
	?>
		<?php $post_terms = wp_get_post_terms( get_the_id(), 'gallery_category'); 
		$term_slug = '';
		if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';?>		
           
		   <?php 
			$post_thumbnail_id = get_post_thumbnail_id($post->ID);
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
		   ?>     
		   
		   <!-- .single-gallery -->
			<div class="single-gallery anim-5-all masonryImage mix <?php echo esc_attr($term_slug); if(apartvilla_set($meta1, 'extra_width') == 'extra_width') echo 'span8'; else echo 'span4'?> ">
				<div class="img-holder">
					<?php if(apartvilla_set($meta1, 'extra_width') == 'extra_width') 
							$image_size = 'apartvilla_four'; 
						  elseif(apartvilla_set($meta1, 'extra_height') == 'extra_height')
						  	$image_size = 'apartvilla_eleven'; 
						  else
						  	$image_size = 'apartvilla_ten'; 
						  
						  the_post_thumbnail($image_size, array('class' => 'img-responsive'));
					?>
					<div class="content">
						<div class="image-view">
							<a class="fancybox" href="<?php echo esc_url($post_thumbnail_url);?>">
								<i class="fa fa-camera"></i>
							</a>
						</div>
						<div class="title-holder"><h4><?php the_title();?></h4></div>
						<div class="link-view">
							<a href="#"><i class="fa fa-link"></i></a>
						</div>
					</div>
				</div>
				<div class="modal-content">
					<div class="item-name"><?php echo apartvilla_set($meta1, 'gal_subtitle');?></div>
					<?php the_post_thumbnail('apartvilla_five', array('class' => 'item-image img-responsive'));?>
					<div class="item-text">
						<p><?php echo apartvilla_trim(get_the_content(), $text_limit);?></p>
						<?php if($features = apartvilla_set($meta1, 'gal_features')):
								$gal_features = explode("\n", $features);?>
							<ul>
								<?php foreach($gal_features as $key => $value):?>
									<li><i class="fa fa-long-arrow-right"></i> <?php echo balanceTags($value);?></li>
								<?php endforeach;?>
							</ul>
						<?php endif;?>
					</div>

				</div>
			</div><!-- /.single-gallery -->

<?php endwhile;?>
  
<?php wp_reset_postdata();
$data_posts = ob_get_contents();
ob_end_clean();

endif; 

ob_start();?>	 

<?php $terms = get_terms(array('gallery_category')); ?>
<!-- .section-title-wrap -->
<section class="section-title-wrap">
	<div class="container">
		<div class="col-lg-12">
			<!-- .section-title -->
			<div class="section-title text-center">
				<span><?php echo balanceTags($title);?></span>
				<h2><span><?php echo balanceTags($sub_title);?></span></h2>
				<p><?php echo balanceTags($text);?></p>
			</div><!-- /.section-title -->
		</div>
	</div>
</section><!-- /.section-title-wrap -->


<!-- #gallery -->
<section id="gallery" class="gallery-page-one">
	<div class="container">
		<?php if( $terms ): ?>
		<!-- .gallery-filter -->
		<ul class="gallery-filter anim-5-all text-center">
			<li data-filter="all" class="active gallery-sorter">
				<span><?php esc_html_e('All images', 'apartvilla');?></span>
			</li>
			<?php foreach( $fliteration as $t ): ?>
            <li data-filter=".<?php echo apartvilla_set( $t, 'slug' ); ?>" class="gallery-sorter">
				<span><?php echo apartvilla_set( $t, 'name'); ?></span>
			</li>
			<?php endforeach;?>
		</ul><!-- /.gallery-filter -->
		<?php endif;?>
		<div class="row">
			<!-- .image-gallery -->
			<div class="image-gallery" data-filter-class="gallery-sorter">
				<?php echo balanceTags($data_posts); ?>
			</div><!-- /.image-gallery -->
		</div>
	</div>
</section><!-- /#gallery -->



<!-- gallery Modal -->
<div class="modal fade" id="single-gallery-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelTwo">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center" id="myModalLabelTwo"><?php esc_html_e('Details of ', 'apartvilla');?><span class="item-name"><?php esc_html_e('drawing room', 'apartvilla');?></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="img-holder item-image">
							<img src="<?php echo esc_url(get_template_directory_uri());?>/img/gallery/1.jpg" alt="<?php esc_html_e('image', 'apartvilla');?>">
						</div>
					</div>
					<div class="col-md-6 item-text">
						<!-- content loading via jQuery -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /gallery Modal -->

<?php $output = ob_get_contents();
ob_end_clean(); 
return $output;?>