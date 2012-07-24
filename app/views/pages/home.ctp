<h2>Espace du panda</h2>

<ul>
<li>
<?php e($this->Html->link('Gestion des cercles', array('controller' => 'Cercles', 'action' => 'index'))); ?>
</li>
<li>
<?php e($this->Html->link('Gestion des pays', array('controller' => 'Pays', 'action' => 'index'))); ?>
</li>
<li>
<?php e($this->Html->link('Gestion des séances', array('controller' => 'Seances', 'action' => 'index'))); ?>
</li>
<li>
<?php e($this->Html->link('Synoptique', array('controller' => 'Seances', 'action' => 'Synoptique'))); ?>
</li>
<li>
<?php e($this->Html->link('Outils', array('controller' => 'Tools', 'action' => 'index'))); ?>
</li>
<li>
<?php e($this->Html->link('IPs', array('controller' => 'StoreIps', 'action' => 'index'))); ?>
</li>
</ul>