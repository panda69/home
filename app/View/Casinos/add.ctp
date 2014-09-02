<?php
	$this->Html->addCrumb('Casinos', '/casinos');
	$this->Html->addCrumb('Ajouter un casino', '/casinos/add');
?>
<h2>Ajouter un casino</h2>
<?php
	echo $this->Html->link('Geocoder',
		array('controller' => 'Casinos','action' => 'geocoder'),
		array('class' => 'button', 'target' => '_blank')
	);

	echo $this->Form->create('Casino');
	echo $this->Form->input('name', array('label' => 'Nom', 'class' => 'xlarge'));
	echo $this->Form->input('address', array('label' => 'Adresse', 'class' => 'xxlarge'));
	echo $this->Form->input('zipcode', array('label' => 'Code postal', 'class' => 'medium'));
	echo $this->Form->input('town', array('label' => 'Ville', 'class' => 'xxlarge'));
	echo $this->Form->input('country_id', array('label' => 'Pays'));
	echo $this->Form->input('lat', array('label' => 'Latitude', 'class' => 'large'));
	echo $this->Form->input('lng', array('label' => 'Longitude', 'class' => 'large'));
	echo $this->Form->end('Ajouter'); 
?>