<?php 

App::uses('AppModel', 'Model');

class PlayingSession extends AppModel {
	public $belongsTo = array(
		'Casino' => array(
			'className' => 'Casino',
			'foreignKey' => 'casino_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

?>