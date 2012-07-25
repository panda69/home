<?php
	$this->Html->addCrumb('IPs', '/StoreIps');
	$this->Html->addCrumb('Enregistrer une IP', '/StoreIps/Add');

	e($this->Form->create('StoreIp'));
	e($this->Form->input('place', array('label' => 'Lieu', 'class'=>'large')));
	e($this->Form->end('Enregistrer'));
?>