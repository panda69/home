<?php 
	echo $this->Html->css('jquery-ui-1.9.2.custom');
	echo $this->Html->script('jquery-1.8.3');
	echo $this->Html->script('jquery-ui-1.9.2.custom.min'); 
	echo $this->Html->script('datepicker-fr');
?>

<?php
	$this->Html->addCrumb('Séances', '/PlayingSessions');
	$this->Html->addCrumb('Editer une séance');
	
	echo $this->Form->create('PlayingSession');
	echo $this->Form->hidden('id');	
	echo $this->Form->input('unit', array('label' => 'Unité', 'class'=>'xsmall'));
	echo $this->Form->input('sb', array('label' => 'Stratégie de base', 'type' => 'checkbox'));
	echo $this->Form->input('result', array('label' => 'Résultat', 'class'=>'xxmedium'));
	echo $this->Form->input('casino_id', array('label' => 'Casino'));	
	
	echo $this->Form->input('session_date', array(
		'label' => 'Date de la séance',
		'dateFormat' => 'DMY',
		'monthNames' => $mois,
		'id' => 'select_date',
		'after' => '&nbsp;' . $this->Html->tag('span ', $this->Html->image('datePicker/calendar.png'), array('id' => 'datepicker_img'))
	));

	echo $this->Html->div('', ' ' ,array('id' => 'datepicker'));
	
	echo $this->Form->end('Sauvegarder');	
?>

<script type="text/javascript">
	$(document).ready(function()	{
		$("#datepicker_img img").click(function()	{
        	$("#datepicker").datepicker(
            {
            	dateFormat: 'yy-mm-dd',
                onSelect: function(dateText, inst)	{
                	var d = new Date(dateText);
                	var day = d.getDate().toString();
                	if (day.length == 1)	{
                		day = '0' + day;
                	}
                	var month = (d.getMonth() + 1).toString();
                	if (month.length == 1)	{
                		month = '0' + month;
                	}
                	var year = new String(d.getFullYear());
                	$('#select_dateDay option[value=' + day + ']').prop('selected', true);
                	$('#select_dateMonth option[value=' + month + ']').prop('selected', true);
                	$('#select_dateYear option[value=' + year + ']').prop('selected', true);
                	$("#datepicker").datepicker("destroy");
                }
            }
            );
        });
    });
 </script>

