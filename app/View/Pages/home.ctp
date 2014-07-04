<h2>Espace du panda</h2>

<ul>
<li>
<?php echo $this->Html->link('Casinos', array('controller' => 'Casinos', 'action' => 'index')); ?>
</li>
<li>
<?php echo $this->Html->link('Pays', array('controller' => 'Countries', 'action' => 'index')); ?>
</li>
<li>
<?php echo $this->Html->link('Séances', array('controller' => 'PlayingSessions', 'action' => 'index')); ?>
</li>
<li>
<?php echo $this->Html->link('Simulations', array('controller' => 'Tools', 'action' => 'index')); ?>
</li>
</ul>