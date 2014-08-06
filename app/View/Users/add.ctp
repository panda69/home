<!-- app/View/Users/add.ctp -->
<div>
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Ajouter User'); ?></legend>
        <?php 
        	echo $this->Form->input('username');
        	echo $this->Form->input('password');
	    ?>
    </fieldset>
<?php echo $this->Form->end(__('Ajouter'));?>
</div>