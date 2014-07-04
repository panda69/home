<?php
	$this->Html->addCrumb('Pays', '/Countries');
	$this->Html->addCrumb('Ajouter un pays', '/Countries/Add');
?>
<h2>Ajouter un nouveau pays</h2>
<?php
	echo $this->Form->create('Country');
	echo $this->Form->input('name', array('label' => 'Nom', 'class' => 'xlarge'));
	echo $this->Form->input('code_iso', array(
		'label' => 'Code ISO', 
		'type' => 'select', 
		'options' => $this->FlagCountry->flagCountries()
	));

	echo $this->Form->end('Ajouter'); 
?>