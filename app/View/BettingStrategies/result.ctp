<?php 
	$decks_number = $result['decks_number'];
	$deck_penetration = $result['deck_penetration'];
	unset($result['decks_number']);
	unset($result['deck_penetration']);

	$this->Html->addCrumb('Simulations', '/Pages/display/simulations');
	$this->Html->addCrumb('Variation de mise', '/BettingStrategies/index');
	$this->Html->addCrumb(
		sprintf('Simulation (%d jeux et %d%% de pénétration)', $decks_number, $deck_penetration),
		sprintf('/BettingStrategies/simulation/%d/%d', $decks_number, $deck_penetration)
	);
	
	echo '<table id="sim_result">';
	foreach ($result as $key => $value)	{
		if (is_array($value))	{		
			echo "<tr><td><br/><br/></td><tr>";
			$bFirstValue = true;	
			foreach ($value as $hours => $result_per_hour)	{
				if ($bFirstValue)	{
					$bFirstValue = false;
				} else {
					echo "<tr><td><br/></td><tr>";
				}
				
				echo '<tr>';
				echo '<td>' . sprintf('Units/%d Hrs', $hours) . '</td>';
				echo '<td>' . sprintf('%.2f u', $result_per_hour['Expected Win']) . '</td>'; 
				echo '</tr>';
				
				echo '<tr>';
				echo '<td>' . sprintf('S.D./%d Hrs', $hours) . '</td>';
				echo '<td>' . sprintf('%.2f u', $result_per_hour['Standard Deviation']) . '</td>';
				echo '</tr>';

				echo '<tr>';
				echo '<td>' . sprintf('Min Max/%d Hrs', $hours) . '</td>';
				echo '<td>' . sprintf('%d u', $result_per_hour['Min Max']['min']) . ' => ' . sprintf('%d u', $result_per_hour['Min Max']['max']) . '</td>';
				echo '</tr>';
			}
		} else	{
			echo "
				<tr>
					<td>$key</td>
					<td>$value</td>
				</tr>
			";
		} 
	}
	echo "</table>";
	
	echo $this->Form->create('BettingStrategieBack');
	echo $this->Form->hidden('defaultValues', array('value' => serialize($this->request->data['BettingStrategie'])));
	echo $this->Form->end('Retour à la simulation');
?>