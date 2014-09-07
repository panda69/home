<?php

class PlayingSessionsController extends AppController {
	public $helpers = array('FlagCountry');
	public $components = array('Paginator');
	public $uses = array('PlayingSession');
	private $mois = array('01' => 'Janvier', '02' => 'Février', '03' => 'Mars', '04' => 'Avril', '05' => 'Mai', '06' => 'Juin', '07' => 'Juillet', '08' => 'Août', '09' => 'Septembre', '10' => 'Octobre', '11' => 'Novembre', '12' => 'Décembre');
	
	public $paginate = array(
		'limit' => 20,
		'recursive' => 2,
		'order' => array(
			'PlayingSession.session_date' => 'asc'
		)			
	);	
	
	public function index()	{
	}
	
	public function listing()	{
		$this->Paginator->settings = $this->paginate;
		
		$data = $this->Paginator->paginate('PlayingSession');
		$this->set('psessions', $data);		
	}
	
	public function add()	{
		if (!empty($this->request->data))	{
			$this->PlayingSession->save( $this->request->data);
			$this->Session->setFlash('Seance ajoutée');
			$this->redirect( array('controller' => 'PlayingSessions', 'action' => 'listing'));
		} else	{
			$this->PlayingSession->Casino->virtualFields['fname'] = "CONCAT(Casino.name, ' (', Country.code_iso, ')')";
			
			$casinos = $this->PlayingSession->Casino->find('list', array(
				'fields' => array('Casino.id', 'Casino.fname'),
				'order' => 'Country.id, Casino.id',
				'recursive' => 1
			));
						
			$this->set('casinos', $casinos);
			$this->set('mois', $this->mois);
		}
	}
	
	public function edit($id=null)	{
		if (!$id) {
			$this->Session->setFlash('Id Séance non spécifié');
			$this->redirect(array('action'=>'listing'));
		}
		
		if (empty($this->request->data)) {
			$this->request->data = $this->PlayingSession->find('first', 
				array(
					'conditions' => array('id' => $id),
					'recursive' => -1
				)
			);
			
			$this->PlayingSession->Casino->virtualFields['fname'] = "CONCAT(Casino.name, ' (', Country.code_iso, ')')";
			
			$casinos = $this->PlayingSession->Casino->find('list', array(
				'fields' => array('Casino.id', 'Casino.fname'),
				'order' => 'Country.id, Casino.id',
				'recursive' => 1
			));
						
			$this->set('casinos', $casinos);
			$this->set('mois', $this->mois);
		} else {
			if ($this->PlayingSession->save($this->request->data)) {
				$this->Session->setFlash('Sauvegarde OK');
				$this->redirect(array('action'=>'listing'));
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
		require(APP . 'Vendor' . DS . 'jpgraph' . DS . 'jpgraph.php');
		require(APP . 'Vendor' . DS . 'jpgraph' . DS . 'jpgraph_line.php');
		
		// Répertoire de stockage des images générées
		$dir_path_graph = WWW_ROOT . 'img' . DIRECTORY_SEPARATOR . 'graph';
		if (!file_exists($dir_path_graph))	{
			mkdir($dir_path_graph);
		}
		
		foreach (glob($dir_path_graph . DIRECTORY_SEPARATOR . "*.png") as $filename) {
			unlink($filename);
		}		
				
		$params = array(
			'recursive' => -1,
			'fields' => array('PlayingSession.result'),
			'order' => array('PlayingSession.id')
		);	

		$subtitle = '(global)';
		switch ($choice)	{
			case 2:
				$subtitle = '(Hi-Lo)';
				$params['conditions'] = array('PlayingSession.sb' => 0);
				break;
			case 3:
				$subtitle = '(Stratégie de base)';
				$params['conditions'] = array('PlayingSession.sb' => 1);
				break;
		}
		
		$seances = $this->PlayingSession->find('all', $params);
								
		$ydata = array();
		foreach($seances as $seance)	{
			$ydata[] = $seance['PlayingSession']['result'];
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
		
		// Nom du fichier de l'image générée
		$file_graph_name = 'graph'. time() . '.png';
		
		// Chemin complet du fichier de l'image générée
		$full_path_graph = $dir_path_graph . DIRECTORY_SEPARATOR . $file_graph_name;
				
		// Génération de l'image
		$graph->Stroke($full_path_graph);
		
		$this->set('file_graph_name', $file_graph_name);
	}
	
    public function location_sessions()	{
    	
		$windowText = '<div style="width:220px;height:110px;background:#52D017;border-width:2px;border-style:solid;border-color:black;padding-left:1px;padding-top:1px">';
		$windowText .= '<strong style="text-decoration:underline">%s</strong><br/><br/>';
		$windowText .= '<b>Visite(s): %s</b><br/>';
		$windowText .= '<b>Résultat: %s</b><br/>';
		$windowText .= '</div>';
		
		$sql = '
		SELECT casinos.id, casinos.name, casinos.lat, casinos.lng, COUNT(playing_sessions.id) as nbr_seances, SUM(playing_sessions.result) as gain
		FROM playing_sessions
		INNER JOIN casinos ON casinos.id = playing_sessions.casino_id
		GROUP BY casinos.id';
		
		$casinos = $this->PlayingSession->query($sql);
		
		$markers = array();
		$library = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><markers></markers>');
		foreach($casinos as $casino)	{
			$marker = $library->addChild('marker');
			$marker->addAttribute('id', sprintf('%d', $casino['casinos']['id']));
			$marker->addAttribute('name', $casino['casinos']['name']);
			$marker->addAttribute('lat', sprintf('%f', $casino['casinos']['lat']));
			$marker->addAttribute('lng', sprintf('%f', $casino['casinos']['lng']));
			$marker->addAttribute('windowText', sprintf(
				$windowText, 
				addslashes($casino['casinos']['name']),
				$casino[0]['nbr_seances'],
				$casino[0]['gain']
			));
		}
					
		header('Content-type: text/xml');
		echo $library->asXML();
		exit();		
    }
}