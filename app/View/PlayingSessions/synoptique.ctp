<?php $this->Html->addCrumb('Synoptique', '/Seances/Synoptique'); ?>

<ul>
	<li><?php echo $this->Html->link('Courbes', array('controller' => 'seances', 'action' => 'Charts')); ?></li>
	<li><?php echo $this->Html->link('Carte', array('controller' => 'seances', 'action' => 'map')); ?></li>
</ul>