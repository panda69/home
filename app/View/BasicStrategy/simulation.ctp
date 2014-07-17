<?php
	$this->Html->addCrumb('Simulations', '/Pages/display/simulations');
	$this->Html->addCrumb('Stratégie de base', '/BasicStrategy/simulation');
	
	echo $this->Form->create("BasicStrategy");
	echo $this->Form->input('advantage', array('label' => 'Avantage (en %)', 'class' => 'xxsmall'));
	echo $this->Form->input('hours', array('label' => 'Nbr d\'heures', 'class' => 'xxsmall'));
	echo $this->Form->input('unit', array('label' => 'Unité', 'class' => 'xxsmall'));
	echo $this->Form->end('Calculer');
	
	if (!empty($this->request->data))	{
		echo '<div class="boxCalcResult">';
		echo "<p><b>Résultats</b></p>";
		echo "<p>$result</p>";
		echo "</div>";
	}
?>