<?php echo $this->Html->addCrumb('Pays', '/Countries'); ?>
<h2>Gestion des pays</h2>
<ul>
<?php
	echo '<li>' . $this->Html->link('Ajouter un pays', array('controller' => 'Countries', 'action' => 'add')) . '</li>';
	echo '<li><b>Liste des pays</b></li>';
	echo '<ul>';	
	foreach($countries as $country)	{
		echo '<li>';
		echo $country['Country']['name'] . '&nbsp;&nbsp' . $this->FlagCountry->flagCountry($country['Country']['code_iso']);
		echo '&nbsp(';
		echo $this->Html->link('edit', 
			array(
				'controller' => 'Countries', 
				'action' => 'edit',
				$country['Country']['id']
			)
		);
		echo ')';
		echo '</li>';
	}
	echo '</ul>';
?>
</ul>