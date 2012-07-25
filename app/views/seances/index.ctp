<?php $this->Html->addCrumb('Séances', '/Seances'); ?>
<h2>Gestion des séances</h2>
<ul>
<?php
	e('<li>' . $this->Html->link('Ajouter une séance', array('controller' => 'Seances', 'action' => 'add')) . '</li>');
	e('<li><b>Liste des séances</b></li>');
	e('<ul>');	
	echo <<< EN_TETE
<table>
	<th>Id</th>
	<th>Date</th>
	<th>Cercle</th>
	<th>Unité</th>
	<th>Sb</th>
	<th>Résultat</th>
	<th>Action</th>
EN_TETE;
	foreach($etabsessions as $etabsession)	{
		e('<tr>');
		e('<td>');
		e($etabsession['Seance']['id']);
		e('</td>');
		e('<td>');
		e($time->format('d-m-Y', $etabsession['Seance']['session_date']));
		e('</td>');
		e('<td>');
		e($etabsession['Cercles']['name'] . '&nbsp;&nbsp;' . $this->FlagCountry->flagCountry($etabsession['Pays']['code_iso']));
		e('</td>');
		e('<td>');
		e($etabsession['Seance']['unit']);
		e('</td>');
		e('<td>');
		e($etabsession['Seance']['sb'] ? $this->Html->image('check.jpg') : '&nbsp;');
		e('</td>');
		e('<td>');
		e($etabsession['Seance']['result']);
		e('</td>');
		e('<td>');
		e($this->Html->link('Editer', array('controller' => 'Seances', 'action' => 'edit', $etabsession['Seance']['id'])));
		e('</td>');
		e('</tr>');
	}
	e('</table>');
	e('</ul>');
	e($paginator->prev() . '&nbsp;' . $paginator->numbers() . '&nbsp;' . $paginator->next());
?>
</ul>