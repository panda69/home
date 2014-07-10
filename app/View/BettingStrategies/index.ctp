<?php
 
echo $this->Form->create('BettingStrategie');

echo $this->Form->input('base_adv', array('type' => 'text', 'label' => 'Avantage de base', 'class' => 'xxsmall'));

echo '<label>Variation de mise</label>';
echo '<table>';

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
	echo $this->Form->input($value['name'], array('type' => 'text', 'label' => false, 'div' => false, 'class' => 'small'));
	echo '</td>';
	echo '</tr>';
}

echo '</table>';

echo $this->Form->end('Calculer');

?>