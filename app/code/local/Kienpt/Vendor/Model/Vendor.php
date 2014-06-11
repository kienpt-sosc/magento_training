<?php
class Kienpt_Vendor_Model_Vendor extends Mage_Core_Model_Abstract
{
	public function _construct()
	{
		$this->_init('vendors/vendor');
	}
}