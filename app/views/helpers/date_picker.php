<?php 

class DatePickerHelper extends FormHelper {
   
    var $helpers = array('Html','Javascript'); 
    var $format = '%Y-%m-%d';
   
    function _setup(){
        $format = Configure::read('DatePicker.format');
        if($format != null){
            $this->format = $format;
        }
    }

    function picker($fieldName, $options = array()) {
        $this->_setup();
        $this->setEntity($fieldName);
        $htmlAttributes = $this->domId($options);        
        $divOptions['class'] = 'date';
        $options['type'] = 'date';
        $options['div']['class'] = 'date';
    	$options['dateFormat'] = 'DMY';
        $options['minYear'] = isset($options['minYear']) ? $options['minYear'] : (date('Y') - 3);
        $options['maxYear'] = isset($options['maxYear']) ? $options['maxYear'] : (date('Y') + 0);

        $options['after'] = $this->Html->image('calendar.png', array('id'=> $htmlAttributes['id'],'style'=>'cursor:pointer'));

    	if (isset($options['empty'])) {
        	$options['after'] .= $this->Html->image('b_drop.png', array('id'=> $htmlAttributes['id']."_drop",'style'=>'cursor:pointer'));
    	}
    	
    	// Mois en français
		$mois = array(
			'01' => 'Janvier',
			'02' => 'Février',
			'03' => 'Mars', 
			'04' => 'Avril', 
			'05' => 'Mai',
			'06' => 'Juin', 
			'07' => 'Juillet', 
			'08' => 'Août',
			'09' => 'Septembre', 
			'10' => 'Octobre',
			'11' => 'Novembre',
			'12' => 'Décembre'
		);
		$options['monthNames'] = $mois;    	
    	
        $output = $this->input($fieldName, $options);
        $output .= $this->Javascript->codeBlock("datepick('" . $htmlAttributes['id'] . "','01/01/" . $options['minYear'] . "','31/12/" . $options['maxYear'] . "');");
        return $output;
    }
   
}

?> 
