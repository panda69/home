<?php

class ToolsController extends AppController {
	const MAX_UNIT = 16;
	
	private $distris = array(
		"< -5" => array(3.74, -3.54),
		"= -5" => array(1.96, -2.848),
		"= -4" => array(4.12, -2.310),
		"= -3" => array(5.57, -1.884),
		"= -2" => array(11.79, -1.381),
		"= -1" => array(16.72, -0.886),
		"= 0" => array(27.20, -0.513),
		"= 1" => array(10.61, 0.052),
		"= 2" => array(7.42, 0.584),
		"= 3" => array(3.62, 1.044),
		"= 4" => array(2.84, 1.569),
		"= 5" => array(1.38, 2.073),
		"= 6" => array(1.15, 2.629),
		"= 7" => array(0.55, 2.895),
		"> 7" => array(1.33, 3.79)
	);

	private $spread = array(
		"< -5" => 1,
		"= -5" => 1,
		"= -4" => 1,
		"= -3" => 1,
		"= -2" => 1,
		"= -1" => 1,
		"= 0" => 1,
		"= 1" => 2,
		"= 2" => 4,
		"= 3" => 6,
		"= 4" => 8,
		"= 5" => 8,
		"= 6" => 8,
		"= 7" => 8,
		"> 7" => 8
	);	
	
	public $uses = array();
	
	public function index()	{
		
	}
	
	public function Calc()	{
		$units = array();
		for ($i=1; $i <= self::MAX_UNIT; $i++)	
			$units[$i] = $i;
			
		//$spread = array_keys($this->init_spread);
		$this->set('spread', $this->spread);
		$this->set('units', $units);
			
		if (!empty($this->data))	{
			$ev = 0.0; $sd = 0.0;
			foreach ($this->distris as $key => $distri)	{
				$ev += $distri[0] * $distri[1] * $units[$this->data['Tools'][$key]] / 100.0;
				$sd += pow($units[$this->data['Tools'][$key]], 2) * $distri[0];  
			}
			$sd = 1.15 * sqrt($sd);
			$this->set('ev', $ev . ' unités (pour une heure)');
			$this->set('sd', $sd . ' unités (pour une heure)');
		} else	{
			$this->set('ev', '');
			$this->set('sd', '');
		}
	}
	
	public function Estimation()	{
		if (!empty($this->data))	{
			$ev = $this->data['Tools']['ev'];
			$ev = $this->data['Tools']['ev'];
			$sd = $this->data['Tools']['sd'];
			$unit = $this->data['Tools']['unit'];
			$hours = $this->data['Tools']['hours'];
			$ev *= $unit * $hours;
			$sd *= $unit * sqrt($hours);
			$min = $ev - $sd;
			$max = $ev + $sd; 
			$result = sprintf("Pour %d heure(s)) : entre %f et %f", $hours, $min, $max);
			$this->set('result', $result);
		} else	{
			$this->set('result', '');
		}
	}
	
	public function EstimationStrategieBase()	{
		if (!empty($this->data))	{
			$advantage = $this->data['Tools']['advantage'];
			$unit = $this->data['Tools']['unit'];
			$hours = $this->data['Tools']['hours'];
						
			$ev = 100.0 * $unit * $hours * ($advantage / 100.0);
			$sd = 11.5 * $unit * sqrt($hours);
			$min = $ev - $sd;
			$max = $ev + $sd; 
			$result = sprintf("Espérance : %f<br/>", $ev);
			$result .= sprintf("Ecart-type : %f<br/>", $sd);
			$result .= sprintf("Pour %d heure(s)) : entre %f et %f", $hours, $min, $max);
			//$result = "\$ev:$ev---\$sd:$sd";
			$this->set('result', $result);
		} else	{
			$this->set('result', '');
		}
	}
	
}