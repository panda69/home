<?php

class GraphController extends AppController {
	public $uses = array('Seance');
	
	public function index()	{
	}
	
	public function build()	{
		$seances = $this->Seance->find('all' , array(
			'fields' => array('Seance.result', 'Seance.session_date')
		));
		
		$xdata = array();
		$ydata = array();
		foreach($seances as $seance)	{
			$session_date = substr($seance['Seance']['session_date'], 0, strlen('YYYY-MM-DD'));
			list($year,$month,$day) = sscanf($session_date, "%d-%d-%d"); 
			$xdata[] = sprintf("%d-%d-%d", (int)$day, (int)$month, (int)$year);
			$ydata[] = (int)$seance['Seance']['result'];
		}
		
		$this->set('xdata', $xdata);
		$this->set('ydata', $ydata);
		$this->layout='graph';
	}
}

?>