<?php 
wp_enqueue_script('jquery-mixitup');
bunch_global_variable();
$count = 0;
$args = array('post_type' => 'bunch_gallery', 'showposts'=>$num, 'orderby'=>$sort, 'order'=>$order);
 if( $cat ) $args['gallery_category'] = $cat;
$query = new WP_Query($args);
$data_list = array();
$data_post = array();
$gal_features = '';
?>
<?php if( $query->have_posts() ):
while( $query->have_posts() ): $query->the_post();
	global $post;
	$meta1 = _WSH()->get_meta();
	$features = explode("\n", apartvilla_set($meta1, 'gal_features'));
	foreach($features as $key => $value){
		$gal_features .= '<li><i class="fa fa-long-arrow-right"></i> '.$value.'</li>';
	}
	if($count == 0) $show_on_load = 'gal_'.get_the_id();
	$data_list[get_the_id()] = '<li data-filter=".gal_'.get_the_id().'" class="room-filter"><span>'.get_the_title(get_the_id()).'</span></li>';
	$data_post[get_the_id()] = '<div class="single-room-dimention mix gal_'.get_the_id().'">
									<div class="col-lg-7 col-md-12 img-wrap">
										<div class="img-holder">
											'.get_the_post_thumbnail(get_the_id(),'apartvilla_seven').'
											<div class="room-size">
												'.apartvilla_set($meta1, 'gal_dimensions').'
											</div>
										</div>
									</div>
									<div class="col-lg-5 col-md-12 content room_dimension">
										<h2>'.apartvilla_set($meta1, 'gal_subtitle').'</h2>
										<p>'.get_the_excerpt().'</p>
										<ul>
											'.$gal_features.'
										</ul>
									</div>
								</div>';
$gal_features= '';
$count++; 
endwhile;
?>
<?php 
endif;
wp_reset_postdata();
ob_start();?>	 

<?php $terms = get_terms(array('gallery_category')); ?>
<!-- #room-dimention -->
<section id="room-dimention">
	<div class="container">
		<!-- .section-title -->
		<div class="section-title text-center">
			<span><?php echo balanceTags($title);?></span>
			<h2><span><?php echo balanceTags($subtitle);?></span></h2>
			<p><?php echo balanceTags($text);?></p>
		</div><!-- /.section-title -->
		<!-- .gallery-filter -->
		<ul class="gallery-filter text-center">
			<?php echo implode("\n",(array)$data_list);?>
		</ul><!-- /.gallery-filter -->
		<div class="row image-gallery" data-filter-class="room-filter" data-show-on-load="<?php echo esc_attr($show_on_load);?>">
			<?php echo implode("\n",(array)$data_post);?>
		</div>
	</div>
</section><!-- /#room-dimention -->
<?php $output = ob_get_contents();
ob_end_clean(); 
return $output;?>