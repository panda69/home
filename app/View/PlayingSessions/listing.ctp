<?php $this->Html->addCrumb('Séances', '/PlayingSessions'); ?>
<?php $this->Html->addCrumb('Liste'); ?>
<h2>Séances</h2>
<ul>
<li><?php echo $this->Html->link('Ajouter une séance', array('controller' => 'PlayingSessions', 'action' => 'add')); ?></li>
<li><b>Liste des séances</b></li>
<ul>	

<table>
    <tr>
        <th>Id</th>
        <th>Date</th>        
        <th>Casino</th>
        <th>Unité</th>        
        <th>Sb</th>
        <th>Résultat</th>
		<th>Action</th>                        
    </tr>
       <?php foreach($psessions as $psession): ?>
    <tr>
        <td><?php echo $psession['PlayingSession']['id']; ?> </td>
        <td>
        <?php 
        	$session_date = new DateTime($psession['PlayingSession']['session_date']);
        	echo $session_date->format('d-m-Y');        	 
        ?>
        </td>
        <td>
        <?php 
        	echo $psession['Casino']['name'] . '&nbsp;&nbsp;' . $this->FlagCountry->flagCountry($psession['Casino']['Country']['code_iso']);
        ?>
        </td>
        <td><?php echo $psession['PlayingSession']['unit']; ?> </td>
        <td><?php echo $psession['PlayingSession']['sb'] ? $this->Html->image('check.jpg') : '&nbsp;'; ?> </td>
        <td><?php echo $psession['PlayingSession']['result']; ?> </td>
        <td><?php echo $this->Html->link('Editer', array('controller' => 'PlayingSessions', 'action' => 'edit', $psession['PlayingSession']['id'])); ?> </td>
    </tr>
    <?php endforeach; ?>
</table>

<!-- Affiche le nombre de pages -->
<?php echo $this->Paginator->numbers(); ?>
&nbsp;&nbsp;&nbsp;
<!-- Affiche les liens des pages précédentes et suivantes -->
<?php
    echo $this->Paginator->prev('« Précédent ', null, null, array('class' => 'disabled'));
    echo $this->Paginator->next(' Suivant »', null, null, array('class' => 'disabled'));
?>
&nbsp;&nbsp;&nbsp;
<!-- Affiche X de Y, où X est la page courante et Y le nombre de pages -->
<?php echo $this->Paginator->counter(); ?>