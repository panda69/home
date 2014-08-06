<?php 
	$this->Html->addCrumb('Administration', '/Pages/display/administration');
	$this->Html->addCrumb('Gestion des utilisateurs', '/Users/index');
	$this->Html->addCrumb('Edition Utilisateur');
?>

<div>
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Edition Utilisateur'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username', array('label' => 'Nom de l\'utilisateur'));
		echo $this->Form->input('password', array('label' => 'Mot de passe'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Confirmer'));?>
</div>
