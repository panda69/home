<?php

class CerclesController extends AppController {
	public $helpers = array('FlagCountry');
	
	public function index()	{
		$etabs = $this->Cercle->find('all', array(
			'recursive' => 1,
			'order' => array('Pays.id, Cercle.id')
		));
		$this->set('etabs', $etabs);
	}
	
	public function add()	{
		if (!empty($this->data))	{
			$this->Cercle->save( $this->data);
			$this->Session->setFlash('Nouveau cercle ajouté');
			$this->redirect( array('controller' => 'Cercles', 'action' => 'index'));
		}
		
		$pays = $this->Cercle->Pays->find('list'); 
		$this->set('pays', $pays);		
	} 
	
	public function edit($id=null)	{
		if (!$id) {
			$this->Session->setFlash('Id Cercle non spécifié');
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Cercle->find('first', 
				array('conditions' => array('Cercle.id' => $id),
					  'recursive' => 1
				)
			);
			$pays = $this->Cercle->Pays->find('list'); 
			$this->set('pays', $pays);		
		} else {
			if ($this->Cercle->save($this->data)) {
				$this->Session->setFlash('Sauvegarde OK');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Sauvegarde KO');
			}
		}		
	}
	
}