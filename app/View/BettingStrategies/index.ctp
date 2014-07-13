<?php 
	$this->Html->addCrumb('Simulations', '/Pages/display/simulations');
	$this->Html->addCrumb('Variation de mise', '/BettingStrategies/index');

	echo '<ul>';
		echo '<li><b>Simulation pour 6 jeux</b></li>';
			echo '<ul>';
				echo '<li>';
				echo $this->Html->link('50%&nbsp;(3 decks)', array('controller' => 'BettingStrategies', 'action' => 'simulation', 6, 50), array('escape' => false));
				echo '</li>';
				echo '<li>';
				echo $this->Html->link('65%&nbsp;(4 decks)', array('controller' => 'BettingStrategies', 'action' => 'simulation', 6, 65), array('escape' => false));
				echo '</li>';
				echo '<li>';
				echo $this->Html->link('75%&nbsp;(4&frac12; decks)', array('controller' => 'BettingStrategies', 'action' => 'simulation', 6, 75), array('escape' => false));
				echo '</li>';
				echo '<li>';
				echo $this->Html->link('85%&nbsp;(5 decks)', array('controller' => 'BettingStrategies', 'action' => 'simulation', 6, 85), array('escape' => false));
				echo '</li>';
			echo '</ul>';
	echo '</li>';
	echo '<li><b>Simulation pour 8 jeux</b></li>';
		echo '<ul>';
			echo '<li>';
			echo $this->Html->link('50%&nbsp;(3 decks)', array('controller' => 'BettingStrategies', 'action' => 'simulation', 8, 50), array('escape' => false));
			echo '</li>';
			echo '<li>';
			echo $this->Html->link('65%&nbsp;(4 decks)', array('controller' => 'BettingStrategies', 'action' => 'simulation', 8, 65), array('escape' => false));
			echo '</li>';
			echo '<li>';
			echo $this->Html->link('75%&nbsp;(4&frac12; decks)', array('controller' => 'BettingStrategies', 'action' => 'simulation', 8, 75), array('escape' => false));
			echo '</li>';
			echo '<li>';
			echo $this->Html->link('85%&nbsp;(5 decks)', array('controller' => 'BettingStrategies', 'action' => 'simulation', 8, 85), array('escape' => false));
			echo '</li>';
		echo '</ul>';
	echo '</ul>';
?>
