<?php
	$this->Html->addCrumb('Séances', '/PlayingSessions');	
	$this->Html->addCrumb('Courbes', '/PlayingSessions/Charts');

	echo $this->Html->image(
		$this->Html->url(array(
			'controller' => 'PlayingSessions',
    		'action' => 'StrokeChart',
			$type_chart
		), true)
	);
?>