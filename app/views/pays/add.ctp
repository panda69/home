<?php
	$this->Html->addCrumb('Pays', '/pays');
	$this->Html->addCrumb('Ajouter un pays', '/pays/add');
?>
<h2>Ajouter un nouveau pays</h2>
<?php
	e($this->Form->create('Pays'));
	e($this->Form->input('name', array('label' => 'Nom', 'class' => 'xlarge')));
	e($this->Form->input('code_iso', array('label' => 'Code ISO', 'class' => 'xsmall')));
	e($this->Form->end('Ajouter')); 
?>