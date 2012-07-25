<?php
	$this->Html->addCrumb('Outils', '/Tools');
	$this->Html->addCrumb('Estimation', '/Tools/Estimation');	

	e($this->Form->create("Tools", array('action' => 'Estimation')));
	e($this->Form->input('ev', array('label' => 'Espérance', 'class' => 'xlarge')));
	e($this->Form->input('sd', array('label' => 'Ecart-type', 'class' => 'xlarge')));
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