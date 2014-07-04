<?php 
	$this->Html->addCrumb('Séances', '/PlayingSessions/index'); 
	$this->Html->addCrumb('Courbes', '/PlayingSessions/charts');
?>

<ul>
	<li><?php echo $this->Html->link('Globale', array('controller' => 'PlayingSessions', 'action' => 'chart', 1)); ?></li>
	<li><?php echo $this->Html->link('Hi-Lo', array('controller' => 'PlayingSessions', 'action' => 'chart', 2)); ?></li>
	<li><?php echo $this->Html->link('Stratégie de base', array('controller' => 'PlayingSessions', 'action' => 'chart', 3)); ?></li>
</ul>