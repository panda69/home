<?php
	$this->Html->addCrumb('Pays', '/Countries');
	$this->Html->addCrumb('Editer un pays');

	echo $this->Form->create('Country');
	echo $this->Form->hidden('id');
	echo $this->Form->input('name', array('label' => 'Nom', 'class' => 'xlarge'));
	echo $this->Form->input('code_iso', array(
		'label' => 'Code ISO', 
		'type' => 'select', 
		'options' => $this->FlagCountry->flagCountries()
	));

	echo $this->Form->end('Sauvegarder');
?>