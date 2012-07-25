<?php
	e('<p>');
	e($this->Html->link('Courbe', array('controller' => 'seances', 'action' => 'chart')));
	e('</p>');
	e('<p>');
	e($this->Html->link('Carte', array('controller' => 'seances', 'action' => 'map')));
	e('</p>');
?>