<?php

App::uses('SnyderSimComponent', 'Controller/Component');

class BettingStrategiesController extends Controller	{
	const COUNT_RANGE_START = -2;
	const COUNT_RANGE_END = 6;
	
	public $uses = array();
	public $helpers = array('Html');
	
	private static function getRange(array $default_values)	{
		$range = array();
		for ($tc=self::COUNT_RANGE_START; $tc <= self::COUNT_RANGE_END; $tc++)	{
			if (self::COUNT_RANGE_START == $tc)
				$range[] = array(
					'name' => sprintf('BettingStrategie.BetSpread.%d', $tc),
					'label' => sprintf('<=%d', $tc),
					'default' => $default_values[$tc]
				);
			elseif (self::COUNT_RANGE_END == $tc)
				$range[] = array(
					'name' => sprintf('BettingStrategie.BetSpread.%d', $tc),
					'label' => sprintf('>=%d', $tc),
					'default' => $default_values[$tc]
				);
			else
				$range[] = array(
					'name' => sprintf('BettingStrategie.BetSpread.%d', $tc),
					'label' => sprintf('%d', $tc),
					'default' => $default_values[$tc]
				);
		}
		
		return $range;
	}
	
	public function index()	{
	}
		
	public function simulation($decks_number, $deck_penetration)	{
		
		$action = '';
		if (empty($this->request->data))	{
			// On affiche le formulaire de la simulation pour la 1er fois
			$action = 'FILL_DEFAULT_SIM_DATA';
		} elseif (!empty($this->request->data['BettingStrategieBack']))	{
			// On réaffiche le formulaire avec les valeurs précédemment saisies
			$action = 'FILL_USER_SIM_DATA';
		} else {
			// On procède à la simulation
			$action = 'PROCEED_SIM';
		}
		
		switch ($action)	{
			case 'FILL_DEFAULT_SIM_DATA':
			case 'FILL_USER_SIM_DATA':
				switch ($action)	{
					case 'FILL_DEFAULT_SIM_DATA':
						$range_values = array_combine(
							range(self::COUNT_RANGE_START, self::COUNT_RANGE_END),
							array_fill(1, self::COUNT_RANGE_END - self::COUNT_RANGE_START + 1, 1)
						);
						$base_adv = -0.5;
						break;
					case 'FILL_USER_SIM_DATA':
						$previously_fill_data = unserialize($this->request->data['BettingStrategieBack']['defaultValues']);
						$range_values = $previously_fill_data['BetSpread'];
						$base_adv = $previously_fill_data['BaseAdv'];
						break;
				}
					
				$this->set('range', self::getRange($range_values));
				$this->set('decks_number', $decks_number);
				$this->set('deck_penetration', $deck_penetration);
				$this->set('base_adv', $base_adv);
				break;
		
			case 'PROCEED_SIM':
				// Lancement de la simulation
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
				break;
		}						
	}
	
}