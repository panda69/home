<?php 
	$this->Html->addCrumb('Synoptique', '/Seances/Synoptique'); 
	$this->Html->addCrumb('Courbes', '/Seances/Charts');
?>

<ul>
	<li><?php e($this->Html->link('Globale', array('controller' => 'seances', 'action' => 'chart', 1))); ?></li>
	<li><?php e($this->Html->link('Hi-Lo', array('controller' => 'seances', 'action' => 'chart', 2))); ?></li>
	<li><?php e($this->Html->link('Stratégie de base', array('controller' => 'seances', 'action' => 'chart', 3))); ?></li>
</ul>