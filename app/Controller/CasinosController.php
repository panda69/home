<?php

class CasinosController extends AppController {
	public $helpers = array('FlagCountry');
	
	public function index()	{
		$casinos = $this->Casino->find('all', array(
			'recursive' => 1,
			'order' => array('Casino.country_id, Casino.id')
		));
		$this->set('casinos', $casinos);
	}
	
	public function add()	{
		if (!empty($this->request->data))	{
			$this->Casino->save( $this->request->data);
			$this->Session->setFlash('Nouveau casino ajouté');
			$this->redirect( array('controller' => 'Casinos', 'action' => 'index'));
		}
		
		$countries = $this->Casino->Country->find('list'); 
		$this->set('countries', $countries);		
	} 
	
	public function edit($id=null)	{
		if (!$id) {
			$this->Session->setFlash('Id Casino non spécifié');
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Casino->find('first', 
				array('conditions' => array('Casino.id' => $id),
					  'recursive' => 1
				)
			);
			$countries = $this->Casino->Country->find('list'); 
			$this->set('countries', $countries);		
		} else {
			if ($this->Casino->save($this->request->data)) {
				$this->Session->setFlash('Sauvegarde OK');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Sauvegarde KO');
			}
		}		
	}
	
	public function geocoder()	{
	}
	
}