<?php 

App::uses('Component', 'Controller');
App::uses('FrequencyDistributionComponent', 'Controller/Component');
App::uses('BetSpreadComponent', 'Controller/Component');

class SnyderSimComponent extends Component {
	public $components = array('FrequencyDistribution', 'BetSpread');
	public $deck_penetration;
	public $deck_number;
	public $bet_spread;
	public $base_adv = -0.52;
	
	public function __construct(ComponentCollection $collection, $settings = array()) {
		parent::__construct($collection, $settings);
		
		$this->FrequencyDistribution->setParams( array(
			'deck_penetration' => $this->deck_penetration,
			'deck_number' => $this->deck_number,
			'base_adv' => $this->base_adv				
		));
		
		$this->BetSpread->setParams( array(
			'bet_spread' => $this->bet_spread
		));
	}
		
	public function launch()	{
		$rows = $this->FrequencyDistribution->getRows();
		
		$total_units_bet = 0.0;
		$total_gain = 0.0;
		$total_number_of_hands_played = 0;
		foreach ($rows as $row)	{
			$hands = $row['hands'];
			$tc = $row['tc'];
			$adv = $row['adv'] / 100.0; // pourcentage en format décimal
			$bet = $this->BetSpread->getBetFromTrueCount($tc);
			
			$total_number_of_hands_played += $bet > 0 ? $hands : 0;
			$units_bet = $hands * (float)$bet;
			$total_units_bet += $units_bet;			
			$total_gain += $units_bet * $adv;
		}
		
		$result = array(
			'total_units_bet' => $total_units_bet,
			'total_gain' => $total_gain,
			'total_number_of_hands_played' => $total_number_of_hands_played
		);
		
		var_dump($result);
	}
	
}

?>
