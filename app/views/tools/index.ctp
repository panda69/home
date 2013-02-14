<?php
	$this->Html->addCrumb('Outils', '/Tools');

	e('<ul>');
	e('<li>');
	e($this->Html->link('Estimation pour la statégie de base', array('controller' => 'Tools', 'action' => 'EstimationStrategieBase')));
	e('</li>');
	e('<li><b>Simulation Monsieur G.</b></li>');
	e('<ul>');
	e('<li>');
	e($this->Html->link('Calcul espérance et écart-type', array('controller' => 'Tools', 'action' => 'Calc')));
	e('</li>');
	e('<li>');
	e($this->Html->link('Estimation', array('controller' => 'Tools', 'action' => 'Estimation')));
	e('</li>');
	e('</ul>');
	e('<li><b>Simulation Arnold Snyder</b></li>');
	e('<ul>');
	e('<li>');
	e($this->Html->link('50%', array('controller' => 'Simulations', 'action' => 'calc', '50')));
	e('</li>');
	e('<li>');
	e($this->Html->link('65%', array('controller' => 'Simulations', 'action' => 'calc', '65')));
	e('</li>');
	e('<li>');
	e($this->Html->link('75%', array('controller' => 'Simulations', 'action' => 'calc', '75')));
	e('</li>');
	e('<li>');
	e($this->Html->link('85%', array('controller' => 'Simulations', 'action' => 'calc', '85')));
	e('</li>');
	e('</ul>');
	e('</li>');
	e('</ul>');
?>