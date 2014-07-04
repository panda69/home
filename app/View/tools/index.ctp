<?php
	$this->Html->addCrumb('Outils', '/Tools');

	echo '<ul>';
	echo '<li>';
	echo $this->Html->link('Estimation pour la statégie de base', array('controller' => 'Tools', 'action' => 'EstimationStrategieBase'));
	echo '</li>';
	echo '<li><b>Simulation Monsieur G.</b></li>';
	echo '<ul>';
	echo '<li>';
	echo $this->Html->link('Calcul espérance et écart-type', array('controller' => 'Tools', 'action' => 'Calc'));
	echo '</li>';
	echo '<li>';
	echo $this->Html->link('Estimation', array('controller' => 'Tools', 'action' => 'Estimation'));
	echo '</li>';
	echo '</ul>';
	echo '<li><b>Simulation Arnold Snyder</b></li>';
	echo '<ul>';
	echo '<li>';
	echo $this->Html->link('50%&nbsp;(3 decks)', array('controller' => 'Simulations', 'action' => 'calc', '50'), array('escape' => false));
	echo '</li>';
	echo '<li>';
	echo $this->Html->link('65%&nbsp;(4 decks)', array('controller' => 'Simulations', 'action' => 'calc', '65'), array('escape' => false));
	echo '</li>';
	echo '<li>';
	echo $this->Html->link('75%&nbsp;(4&frac12; decks)', array('controller' => 'Simulations', 'action' => 'calc', '75'), array('escape' => false));
	echo '</li>';
	echo '<li>';
	echo $this->Html->link('85%&nbsp;(5 decks)', array('controller' => 'Simulations', 'action' => 'calc', '85'), array('escape' => false));
	echo '</li>';
	echo '</ul>';
	echo '</li>';
	echo '</ul>';
?>