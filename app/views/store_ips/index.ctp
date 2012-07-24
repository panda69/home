<h2>Gestion des IPs</h2>
<ul>
<?php
	e('<li>' . $this->Html->link('Enregistrer une IP', array('controller' => 'StoreIps', 'action' => 'add')) . '</li>');
	e('<li><b>Liste des IPs enregistrées</b></li>');
	e('<ul>');	
	echo <<< EN_TETE
<table>
	<th>IP</th>
	<th>Lieu</th>
	<th>Date</th>
EN_TETE;
	foreach($ips as $ip)	{
		e('<tr>');
		e('<td>');
		e($ip['StoreIp']['ip']);
		e('</td>');
		e('<td>');
		e($ip['StoreIp']['place']);
		e('</td>');
		e('<td>');
		e($ip['StoreIp']['created']);
		e('</td>');
		e('</tr>');
	}
	e('</table>');
	e('</ul>');
?>
</ul>