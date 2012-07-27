<?php $this->Html->addCrumb('Synoptique', '/Seances/Synoptique'); ?>

<ul>
	<li><?php e($this->Html->link('Courbes', array('controller' => 'seances', 'action' => 'Charts'))); ?></li>
	<li><?php e($this->Html->link('Carte', array('controller' => 'seances', 'action' => 'map'))); ?></li>
</ul>