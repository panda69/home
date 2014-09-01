<?php
	echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=false');
	
	$this->Html->addCrumb('Casinos', '/Casinos/index');
	$this->Html->addCrumb('Geocoder');	
?>

<script type="text/javascript">

	var map, geocoder, marker, infowindow;

	function showAddress(address) {
		if (geocoder) {
	    	geocoder.getLatLng(
	    		address,
	        	function(point) {
	          		if (!point) {
	            		alert(address + " not found");
	          		} else {
	            		address += '<br/>Latitude: ' + point.lat();
	            		address += '<br/>Longitude: ' + point.lng();              
	            		map.setCenter(point, 15);
	            		var marker = new GMarker(point);
	            		map.addOverlay(marker);
	            		marker.openInfoWindowHtml(address);
	          		}
	        	}
	      );
	    }
	  }

	function getCoordinates(address) {
  		// Check to see if we already have a geocoded object. If not we create one
  		if(!geocoder) {
  			geocoder = new google.maps.Geocoder();
  		}
  	
  		// Creating a GeocoderRequest object
  		var geocoderRequest = {
  			address: address
  		}
  	
  		// Making the Geocode request
  		geocoder.geocode(geocoderRequest, function(results, status) {
  			// Check if status is OK before proceeding
  			if (status == google.maps.GeocoderStatus.OK) {
  				// Center the map on the returned location
  				map.setCenter(results[0].geometry.location);
  				// Check to see if we've already got a Marker object
  				if (!marker) {
  					// Creating a new marker and adding it to the map
  					marker = new google.maps.Marker({
  						map: map
  					});
  				}
  			
  				// Setting the position of the marker to the returned location
  				marker.setPosition(results[0].geometry.location);
  			
  				// Check to see if we've already got an InfoWindow object
  				if (!infowindow) {
  					// Creating a new InfoWindow
  					infowindow = new google.maps.InfoWindow();
  				}
  			
  				// Creating the content of the InfoWindow to the address
  				// and the returned position
  				var content = '<strong>' + results[0].formatted_address + '</strong><br />';
  				content += 'Lat: ' + results[0].geometry.location.lat() + '<br />';
  				content += 'Lng: ' + results[0].geometry.location.lng();
  			
  				// Adding the content to the InfoWindow
  				infowindow.setContent(content);
  			
  				// Opening the InfoWindow
  				infowindow.open(map, marker);
  			}
  		});
  	}

(function() {
	
	window.onload = function() {
		// Creating a MapOptions object with the required properties
		var options = {
			zoom: 7,
		    center: new google.maps.LatLng(45.759723, 4.842223),
		    mapTypeId: google.maps.MapTypeId.ROADMAP,
		    mapTypeControl: true
		};
		    
		// Creating the map  
		map = new google.maps.Map(document.getElementById('map_canvas'), options);				
	};
	
})();
	
</script>

<?php 
	echo $this->Form->create(NULL, array('action'=>"", 'onsubmit'=>"getCoordinates(this.CasinoAddress.value); return false"));
	echo $this->Form->input('address', array(
		'label' => 'Entrez votre adresse :',
		'size' => 100,
		'div' => false,
		'default' => '19 allée de Fontenay, Lyon, France'
	));
	echo $this->Form->end( array(
		'label'	=> 'Coordonnées',
		'div'	=> false
	));

	echo '<p/><div id="map_canvas" style="width: 90%; height: 700px"></div>';
?>
