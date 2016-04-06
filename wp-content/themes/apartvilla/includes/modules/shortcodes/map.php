<?php   
ob_start();
?>
<!-- #home-footer-google-map-wrap -->
<section id="home-footer-google-map-wrap">
	<div class="google-map" id="home-footer-google-map" data-map-lat="<?php echo esc_attr($lat);?>" data-map-lng="<?php echo esc_attr($long);?>"  data-map-zoom="12" data-map-overlay-clr="rgba(0,0,0, 0.4)" data-info-window="true"></div>
	
	<?php if($address):?>
	<div class="info-window" data-map-name="home-footer-google-map">
		<!-- .house-location -->
		<div class="house-location">
			<p><?php echo balanceTags($address);?></p>
		</div><!-- /.house-location -->
	</div>
	<?php endif;?>
	
</section><!-- /#home-footer-google-map-wrap -->
<script type="text/javascript">
// 5. gMap
function gMap () {
	if ($('.google-map').length) {
        $('.google-map').each(function () {
        	// getting options from html 
        	var mapName = $(this).attr('id');
        	var mapLat = $(this).data('map-lat');
        	var mapLng = $(this).data('map-lng');
        	var iconPath = $(this).data('icon-path');
        	var mapZoom = $(this).data('map-zoom');
        	var mapTitle = $(this).data('map-title');
        	var mapOverlayClr = $(this).data('map-overlay-clr');
        	var mapInfWndw = $(this).data('info-window');

        	// if zoom not defined the zoom value will be 15;
        	if (!mapZoom) {
        		var mapZoom = 15;
        	};
        	// init map
        	var map;
            map = new GMaps({
                div: '#'+mapName,
                scrollwheel: false,
                lat: mapLat,
                lng: mapLng,
                zoom: mapZoom
            });
            // if icon path setted then show marker
            if(iconPath) {
        		map.addMarker({
	            	icon: iconPath,
	                lat: mapLat,
	                lng: mapLng,
	                title: mapTitle
	            });
        	}
        	// if overlay enabled 
        	if (mapOverlayClr) {
        		var getTile = function(coord, zoom, ownerDocument) {
					var div = ownerDocument.createElement('div');
					div.innerHTML = coord;
					div.style.width = this.tileSize.width + 'px';
					div.style.height = this.tileSize.height + 'px';
					div.style.background = mapOverlayClr;
					return div;
				};
				map.addOverlayMapType ({
			        index: 0,
			        tileSize: new google.maps.Size(256, 256),
			        getTile: getTile
				});

        	};
        	// if info window true 
        	if (mapInfWndw) {        		
        		var mapInfWndwHtml =  $('.info-window[data-map-name='+mapName+']').html();
        		map.drawOverlay({
        			lat: mapLat,
	                lng: mapLng,
	                content: mapInfWndwHtml,
	                verticalAlign: 'middle',
  					horizontalAlign: 'center'
        		})
        	};
        });  
	};
}
// instance of fuction while Document ready event	
jQuery(document).on('ready', function () {
	(function ($) {
		gMap();
	})(jQuery);
});

</script>


<?php return ob_get_clean();?>		