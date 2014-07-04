<?php

class CountriesController extends AppController {
	public $uses = array('Country');
	public $helpers = array('FlagCountry');
	
	public function index()	{
		$countries = $this->Country->find('all', 
			array('recursive' => -1));
		$this->set('countries', $countries);
	}
	
	public function add()	{
		if (!empty($this->request->data))	{
			$this->Country->save( $this->request->data);
			$this->Session->setFlash('Nouveau pays ajouté');
			$this->redirect( array('controller' => 'Countries', 'action' => 'index'));
		}
	}
	
	public function edit($id=null)	{
		if (!$id) {
			$this->Session->setFlash('Id Pays non spécifié');
			$this->redirect(array('action'=>'index'));
		}
		
		if (empty($this->request->data)) {
			$this->request->data = $this->Country->find('first', 
				array(
					'conditions' => array('id' => $id),
					'recursive' => -1
				));
		} else {
			if ($this->Country->save($this->request->data)) {
				$this->Session->setFlash('Sauvegarde OK');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Sauvegarde KO');
			}
		}		
	}
} 