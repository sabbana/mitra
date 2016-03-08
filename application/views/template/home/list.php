<div class="section">
	<div class="content">
		<div class="container">
			<div class="row">
				<h2 class="heading">Mitra Komunitas</h2>
				<div id="map"></div>
				<script>
				  var map;
				  function initMap() {
					map = new google.maps.Map(document.getElementById('map'), {
					  center: {lat: -34.397, lng: 150.644},
					  zoom: 8
					});
				  }
				</script>
				<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $this->config->item('google_api_key');?>&callback=initMap"
				async defer></script>
			</div>
		</div>
	</div>
</div>