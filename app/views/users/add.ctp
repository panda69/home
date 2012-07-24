<?php
	echo $this->Form->create('User');
	echo $this->Form->inputs(array(
		'legend' => 'Signup',
		'username',
		'password'
	));
	echo $this->Form->end('Submit');
?>