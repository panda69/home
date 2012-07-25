<?php	
	$this->Html->addCrumb('Synoptique', '/Seances/Synoptique');

	e('<p>');
	e($this->Html->link('Courbe', array('controller' => 'seances', 'action' => 'chart')));
	e('</p>');
	e('<p>');
	e($this->Html->link('Carte', array('controller' => 'seances', 'action' => 'map')));
	e('</p>');
?>