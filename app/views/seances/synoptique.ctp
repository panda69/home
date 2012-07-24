<?php
	e($googleMapV3->map($mapOptions)); 
	foreach($markers as $marker)	{
		e($googleMapV3->addMarker($marker));
	}
?>