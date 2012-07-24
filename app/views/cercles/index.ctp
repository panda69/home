<h2>Gestion des cercles</h2>
<ul>
<?php
	e('<li>' . $this->Html->link('Ajouter un cercle', array('controller' => 'cercles', 'action' => 'add')) . '</li>');
	e('<li><b>Liste des cercles</b></li>');
	e('<ul>');	
	foreach($etabs as $etab)	{
		e('<li>');
		e($etab['Cercle']['name']);
		e('&nbsp;&nbsp;');
		e($this->FlagCountry->flagCountry($etab['Pays']['code_iso']));
		e('&nbsp(');
		e($this->Html->link('edit', 
			array(
				'controller' => 'Cercles', 
				'action' => 'edit',
				$etab['Cercle']['id']
			)
		));
		e(')');
		e('</li>');
	}
	e('</ul>');
?>
</ul>