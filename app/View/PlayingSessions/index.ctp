<?php
	$this->Html->addCrumb('Séances', '/PlayingSessions');
?>
<h2>Séances</h2>
<ul>
<li>
<?php echo $this->Html->link('Liste', array('controller' => 'PlayingSessions', 'action' => 'listing')); ?>
</li>
<li>
<?php echo $this->Html->link('Courbes', array('controller' => 'PlayingSessions', 'action' => 'charts')); ?>
</li>
<li>
<?php echo $this->Html->link('Carte', array('controller' => 'PlayingSessions', 'action' => 'map')); ?>
</li>
</ul>