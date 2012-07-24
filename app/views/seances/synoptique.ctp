<?php
	e('<p>');
	e($this->Html->link('Courbe', array('controller' => 'Seances', 'action' => 'Chart')));
	e('</p>');
	e('<p>');
	e($this->Html->link('Carte', array('controller' => 'Seances', 'action' => 'Map')));
	e('</p>');
?>