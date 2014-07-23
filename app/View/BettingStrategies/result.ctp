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
			foreach ($value as $hours => $result_per_hour)	{
				echo "
					<p>
						<ul>Pour $hours heures
							<li>{$result_per_hour['expected_win']}</li>
							<li>{$result_per_hour['standard_deviation']}</li>
						</ul>
					</p>";
			}
		} else	{
			echo "<p>$key : $value</p>";
		} 
	}
?>