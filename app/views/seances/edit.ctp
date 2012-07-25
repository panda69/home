<?php
	$this->Html->addCrumb('Séances', '/seances');
	$this->Html->addCrumb('Editer une séance');

	e($this->Form->create('Seance'));
	e($this->Form->hidden('id'));
	e($this->Form->input('unit', array('label' => 'Unité', 'class'=>'small')));
	e($this->Form->input('sb', array('label' => 'Stratégie de base', 'type' => 'checkbox')));
	e($this->Form->input('result', array('label' => 'Résultat', 'class'=>'medium')));
	e($this->DatePicker->picker('session_date', array('label' => 'Date'))); 
	e($this->Form->input('cercle_id', array('label' => 'Cercle')));
	e($this->Form->end('Sauvegarder'));
?>
