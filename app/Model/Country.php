<?php

App::uses('AppModel', 'Model');

class Country extends AppModel	{
	public $name = 'Country';
	public $useTable = 'countries';
	
	public $hasMany = array(
		'Casino' => array(
			'className' => 'Casino',
			'foreignKey' => 'country_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}

?>