<?php
	print $javascript->link('http://maps.google.com/maps/api/js?sensor=false', false) . "\n";
	print $javascript->link('util') . "\n";
	print $javascript->link('markerclusterer') . "\n";

	$this->Html->addCrumb('Synoptique', '/Seances/Synoptique');	
	$this->Html->addCrumb('Carte');
?>

<div id="map" style="width:100%; height:800px"></div>

<script type="text/javascript">
(function() {
	var map, infoWindow;
	
	window.onload = function() {
		// Creating a MapOptions object with the required properties
		var options = {
			zoom: 7,
		    center: new google.maps.LatLng(45.759723, 4.842223),
		    mapTypeId: google.maps.MapTypeId.ROADMAP,
		    mapTypeControl: true
		};
		    
		// Creating the map  
		map = new google.maps.Map(document.getElementById('map'), options);		
		
		var markers = [];
				
		var dataurl = "<?php echo $this->Html->url( array('controller'=>'seances','action'=>'location_sessions')); ?>";
		
	    downloadUrl(dataurl, function(data) {
	        var xmlmarkers = data.documentElement.getElementsByTagName("marker");
	        
	        for (var i = 0; i < xmlmarkers.length; i++) {
	        	var latlng = new google.maps.LatLng(
		        	parseFloat(xmlmarkers[i].getAttribute("lat")),
		        	parseFloat(xmlmarkers[i].getAttribute("lng"))
		        );
		        			        	
		        var marker = new google.maps.Marker({
		        	position: latlng,
		        	map: map,
		        	title: xmlmarkers[i].getAttribute("name"),
		        	icon: '<?php echo $this->webroot . IMAGES_URL . 'cg_icon.png'; ?>'
		        });
		        
		        markers.push(marker);
		        
		        var html = xmlmarkers[i].getAttribute("windowText");
		        
		    	// Adding a click event to the marker
		    	(function(_html, _marker) {
		    		google.maps.event.addListener(_marker, 'click', function() {
		    			// Check to see if an InfoWindow already exists
		    			if (!infoWindow) {
		    				infoWindow = new google.maps.InfoWindow();
		    			}
		    			
		    			// Setting the content of the InfoWindow
		    			infoWindow.setContent(_html);
		    			
		    			// Opening the InfoWindow
		    			infoWindow.open(map, _marker);
		    		});
		    	})(html, marker);      		    	
	        }     
	        
	    	// Création des clusters
	    	markerclusterer = new MarkerClusterer(map, markers, {averageCenter: true, maxZoom: 16});
	    	markerclusterer.fitMapToMarkers();
	    });		
	    	    
	};
})();
	
</script>
