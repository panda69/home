<?php

class Cercle extends AppModel {
	public $belongsTo = array(
		'Pays' => array(
			'className'		=> 'Pays',
			'foreignKey'	=> 'pays_id'
		)
	);
	public $hasMany = array('Seance');	
    public $virtualFields = array(
    	'fname' => "CONCAT(Cercle.name, ' (', Pays.code_iso, ')')"
    );
	
}