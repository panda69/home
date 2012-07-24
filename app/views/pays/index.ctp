<h2>Gestion des pays</h2>
<ul>
<?php
	e('<li>' . $this->Html->link('Ajouter un pays', array('controller' => 'Pays', 'action' => 'add')) . '</li>');
	e('<li><b>Liste des pays</b></li>');
	e('<ul>');	
	foreach($countries as $country)	{
		e('<li>');
		e($country['Pays']['name'] . '&nbsp;&nbsp' . $this->FlagCountry->flagCountry($country['Pays']['code_iso']));
		e('&nbsp(');
		e($this->Html->link('edit', 
			array(
				'controller' => 'Pays', 
				'action' => 'edit',
				$country['Pays']['id']
			)
		));
		e(')');
		e('</li>');
	}
	e('</ul>');
?>
</ul>