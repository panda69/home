<?php
	$this->Html->addCrumb('Outils', '/Tools');
	$this->Html->addCrumb('Simulation Monsieur G.', '/Tools');
	$this->Html->addCrumb('Calcul espérance et écart-type', '/Tools/Calc');	

	echo $this->Form->create("Tools", array('action' => 'Calc'));
	foreach($spread as $key => $value)	{
		e($this->Form->input($key, 
			array(
				'options'	=> $units,
				'div'		=> false,
				'selected'	=> !is_null($this->request->data['Tools']) ? $this->request->data['Tools'][$key] : $value 
			)
		));
	}
	echo $this->Form->end('Calculer');
	
	if (!is_null($this->request->data['Tools']))	{
		echo '<div class="boxCalcResult">';
		echo "<p><b>Résultats</b></p>";
		echo "<p>Espérance : $ev</p>";
		echo "<p>Ecart-type : $sd</p>";
		echo "</div>";
	}
?>