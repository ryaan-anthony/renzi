<?php /* Template Name: VC Page */
get_header() ;

$meta = _WSH()->get_meta('_bunch_header_settings');

$title = apartvilla_set($meta, 'page_title');
$bg = apartvilla_set($meta, 'page_bg');

?>
<?php if(apartvilla_set($meta, 'breadcrumb')):?>

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

<?php endif;?>

<?php while( have_posts() ): the_post(); ?>
     <?php the_content(); ?>
<?php endwhile;  ?>

<?php get_footer() ; ?>