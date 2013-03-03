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
	e($this->Html->link( html_entity_decode('50%&nbsp;(3 decks)'), array('controller' => 'Simulations', 'action' => 'calc', '50')));
	e('</li>');
	e('<li>');
	e($this->Html->link( html_entity_decode('65%&nbsp;(4 decks)'), array('controller' => 'Simulations', 'action' => 'calc', '65')));
	e('</li>');
	e('<li>');
	e($this->Html->link( html_entity_decode('75%&nbsp;(4&frac12; decks)'), array('controller' => 'Simulations', 'action' => 'calc', '75')));
	e('</li>');
	e('<li>');
	e($this->Html->link( html_entity_decode('85%&nbsp;(5 decks)'), array('controller' => 'Simulations', 'action' => 'calc', '85')));
	e('</li>');
	e('</ul>');
	e('</li>');
	e('</ul>');
?>