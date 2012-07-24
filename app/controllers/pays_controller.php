<?php

class PaysController extends AppController {
	public $name = 'Pays';
	public $uses = array('Pays');
	public $helpers = array('FlagCountry');
	
	public function index()	{
		$countries = $this->Pays->find('all', 
			array('recursive' => -1));
		$this->set('countries', $countries);
	}
	
	public function add()	{
		if (!empty($this->data))	{
			$this->Pays->save( $this->data);
			$this->Session->setFlash('Nouveau pays ajouté');
			$this->redirect( array('controller' => 'Pays', 'action' => 'index'));
		}
	}
	
	public function edit($id=null)	{
		if (!$id) {
			$this->Session->setFlash('Id Pays non spécifié');
			$this->redirect(array('action'=>'index'));
		}
		
		if (empty($this->data)) {
			$this->data = $this->Pays->find('first', 
				array(
					'conditions' => array('id' => $id),
					'recursive' => -1
				));
		} else {
			if ($this->Pays->save($this->data)) {
				$this->Session->setFlash('Sauvegarde OK');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Sauvegarde KO');
			}
		}		
	}
} 