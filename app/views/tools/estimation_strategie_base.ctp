<?php
	$this->Html->addCrumb('Outils', '/Tools');
	$this->Html->addCrumb('Estimation pour la statégie de base', '/Tools/EstimationStrategieBase');	

	e($this->Form->create("Tools", array('action' => 'EstimationStrategieBase')));
	e($this->Form->input('advantage', array('label' => 'Avantage (en %)', 'class' => 'xlarge')));
	e($this->Form->input('hours', array('label' => 'Nbr d\'heures', 'class' => 'large')));
	e($this->Form->input('unit', array('label' => 'Unité', 'class' => 'large')));
	e($this->Form->end('Calculer'));
	
	if (!is_null($this->data['Tools']))	{
		e('<div class="boxCalcResult">');
		e("<p><b>Résultats</b></p>");
		e("<p>$result</p>");
		e("</div>");
	}
?>