    <!-- Data Tables -->
    <link href="<?php echo base_url().'assets/css/plugins/dataTables/dataTables.bootstrap.css';?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/plugins/dataTables/dataTables.responsive.css';?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/plugins/dataTables/dataTables.tableTools.min.css';?>" rel="stylesheet">
	
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
	<script>
		var map;
		var global_markers = [];    
		var markers = <?php echo $listMarker; ?>

		var infowindow = new google.maps.InfoWindow({});

		function initialize() {
			geocoder = new google.maps.Geocoder();
			var latlng = new google.maps.LatLng(-0.58, 113.380643);
			var myOptions = {
				zoom: 5,
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

				var contentString = "<html><body><div><p><h2>" + trailhead_name + "</h2></p></div></body></html>";

				var marker = new google.maps.Marker({
					position: myLatlng,
					map: map,
					title: "Coordinates: " + lat + " , " + lng + " | Trailhead name: " + trailhead_name
				});

				marker['infowindow'] = contentString;

				global_markers[i] = marker;

				google.maps.event.addListener(global_markers[i], 'click', function() {
					infowindow.setContent(this['infowindow']);
					infowindow.open(map, this);
				});
			}
		}

		window.onload = initialize;
	</script>