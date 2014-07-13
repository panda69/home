<?php

App::uses('Component', 'Controller');

class FrequencyDistributionComponent extends Component {
	public $deck_penetration;
	public $decks_number;
	public $base_adv;
	
	private function get_tc_from_adv($adv)	{
		// adv = 0.5 x tc + base_adv
		$tc = round(2.0 * ($adv - $this->base_adv));
		
		return $tc;
	}
	
	public function setParams(array $params)	{
		$this->deck_penetration = $params['deck_penetration'];
		$this->decks_number = $params['decks_number'];
		$this->base_adv = $params['base_adv'];
	}
	
	public function getRows()	{
		$frequency_distributions_file_name = sprintf('frequency_distributions_%d_deck_game.php', $this->decks_number);
		require 'FrequencyDistributions' . DIRECTORY_SEPARATOR . $frequency_distributions_file_name;
		
		$result = array();
		foreach ($frequency_distributions[$this->deck_penetration] as $adv => $hands)	{
			$adv = floatval($adv);
			$tc = intval($this->get_tc_from_adv($adv));
			$result[] = array('hands' => $hands, 'tc' => $tc, 'adv' => $adv);
		}		
		
		return $result;
	}	
}

?>