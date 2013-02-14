<?php

class SimulationsController extends AppController {
	const MAX_UNIT = 16;
	const MIN_SPREAD = 6;
	const MAX_SPREAD = 14;
	
	
	private $distris = array(
		"50%" => array(
			1 => array("adv" => "-4.5%", "hands" => 0.0),
			2 => array("adv" => "-4.0%", "hands" => 0.0),
			3 => array("adv" => "-3.5%", "hands" => 0.0),
			4 => array("adv" => "-3.0%", "hands" => 0.5),
			5 => array("adv" => "-2.5%", "hands" => 1.0),
			6 => array("adv" => "-2.0%", "hands" => 1.0),
			7 => array("adv" => "-1.5%", "hands" => 7.5),
			8 => array("adv" => "-1.0%", "hands" => 15.0),
			9 => array("adv" => "-0.5%", "hands" => 47.5),
			10 => array("adv" => "0.0%", "hands" => 15.5),
			11 => array("adv" => "0.5%", "hands" => 7.5),
			12 => array("adv" => "1.0%", "hands" => 2.0),
			13 => array("adv" => "1.5%", "hands" => 1.0),
			14 => array("adv" => "2.0%", "hands" => 1.0),
			15 => array("adv" => "2.5%", "hands" => 0.5),
			16 => array("adv" => "3.0%", "hands" => 0.0),
			17 => array("adv" => "3.5%", "hands" => 0.0),
			18 => array("adv" => "4.0%", "hands" => 0.0),
			19 => array("adv" => "4.5%", "hands" => 0.0),
			20 => array("adv" => "5.0%", "hands" => 0.0),
			21 => array("adv" => "6.0%", "hands" => 0.0),
			22 => array("adv" => "7.0%", "hands" => 0.0),
			23 => array("adv" => "8.0%", "hands" => 0.0)
		),
		"65%" => array(
			1 => array("adv" => "-4.5%", "hands" => 0.0),
			2 => array("adv" => "-4.0%", "hands" => 0.0),
			3 => array("adv" => "-3.5%", "hands" => 0.0),
			4 => array("adv" => "-3.0%", "hands" => 1.0),
			5 => array("adv" => "-2.5%", "hands" => 1.5),
			6 => array("adv" => "-2.0%", "hands" => 4.0),
			7 => array("adv" => "-1.5%", "hands" => 8.0),
			8 => array("adv" => "-1.0%", "hands" => 14.0),
			9 => array("adv" => "-0.5%", "hands" => 39.0),
			10 => array("adv" => "0.0%", "hands" => 14.0),
			11 => array("adv" => "0.5%", "hands" => 8.5),
			12 => array("adv" => "1.0%", "hands" => 4.5),
			13 => array("adv" => "1.5%", "hands" => 2.5),
			14 => array("adv" => "2.0%", "hands" => 1.5),
			15 => array("adv" => "2.5%", "hands" => 1.0),
			16 => array("adv" => "3.0%", "hands" => 0.5),
			17 => array("adv" => "3.5%", "hands" => 0.0),
			18 => array("adv" => "4.0%", "hands" => 0.0),
			19 => array("adv" => "4.5%", "hands" => 0.0),
			20 => array("adv" => "5.0%", "hands" => 0.0),
			21 => array("adv" => "6.0%", "hands" => 0.0),
			22 => array("adv" => "7.0%", "hands" => 0.0),
			23 => array("adv" => "8.0%", "hands" => 0.0)
		),
		"75%" => array(
			1 => array("adv" => "-4.5%", "hands" => 0.0),
			2 => array("adv" => "-4.0%", "hands" => 0.0),
			3 => array("adv" => "-3.5%", "hands" => 1.0),
			4 => array("adv" => "-3.0%", "hands" => 2.0),
			5 => array("adv" => "-2.5%", "hands" => 3.0),
			6 => array("adv" => "-2.0%", "hands" => 4.0),
			7 => array("adv" => "-1.5%", "hands" => 8.0),
			8 => array("adv" => "-1.0%", "hands" => 13.0),
			9 => array("adv" => "-0.5%", "hands" => 34.0),
			10 => array("adv" => "0.0%", "hands" => 13.0),
			11 => array("adv" => "0.5%", "hands" => 8.5),
			12 => array("adv" => "1.0%", "hands" => 4.5),
			13 => array("adv" => "1.5%", "hands" => 3.5),
			14 => array("adv" => "2.0%", "hands" => 2.0),
			15 => array("adv" => "2.5%", "hands" => 2.0),
			16 => array("adv" => "3.0%", "hands" => 1.0),
			17 => array("adv" => "3.5%", "hands" => 0.5),
			18 => array("adv" => "4.0%", "hands" => 0.0),
			19 => array("adv" => "4.5%", "hands" => 0.0),
			20 => array("adv" => "5.0%", "hands" => 0.0),
			21 => array("adv" => "6.0%", "hands" => 0.0),
			22 => array("adv" => "7.0%", "hands" => 0.0),
			23 => array("adv" => "8.0%", "hands" => 0.0)
		),
		"85%" => array(
			1 => array("adv" => "-4.5%", "hands" => 0.0),
			2 => array("adv" => "-4.0%", "hands" => 0.0),
			3 => array("adv" => "-3.5%", "hands" => 1.0),
			4 => array("adv" => "-3.0%", "hands" => 1.5),
			5 => array("adv" => "-2.5%", "hands" => 3.0),
			6 => array("adv" => "-2.0%", "hands" => 5.0),
			7 => array("adv" => "-1.5%", "hands" => 8.0),
			8 => array("adv" => "-1.0%", "hands" => 13.5),
			9 => array("adv" => "-0.5%", "hands" => 31.5),
			10 => array("adv" => "0.0%", "hands" => 13.0),
			11 => array("adv" => "0.5%", "hands" => 7.5),
			12 => array("adv" => "1.0%", "hands" => 5.0),
			13 => array("adv" => "1.5%", "hands" => 3.5),
			14 => array("adv" => "2.0%", "hands" => 2.0),
			15 => array("adv" => "2.5%", "hands" => 2.0),
			16 => array("adv" => "3.0%", "hands" => 1.5),
			17 => array("adv" => "3.5%", "hands" => 1.0),
			18 => array("adv" => "4.0%", "hands" => 0.5),
			19 => array("adv" => "4.5%", "hands" => 0.5),
			20 => array("adv" => "5.0%", "hands" => 0.0),
			21 => array("adv" => "6.0%", "hands" => 0.0),
			22 => array("adv" => "7.0%", "hands" => 0.0),
			23 => array("adv" => "8.0%", "hands" => 0.0)
		)
	);
		
