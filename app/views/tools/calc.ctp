<?php
	e($this->Form->create("Tools", array('action' => 'Calc')));
	foreach($spread as $key => $value)	{
		e($this->Form->input($key, 
			array(
				'options'	=> $units,
				'div'		=> false,
				'selected'	=> !is_null($this->data['Tools']) ? $this->data['Tools'][$key] : $value 
			)
		));
	}
	e($this->Form->end('Calculer'));
	
	if (!is_null($this->data['Tools']))	{
		e('<div class="boxCalcResult">');
		e("<p><b>Résultats</b></p>");
		e("<p>Espérance : $ev</p>");
		e("<p>Ecart-type : $sd</p>");
		e("</div>");
	}
?>