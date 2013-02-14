<?php
	$this->Html->addCrumb('Outils', '/Tools');
	$this->Html->addCrumb('Simulation Arnold Snyder', '/Tools');
	$this->Html->addCrumb( sprintf("%d%%", $this->params['pass'][0]), sprintf('/Simulations/calc/%d', $this->params['pass'][0]));	
	
	if (!empty($error))	{
		echo $error;
		exit();
	}

	if (!empty($this->data) && array_key_exists('defaultValues', $this->data['Simulations']) === false)	{
		e('<div class="boxSimResult">');

		e("<table cols=\"2\" border>");
		e("<caption>Résultats</caption>");
		foreach($results as $key => $value)	{
			if (is_array($value))	{
				foreach($value as $key2 => $value2)	{
					e("
<tr><td rowspan=\"2\">For $key2 Hour(s)</td><td>EV = {$value2['EV']} and SD = {$value2['SD']}</td></tr>
<tr><td>Rsl : {$value2['RSL']}</td></tr>
");
				}
			} else	
				e("<tr><td>$key</td><td>$value</td></tr>");
		}
		e("</table>");

		echo $this->Form->create('Simulations', array('url' => '/simulations/calc/' . $this->params['pass'][0]));
		echo $form->hidden('defaultValues', array('value' => serialize($this->data['Simulations'])));
		echo $this->Form->end('Back to simulation');

		e('</div>');
	} else	{
		echo $this->Form->create('Simulations', array('url' => '/simulations/calc/' . $this->params['pass'][0]));
	
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