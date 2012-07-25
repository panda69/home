<?php
	$this->Html->addCrumb('Outils', '/Tools');

	e('<p>');
	e($this->Html->link('Calcul espérance et écart-type', array('controller' => 'Tools', 'action' => 'Calc')));
	e('</p>');
	e('<p>');
	e($this->Html->link('Estimation', array('controller' => 'Tools', 'action' => 'Estimation')));
	e('</p>');
	e('<p>');
	e($this->Html->link('Estimation pour la statégie de base', array('controller' => 'Tools', 'action' => 'EstimationStrategieBase')));
	e('</p>');
?>