<?php

class SeancesController extends AppController {
	public $helpers = array('Time', 'DatePicker', 'FlagCountry');
	public $paginate = array(
		'fields' => array('Seance.id','Seance.session_date','Cercles.name','Pays.code_iso','Seance.unit','Seance.sb','Seance.result'),
		'limit' => 20, 
		'page' => 1, 
		'order' => array('Seance.session_date ASC'),
		'recursive' => -1,
		'joins' => array(
			array(
				'table' => 'cercles',
				'alias' => 'Cercles',
				'type' => 'INNER',
				'conditions' => array(
					'Seance.cercle_id = Cercles.id'
				)
			),
			array(
				'table' => 'pays',
				'alias' => 'Pays',
				'type' => 'INNER',
				'conditions' => array(
					'Pays.id = Cercles.pays_id'
				)
			)
		)	
	);
	
	public function index()	{
		$this->set('etabsessions', $this->paginate('Seance'));		
	}
	
	public function add()	{
		if (!empty($this->data))	{
			$this->Seance->save( $this->data);
			$this->Session->setFlash('Seance ajoutée');
			$this->redirect( array('controller' => 'Seances', 'action' => 'index'));
		} else	{
			$cercles = $this->Seance->Cercle->find('list', array(
				'fields' => array('Cercle.fname'),
				'recursive' => 1,
				'order' => 'Pays.id, Cercle.id'
			));
			$this->set('cercles', $cercles);
		}
	}
	
	public function edit($id=null)	{
		if (!$id) {
			$this->Session->setFlash('Id Séance non spécifié');
			$this->redirect(array('action'=>'index'));
		}
		
		if (empty($this->data)) {
			$this->data = $this->Seance->find('first', 
				array(
					'conditions' => array('id' => $id),
					'recursive' => -1
				)
			);
			
			$cercles = $this->Seance->Cercle->find('list', array(
				'fields' => array('Cercle.fname'),
				'recursive' => 1,
				'order' => 'Cercle.id'
			));
			$this->set('cercles', $cercles);
		} else {
			if ($this->Seance->save($this->data)) {
				$this->Session->setFlash('Sauvegarde OK');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Sauvegarde KO');
			}
		}		
	}
	
	public function synoptique()	{
	}
	
	public function map()	{
	}
	
	public function charts()	{
		
	}
	
	public function chart($choice=1)	{
		App::import('Vendor', 'jpgraph/jpgraph');
		App::import('Vendor', 'jpgraph/jpgraph_line');
		
		$params = array(
			'recursive' => -1,
			'fields' => array('Seance.result'),
			'order' => array('Seance.id')
		);	

		$subtitle = '(global)';
		switch ($choice)	{
			case 2:
				$subtitle = '(Hi-Lo)';
				$params['conditions'] = array('Seance.sb' => 0);
				break;
			case 3:
				$subtitle = '(Stratégie de base)';
				$params['conditions'] = array('Seance.sb' => 1);
				break;
		}
		
		$seances = $this->Seance->find('all', $params);
								
		$ydata = array();
		foreach($seances as $seance)	{
			$ydata[] = $seance['Seance']['result'];
		}
		
		// Width and height of the graph
		$width = 1300; $height = 750;
		
		// Create a graph instance
		$graph = new Graph($width,$height);
		
		// Specify what scale we want to use,
		// int = integer scale for the X-axis
		// int = integer scale for the Y-axis
		$graph->SetScale('intint');
		
		// Setup a title for the graph
		$graph->title->Set('Séances');
		$graph->subtitle->Set($subtitle);
		
		$ysum = array();
		$ycount = count($ydata);
		for ($i=0; $i < $ycount; $i++)	{
			$sum = 0;
			for ($j=0; $j <= $i; $j++)	{
				$sum += $ydata[$j];
			}
			$ysum[$i] = $sum;
		}
		
		$p1 = new LinePlot($ydata);
		$graph->Add($p1);
		
		$p2 = new LinePlot($ysum);
		$graph->Add($p2);
		
		$p1->SetColor("#55bbdd");
		$p1->SetLegend('Séances');
		$p1->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
		$p1->mark->SetColor('#55bbdd');
		$p1->mark->SetFillColor('#55bbdd');
		$p1->SetCenter();
		
		$p2->SetColor("#aaaaaa");
		$p2->SetLegend('Somme séances');
		$p2->mark->SetType(MARK_UTRIANGLE,'',1.0);
		$p2->mark->SetColor('#aaaaaa');
		$p2->mark->SetFillColor('#aaaaaa');
		$p2->value->SetMargin(14);
		$p2->SetCenter();
		
		$graph->legend->SetFrameWeight(1);
		$graph->legend->SetColor('#4E4E4E','#00A78A');
		$graph->legend->SetMarkAbsSize(8);
		
		$full_path_graph = WWW_ROOT;
		$full_path_graph .= DIRECTORY_SEPARATOR . 'img';
		$full_path_graph .= DIRECTORY_SEPARATOR . 'graph';
		$full_path_graph .= DIRECTORY_SEPARATOR . 'graph.png';
		
		if (file_exists($full_path_graph))	{
			unlink($full_path_graph);
		}
		 
		$graph->Stroke($full_path_graph);
	}
	
    public function location_sessions()	{
    	
		$windowText = '<div style="width:220px;height:110px;background:#52D017;border-width:2px;border-style:solid;border-color:black;padding-left:1px;padding-top:1px">';
		$windowText .= '<strong style="text-decoration:underline">%s</strong><br/><br/>';
		$windowText .= '<b>Visite(s): %s</b><br/>';
		$windowText .= '<b>Résultat: %s</b><br/>';
		$windowText .= '</div>';
		
		$sql = '
		SELECT cercles.id, cercles.name, cercles.lat, cercles.lng, COUNT(seances.id) as nbr_seances, SUM(seances.result) as gain
		FROM seances
		INNER JOIN cercles ON cercles.id = seances.cercle_id
		GROUP BY cercles.id';
		
		$cercles = $this->Seance->query($sql);
		
		$markers = array();
		$library = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><markers></markers>');
		foreach($cercles as $cercle)	{
			$marker = $library->addChild('marker');
			$marker->addAttribute('id', sprintf('%d', $cercle['cercles']['id']));
			$marker->addAttribute('name', $cercle['cercles']['name']);
			$marker->addAttribute('lat', sprintf('%f', $cercle['cercles']['lat']));
			$marker->addAttribute('lng', sprintf('%f', $cercle['cercles']['lng']));
			$marker->addAttribute('windowText', sprintf(
				$windowText, 
				addslashes($cercle['cercles']['name']),
				$cercle[0]['nbr_seances'],
				$cercle[0]['gain']
			));
		}
					
		header('Content-type: text/xml');
		echo $library->asXML();
		exit();		
    }
}