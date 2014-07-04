<?php
	$this->Html->addCrumb('Outils', '/Tools');
	$this->Html->addCrumb('Simulation Monsieur G.', '/Tools');
	$this->Html->addCrumb('Estimation', '/Tools/Estimation');	

	echo $this->Form->create("Tools", array('action' => 'Estimation'));
	echo $this->Form->input('ev', array('label' => 'Espérance', 'class' => 'xlarge'));
	echo $this->Form->input('sd', array('label' => 'Ecart-type', 'class' => 'xlarge'));
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