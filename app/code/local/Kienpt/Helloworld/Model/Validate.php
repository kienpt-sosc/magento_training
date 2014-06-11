<?php
class Kienpt_Helloworld_Model_Validate extends Mage_Core_Model_Config_Data
{
	/*
	*Override save function for validation input data
	*/
	public function save()
	{
		$data = $this->getValue();	
		if (!is_numeric($data))
		{
			Mage::throwException("Input must be numeric");
		} 
		elseif($data < 0)
		{
			Mage::throwException("Input must be greater than 0");
		}
		return parent::save();
	}	
}