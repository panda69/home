<?php
	$this->Html->addCrumb('Outils', '/Tools');
	$this->Html->addCrumb('Simulation Arnold Snyder', '/Tools');
	$this->Html->addCrumb( sprintf("%d%%", $this->request->params['pass'][0]), sprintf('/Simulations/calc/%d', $this->request->params['pass'][0]));	
	
	if (!empty($error))	{
		echo $error;
		exit();
	}

	if (!empty($this->request->data) && array_key_exists('defaultValues', $this->request->data['Simulations']) === false)	{
		echo '<div class="boxSimResult">';

		echo "<table cols=\"2\" border>";
		echo "<caption>Résultats</caption>";
		foreach($results as $key => $value)	{
			if (is_array($value))	{
				foreach($value as $key2 => $value2)	{
					e("
<tr><td rowspan=\"2\">For $key2 Hour(s)</td><td>EV = {$value2['EV']} and SD = {$value2['SD']}</td></tr>
<tr><td>Rsl : {$value2['RSL']}</td></tr>
");
				}
			} else	
				echo "<tr><td>$key</td><td>$value</td></tr>";
		}
		echo "</table>";

		echo $this->Form->create('Simulations', array('url' => '/simulations/calc/' . $this->request->params['pass'][0]));
		echo $this->Form->hidden('defaultValues', array('value' => serialize($this->request->data['Simulations'])));
		echo $this->Form->end('Back to simulation');

		echo '</div>';
	} else	{
		echo $this->Form->create('Simulations', array('url' => '/simulations/calc/' . $this->request->params['pass'][0]));
	
		foreach($spread as $key => $tc)	{
			echo $this->Form->input($key,
				array(
					'type' => 'select',
					'label' => $tc,
					'options' => $units,
					'selected' => $defaultValues[$key]
				)
			);
		}

		echo $this->Form->end('Calculer');
	}
?>