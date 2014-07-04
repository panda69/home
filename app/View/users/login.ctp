<?php
	echo $this->Form->create(array('action'=>'login'));
	echo $this->Form->inputs(array(
		'legend' => 'Se connecter',
		'username' => array('label' => 'Utilisateur'),
		'password' => array('label' => 'Mot de passe')
		)
	);
	echo $this->Form->end('Se connecter');
?>