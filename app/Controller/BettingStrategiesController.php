<?php

App::uses('SnyderSimComponent', 'Controller/Component');

class BettingStrategiesController extends Controller	{
	const COUNT_RANGE_START = -2;
	const COUNT_RANGE_END = 6;
	
	public $uses = array();
	public $helpers = array('Html');
	
	public function index()	{
	}
		
	public function simulation($decks_number = 6, $deck_penetration=75)	{
		if (empty($this->request->data))	{
			$range = array();
			for ($tc=self::COUNT_RANGE_START; $tc <= self::COUNT_RANGE_END; $tc++)	{
				if (self::COUNT_RANGE_START == $tc)
					$range[] = array(
							'name' => sprintf('BettingStrategie.BetSpread.%d', $tc),
							'label' => sprintf('<=%d', $tc));
					elseif (self::COUNT_RANGE_END == $tc)
					$range[] = array(
							'name' => sprintf('BettingStrategie.BetSpread.%d', $tc),
							'label' => sprintf('>=%d', $tc));
					else
						$range[] = array(
								'name' => sprintf('BettingStrategie.BetSpread.%d', $tc),
								'label' => sprintf('%d', $tc));
			}
				
			$this->set('range', $range);
			$this->set('decks_number', $decks_number);
			$this->set('deck_penetration', $deck_penetration);
		} else {
			$this->SnyderSim = $this->Components->load('SnyderSim', array(
				'enabled' => false,
				'deck_penetration' => $this->request->data['BettingStrategie']['DeckPenetration'],
				'decks_number' => $this->request->data['BettingStrategie']['DecksNumber'],
				'base_adv' => $this->request->data['BettingStrategie']['BaseAdv'],
				'bet_spread' => $this->request->data['BettingStrategie']['BetSpread']
			));
			
			// Lancement de la simulation
			$result = $this->SnyderSim->launch();
			
			$this->set('result', $result);
				
			$this->render('result');
		}
		
	}
	
}