<?php

class BasicStrategyController extends AppController {
	public $uses = array();
	
	public function simulation()	{
		if (!empty($this->request->data))	{
			$advantage = $this->request->data['BasicStrategy']['advantage'];
			$unit = $this->request->data['BasicStrategy']['unit'];
			$hours = $this->request->data['BasicStrategy']['hours'];
	
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

?>