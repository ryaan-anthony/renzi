<?php ob_start(); ?>

<div class="location-neighbouring-text">
	<!-- .section-title -->
	<div class="section-title">
		<span><?php echo balanceTags($subtitle);?></span>
		<h2><span><?php echo balanceTags($title);?></span></h2>
	</div><!-- /.section-title -->
	<div class="row">
		<div class="col-lg-6 col-md-7 col-sm-7">
			<!-- .essential-place -->
			<ul class="essential-place">
				<?php echo do_shortcode( $contents );?>
			</ul><!-- /.essential-place -->
		</div>
		<div class="col-lg-6 col-md-5 col-sm-5">
			<!-- .google-map -->
			<div class="google-map1" id="location-neighbouring-map"></div><!-- /.google-map -->
		</div>
	</div>
</div><!-- /.location-neighbouring-text -->
<script type="text/javascript">
        
	// Google Map Settings
	if(jQuery('#location-neighbouring-map').length){
		var map;
		 map = new GMaps({
			el: '#location-neighbouring-map',
			zoom: 12,
			scrollwheel:false,
			//Set Latitude and Longitude Here
			lat: <?php echo esc_js($lat);?>,
			lng: <?php echo esc_js($long);?>
		  });
		  
		  //Add map Marker
		  map.addMarker({
			lat: <?php echo esc_js($mark_lat);?>,
			lng: <?php echo esc_js($mark_long);?>,
			infoWindow: {
			  content: '<p><strong><?php echo esc_js($mark_title);?></strong><br><?php echo esc_js($mark_address);?></p>'
			}
		 
		});
	}

</script>

<?php return ob_get_clean(); ?>