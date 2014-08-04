<?php

$this->Html->addCrumb('Simulations', '/Pages/display/simulations');
$this->Html->addCrumb('Variation de mise', '/BettingStrategies/index');
$this->Html->addCrumb(
	sprintf('Simulation (%d jeux et %d%% de pénétration)', $decks_number, $deck_penetration), 
	sprintf('/BettingStrategies/simulation/%d/%d', $decks_number, $deck_penetration)
);

echo $this->Form->create('BettingStrategie');

echo $this->Form->hidden('DecksNumber', array('value' => $decks_number));
echo $this->Form->hidden('DeckPenetration', array('value' => $deck_penetration));

echo $this->Form->input('BaseAdv', array('type' => 'text', 'label' => 'Avantage de base', 'class' => 'medium', 'default' => $base_adv));

echo '<label>Variation de mise</label>';
echo '<table class="betspread">';

echo '<tr>';
echo '<th>TC</th>';
echo '<th>Unités</th>';
echo '</tr>';

foreach ($range as $value)	{
	echo '<tr>';
	echo '<td>';
	echo $value['label'];
	echo '</td>';
	echo '<td>';
	echo $this->Form->input($value['name'], array('type' => 'text', 'label' => false, 'div' => false, 'class' => 'small', 'default' => $value['default']));
	echo '</td>';
	echo '</tr>';
}

echo '</table>';

echo $this->Form->end('Calculer');

?>