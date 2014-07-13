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
		echo "<p>$key : $value</p>"; 
	}
?>