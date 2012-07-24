<?php

class Pays extends AppModel	{
	public $name = 'Pays';
	public $useTable = 'pays';
	
	public $hasMany = array(
		'Cercle' => array(
			'className'		=> 'Cercle',
			'foreignKey'	=> 'pays_id'
		)	
	);
}

?>