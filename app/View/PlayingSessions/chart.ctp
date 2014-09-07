<?php
	$this->Html->addCrumb('Séances', '/PlayingSessions');	
	$this->Html->addCrumb('Courbes', '/PlayingSessions/Charts');

	echo $this->Html->image('graph/' . $file_graph_name);
?>