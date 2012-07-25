<?php
	$this->Html->addCrumb('Pays', '/pays');
	$this->Html->addCrumb('Editer un pays');

	e($this->Form->create('Pays'));
	e($this->Form->hidden('id'));
	e($this->Form->input('name', array('label' => 'Nom', 'class' => 'xlarge')));
	e($this->Form->input('code_iso', array('label' => 'Code ISO', 'class' => 'xsmall')));
	e($this->Form->end('Sauvegarder'));
?>