<?php

App::uses('SnyderSimComponent', 'Controller/Component');

class BettingStrategiesController extends Controller	{
	const COUNT_RANGE_START = -5;
	const COUNT_RANGE_END = 5;
	
	public $uses = array();
	public $helpers = array('Html');
	
	public function index()	{
		if (empty($this->request->data))	{
			$range = array();
			for ($tc=self::COUNT_RANGE_START; $tc <= self::COUNT_RANGE_END; $tc++)	{
				if (self::COUNT_RANGE_START == $tc)	
					$range[] = array(
						'name' => sprintf('BetSpread.%d.bet', $tc), 
						'label' => sprintf('<=%d', $tc));
				elseif (self::COUNT_RANGE_END == $tc) 
					$range[] = array(
						'name' => sprintf('BetSpread.%d.bet', $tc), 
						'label' => sprintf('>=%d', $tc));
				else 
					$range[] = array(
						'name' => sprintf('BetSpread.%d.bet', $tc), 
						'label' => sprintf('%d', $tc));
			}
			
			$this->set('range', $range);
		} else {
			var_dump($this->request->data);
			exit();
		}
	}
		
	public function simulation($deck_number = 6, $penetration=75)	{
		// Paramètres de la simulation
// 		$bet_spread = [
// 			-1 => 2,
// 			0 => 2,
// 			1 => 2,
// 			2 => 7,
// 			3 => 12,
// 			4 => 12,
// 			5 => 12,
// 			6 => 12,
// 			7 => 12,
// 			8 => 12,
// 			9 => 12,
// 			10 => 12,
// 			11 => 12,
// 			12 => 12,
// 			13 => 12,
// 			14 => 12,
// 			15 => 12,
// 			16 => 12,
// 			17 => 12															
// 		];
		
		$bet_spread = [
			-2 => 0,
			-1 => 2,
			0 => 2,
			1 => 2,
			2 => 7,
			3 => 12
		];
		
		
		$this->SnyderSim = $this->Components->load('SnyderSim', array(
			'enabled' => false,
			'deck_penetration' => $penetration,
			'deck_number' => $deck_number,
			'bet_spread' => $bet_spread
		));
		
		$this->SnyderSim->launch();
	}
	
}