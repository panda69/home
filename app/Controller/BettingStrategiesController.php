<?php

App::uses('SnyderSimComponent', 'Controller/Component');

class BettingStrategiesController extends Controller	{
	public $uses = array();
		
	public function index($deck_number = 6, $penetration=75)	{
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