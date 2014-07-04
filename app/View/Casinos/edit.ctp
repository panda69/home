<?php
	$this->Html->addCrumb('Casinos', '/casinos');
	$this->Html->addCrumb('Editer un casino');

	echo $this->Form->create('Casino');
	echo $this->Form->hidden('id');
	echo $this->Form->input('name', array('label' => 'Nom', 'class' => 'xxlarge'));
	echo $this->Form->input('address', array('label' => 'Adresse', 'class' => 'xxlarge'));
	echo $this->Form->input('zipcode', array('label' => 'Code postal', 'class' => 'xmedium'));
	echo $this->Form->input('town', array('label' => 'Ville', 'class' => 'xxlarge'));
	echo $this->Form->input('country_id', array('label' => 'Pays'));
	echo $this->Form->input('lat', array('label' => 'Latitude', 'class' => 'large'));
	echo $this->Form->input('lng', array('label' => 'Longitude', 'class' => 'large'));
	echo $this->Form->end('Sauvegarder');
?>