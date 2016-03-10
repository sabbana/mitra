	<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
	<script>
		var map;
		var global_markers = [];    
		var markers = <?php echo $listMarker; ?>

		var infowindow = new google.maps.InfoWindow({});

		function initialize() {
			geocoder = new google.maps.Geocoder();
			var latlng = new google.maps.LatLng(-7.7559607,110.3785723);
			var myOptions = {
				zoom: 10,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			addMarker();
		}

		function addMarker() {
			for (var i = 0; i < markers.length; i++) {
				// obtain the attribues of each marker
				var lat = parseFloat(markers[i][0]);
				var lng = parseFloat(markers[i][1]);
				var trailhead_name = markers[i][2];

				var myLatlng = new google.maps.LatLng(lat, lng);

				if(i < 1){
					var marker = new google.maps.Marker({
						position: myLatlng,
						icon:"<?php echo base_url().'img/marker.png';?>",
						map: map,
					});
				}else{
					var marker = new google.maps.Marker({
						position: myLatlng,
						map: map,
					});
				}

				marker['infowindow'] = markers[i][2];

				global_markers[i] = marker;

				google.maps.event.addListener(global_markers[i], 'click', function() {
					infowindow.setContent(this['infowindow']);
					infowindow.open(map, this);
				});
			}
		}

		window.onload = initialize;
	</script>