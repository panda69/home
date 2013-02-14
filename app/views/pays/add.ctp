<?php
	$this->Html->addCrumb('Pays', '/pays');
	$this->Html->addCrumb('Ajouter un pays', '/pays/add');
?>
<h2>Ajouter un nouveau pays</h2>
<?php
	echo $this->Form->create('Pays');
	echo $this->Form->input('name', array('label' => 'Nom', 'class' => 'xlarge'));
	echo $this->Form->input('code_iso', array(
		'label' => 'Code ISO', 
		'type' => 'select', 
		'options' => $this->FlagCountry->flagCountries()
	));

	e($this->Form->end('Ajouter')); 
?>