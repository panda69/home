<h2>Ajouter un nouveau cercle</h2>
<?php
	e($this->Form->create('Cercle'));
	e($this->Form->input('name', array('label' => 'Nom', 'class' => 'xlarge')));
	e($this->Form->input('address', array('label' => 'Adresse', 'class' => 'xxlarge')));
	e($this->Form->input('zipcode', array('label' => 'Code postal', 'class' => 'small')));
	e($this->Form->input('town', array('label' => 'Ville', 'class' => 'xxlarge')));
	e($this->Form->input('pays_id', array('label' => 'Pays')));
	e($this->Form->input('lat', array('label' => 'Latitude', 'class' => 'large')));
	e($this->Form->input('lng', array('label' => 'Longitude', 'class' => 'large')));
	e($this->Form->end('Ajouter')); 
?>