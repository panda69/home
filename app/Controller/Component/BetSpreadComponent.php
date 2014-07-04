<?php

App::uses('Component', 'Controller');

class BetSpreadComponent extends Component {
	public $bet_spread = NULL;
	public $spread_min_tc = NULL;
	public $spread_max_tc = NULL;
	
	public function setParams(array $params)	{
		$this->bet_spread = $params['bet_spread'];
		$this->spread_min_tc = min(array_keys($this->bet_spread));
		$this->spread_max_tc = max(array_keys($this->bet_spread));
	}
	
	/**
	 * getBetFromTrueCount
	 * 
	 * Renvoie la mise à partir du True Count 
	 * On considère pour la distribution donnée :
	 * que le tc_min donne la mise pour
	 * @param unknown $true_count
	 * @return number
	 */
	public function getBetFromTrueCount($tc)	{
		$bet = 0;
		
		if ($tc < $this->spread_min_tc) {
			$bet = $this->bet_spread[$this->spread_min_tc];
		} elseif ($tc > $this->spread_max_tc)	{
			$bet = $this->bet_spread[$this->spread_max_tc];
		} elseif (array_key_exists($tc, $this->bet_spread))	{
			$bet = $this->bet_spread[$tc];
		} else {
			// Cas d'erreur
			exit("getBetFromTrueCount : Unknown TC value $tc");
		}
					
		return $bet;
	}
		
}