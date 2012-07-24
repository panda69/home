<?php

class StoreIpsController extends AppController {
	public $name = 'StoreIps';
	
	public function index()	{
		$ips = $this->StoreIp->find('all');
		$this->set('ips', $ips);		
	}
	
	public function add()	{
		if (!empty($this->data))	{
			$this->StoreIp->create();
			$this->data['StoreIp']['ip'] = $_SERVER['REMOTE_ADDR'];
			if ($this->StoreIp->save($this->data))	{
				$this->redirect(array('controller'=>'StoreIps', 'action'=>'index'));
			} else	{
				$this->Session->setFlash('IP not saved...');				
			}	
		}
	}
}

?>