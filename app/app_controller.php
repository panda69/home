<?php 

class AppController extends Controller {
	public $components = array(
		'Auth' => array(
			'loginRedirect' => array('controller' => 'pages', 'action' => 'home'),
			'loginError' => 'Invalid account specified',
			'authError' => 'Veuillez vous connecter'
		), 
		'Session'
	);	
}

?>