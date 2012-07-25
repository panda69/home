<?php
	$this->Html->addCrumb('Synoptique', '/Seances/Synoptique');	
	$this->Html->addCrumb('Carte', '/Seances/Map');

	e($googleMapV3->map($mapOptions)); 
	foreach($markers as $marker)	{
		e($googleMapV3->addMarker($marker));
	}
?>