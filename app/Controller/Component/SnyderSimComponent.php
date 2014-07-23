<?php 

App::uses('Component', 'Controller');
App::uses('FrequencyDistributionComponent', 'Controller/Component');
App::uses('BetSpreadComponent', 'Controller/Component');

class SnyderSimComponent extends Component {
	public $components = array('FrequencyDistribution', 'BetSpread');
	// Heures de jeu
	public $hours_of_play = array(1,5,10,100,1000,10000);
	// Paramètres de la simulation
	public $deck_penetration;
	public $decks_number;
	public $bet_spread;
	public $base_adv;
	public $unit;
	
	
	public function __construct(ComponentCollection $collection, $settings = array()) {
		parent::__construct($collection, $settings);
		
		$this->FrequencyDistribution->setParams( array(
			'deck_penetration' => $this->deck_penetration,
			'decks_number' => $this->decks_number,
			'base_adv' => $this->base_adv		
		));
		
		$this->BetSpread->setParams( array(
			'spread' => $this->bet_spread
		));
	}
	
	public function testFrequencyDistribution()	{
		var_dump($this->FrequencyDistribution->getRows());
	}
		
	public function launch()	{
		$rows = $this->FrequencyDistribution->getRows();
		
		$total_units_bet = 0.0;
		$total_gain = 0.0;
		$total_number_of_hands_played = 0;
		$standard_deviation_per_hand = 0.0;
		$standard_deviation_per_hand_tmp = 0.0;
		foreach ($rows as $row)	{
			$hands = $row['hands'];
			$tc = $row['tc'];
			$adv = $row['adv'] / 100.0; // pourcentage en format décimal
			$bet = $this->BetSpread->getBetFromTrueCount($tc);
			
			$total_number_of_hands_played += $bet > 0 ? $hands : 0;
			$units_bet = $hands * (float)$bet;
			$total_units_bet += $units_bet;			
			$total_gain += $units_bet * $adv;
			$standard_deviation_per_hand_tmp += pow($bet, 2) * $hands;
		}
		
		$average_bet_per_hand = (float)$total_units_bet / (float)$total_number_of_hands_played;
		$gain_per_hand = (float)$total_gain / (float)$total_number_of_hands_played;
		$win_rate = $gain_per_hand / $average_bet_per_hand;
		$win_rate_in_percent = $win_rate * 100.0;
		
		$standard_deviation_per_hand_tmp = sqrt($standard_deviation_per_hand_tmp) * 1.1;
		$standard_deviation_per_hand = $standard_deviation_per_hand_tmp / sqrt($total_number_of_hands_played);
		
		// On considère que l'on joue 100 mains par heure
		$per_hours_of_play = array();
		foreach ($this->hours_of_play as $hours)	{
			$per_hours_of_play[$hours] = array(
				'expected_win' => $gain_per_hand * $hours * 100.0,
				'standard_deviation' => $standard_deviation_per_hand * sqrt($hours * 100)
			);
		}
		
		$result = array(
			'decks_number' => $this->decks_number,				
			'deck_penetration' => $this->deck_penetration,
			'total_units_bet' => $total_units_bet,
			'total_gain' => $total_gain,
			'total_number_of_hands_played' => $total_number_of_hands_played,
			'average_bet_per_hand' => $average_bet_per_hand,
			'gain_per_hand' => $gain_per_hand,
			'win_rate_in_percent' => $win_rate_in_percent . '%',
			'per_hours_of_play' => $per_hours_of_play
		);
		
		return $result;
	}
	
}

?>