	public $uses = array();
	
	public function index()	{
	}
	
	public function calc($penetration)	{
		$this->set('error', '');
		
		$penetration .= '%';
		if (array_key_exists($penetration, $this->distris) == false)	{
			$this->set('error', 'Unknow penetration');
			$this->render();
			exit();
		}
		
		$units = array();
		for ($i=0; $i <= self::MAX_UNIT; $i++)	
			$units[$i] = $i;
			
		if (empty($this->data))	{
			$defaultValues = array();
			for ($i=self::MIN_SPREAD; $i <= self::MAX_SPREAD; $i++)	{
				if ($i <= 10)
					$defaultValues[$i] = 1;
				elseif ($i == 11) 
					$defaultValues[$i] = 2;
				elseif ($i == 12) 
					$defaultValues[$i] = 4;
				elseif ($i == 13) 
					$defaultValues[$i] = 6;
				elseif ($i >= 14) 
					$defaultValues[$i] = 8;
			}
		} elseif (array_key_exists('defaultValues', $this->data['Simulations']) !== false) {
			$defaultValues = unserialize($this->data['Simulations']['defaultValues']);
		} else {
			$defaultValues = null;
		}
				
		$spread = array();
		for ($i=self::MIN_SPREAD; $i <= self::MAX_SPREAD; $i++)	{
			$distri = $this->distris[$penetration][$i];
			$adv = $distri["adv"];
			$tc = strval(round(floatval(substr($distri["adv"], 0, strlen($distri["adv"])-1)) * 2.0));
			$spread[$i] = "TC = $tc";
		}
		
		$this->set('spread', $spread);	
		$this->set('units', $units);	
		$this->set('defaultValues', $defaultValues);
		
		if (!empty($this->data) && array_key_exists('defaultValues', $this->data['Simulations']) === false)	{
			$tnohp = 0.0; 
			$g = 0.0;
			$tub = 0.0;
			$sdx = 0.0;
			foreach($this->distris[$penetration] as $key => $distri)	{
				$bp = 0.0; 
				if (array_key_exists($key, $this->data["Simulations"]) === false)	{
					if ($key < self::MIN_SPREAD)
						$bp = floatval($this->data["Simulations"][self::MIN_SPREAD]);
					else
						$bp = floatval($this->data["Simulations"][self::MAX_SPREAD]);
				} else
					$bp = floatval($this->data["Simulations"][$key]);

				$nohp = $bp > 0.0 ? floatval($distri["hands"]) : 0.0;
				$tnohp += $nohp;
				$ub = $nohp * $bp;
				$tub += $ub;   
				$adv = floatval(substr($distri["adv"], 0, strlen($distri["adv"])-1)) / 100.0;
				$g += $ub * $adv;
				$sdx += pow($bp, 2) * $nohp;
			}
			 
			$abph = $tub / $tnohp;
			$gph = $g / $tnohp;
			$wr = $gph / $abph;
			$sd = (sqrt($sdx) * 1.1) / sqrt($tnohp); 
						
			$resultPerHours = array();
			foreach(array(1,5,10,100,1000,10000) as $hours)	{
				$tmpEV = round($gph * floatval($hours) * $tnohp, 2);
				$tmpSD = round($sd * sqrt(floatval($hours) * $tnohp), 2);
				$tmpResult = sprintf("Entre %d u et %d u", round($tmpEV - $tmpSD), round($tmpEV + $tmpSD));
				$resultPerHours[$hours] = array(
					'EV' => $tmpEV,
					'SD' => $tmpSD,
					'RSL' => $tmpResult 
				);  		
			}
			
			$results = array(
				'TNOHP' => $tnohp, 
				'ABph' => round($abph,2),
				'GPH' => round($gph,3),
				'WR' => round($wr * 100.0, 2) . '%',
				'ResultsPerHour' => $resultPerHours
			);
			
			$this->set('results', $results);
		}
	}
		
}