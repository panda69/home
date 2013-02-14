<?php

class FlagCountryHelper extends FormHelper	{
	public $helpers = array('Html');
	
	public function flagCountry($code_iso)	{
		$flag_path = 'flags/' . strtolower($code_iso) . '.png'; 
		$flag_html_image = $this->Html->image($flag_path);
		
		return $flag_html_image;
	}
	
	public function flagCountries()	{
		$arrFlags = array();
		$flags = glob(WWW_ROOT . IMAGES_URL . 'flags/*.png');
		foreach ($flags as $flag) {
			$arrFlags[ basename($flag, '.png')] = basename($flag, '.png');
		}
		
		return $arrFlags;
	}
	
}