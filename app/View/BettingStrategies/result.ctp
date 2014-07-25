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

	foreach ($result as $key => $value)	{
		if (is_array($value))	{		
			echo "<p>";	
			foreach ($value as $hours => $result_per_hour)	{
				echo "
						<ul>Pour $hours heures
							<li>Expected Win : {$result_per_hour['expected_win']}</li>
							<li>Standard deviation : {$result_per_hour['standard_deviation']}</li>
						</ul>
					";
			}
			echo "</p>";
		} else	{
			echo "<p>$key : $value</p>";
		} 
	}
?>