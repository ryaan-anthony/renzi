<?php ob_start(); ?>

<!-- #location-neighbouring -->
<section id="location-neighbouring" class="style-two">
	<div class="container">
		<!-- .section-title -->
		<div class="section-title text-center">
			<span><?php echo balanceTags($subtitle);?></span>
			<h2><span><?php echo balanceTags($title);?></span></h2>
			<p><?php echo balanceTags($text);?></p>
		</div><!-- /.section-title -->
		<div class="row">
			<?php echo do_shortcode( $contents );?>
		</div>
	</div>
</section><!-- /#location-neighbouring -->

<?php return ob_get_clean(); ?>