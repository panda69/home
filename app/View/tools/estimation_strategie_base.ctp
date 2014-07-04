<?php
	$this->Html->addCrumb('Outils', '/Tools');
	$this->Html->addCrumb('Estimation pour la statégie de base', '/Tools/EstimationStrategieBase');	

	echo $this->Form->create("Tools", array('action' => 'EstimationStrategieBase'));
	echo $this->Form->input('advantage', array('label' => 'Avantage (en %)', 'class' => 'xlarge'));
	echo $this->Form->input('hours', array('label' => 'Nbr d\'heures', 'class' => 'large'));
	echo $this->Form->input('unit', array('label' => 'Unité', 'class' => 'large'));
	echo $this->Form->end('Calculer');
	
	if (!is_null($this->request->data['Tools']))	{
		echo '<div class="boxCalcResult">';
		echo "<p><b>Résultats</b></p>";
		echo "<p>$result</p>";
		echo "</div>";
	}
?>