<?php
	$this->Html->addCrumb('Simulations', '/Pages/display/simulations');
	
	echo '<ul>';
	echo '<li>';
	echo $this->Html->link('Statégie de base', array('controller' => 'BasicStrategy', 'action' => 'simulation'));
	echo '</li>';
	echo '<li>';
	echo $this->Html->link('Variation de mise', array('controller' => 'BettingStrategies', 'action' => 'index'));
	echo '</li>';
	echo '</ul>';
?>