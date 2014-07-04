<?php
	$this->Html->addCrumb('Séances', '/PlayingSessions');	
	$this->Html->addCrumb('Ajouter une séance');

	echo $this->Form->create('PlayingSession');
	echo $this->Form->input('unit', array('label' => 'Unité', 'class'=>'small'));
	echo $this->Form->input('sb', array('label' => 'Stratégie de base', 'type' => 'checkbox'));
	echo $this->Form->input('result', array('label' => 'Résultat', 'class'=>'medium'));
	
	echo $this->Form->input('session_date', array(
		'label' => 'Date',
		'dateFormat' => 'DMY',
		'monthNames' => $mois
	));
	 
	echo $this->Form->input('casino_id', array('label' => 'Casino'));
	echo $this->Form->end('Ajouter');
?>
