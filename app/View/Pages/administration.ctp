<?php
	$this->Html->addCrumb('Administration', '/Pages/display/administration');
	
	echo '<ul>';
	echo '<li>';
	echo $this->Html->link('Gestion des utilisateurs', array('controller' => 'Users', 'action' => 'index'));
	echo '</li>';
	echo '</ul>';
?>