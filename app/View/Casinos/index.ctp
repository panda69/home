<?php echo $this->Html->addCrumb('Casinos', '/Casinos'); ?>
<h2>Gestion des casinos</h2>
<ul>
<?php
	echo '<li>' . $this->Html->link('Ajouter un casino', array('controller' => 'Casinos', 'action' => 'add')) . '</li>';
	echo '<li><b>Liste des casinos</b></li>';
	echo '<ul>';	
	foreach($casinos as $casino)	{
		echo '<li>';
		echo $casino['Casino']['name'];
		echo '&nbsp;&nbsp;';
		echo $this->FlagCountry->flagCountry($casino['Country']['code_iso']);
		echo '&nbsp(';
		echo $this->Html->link('edit', 
			array(
				'controller' => 'Casinos', 
				'action' => 'edit',
				$casino['Casino']['id']
			)
		);
		echo ')';
		echo '</li>';
	}
	echo '</ul>';
?>
</ul>