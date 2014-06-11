<?php
class Kienpt_BaseBlock_Block_Page extends Mage_Core_Block_Template
{
	public function _construct()
	{
		$this->setTemplate('baseblock/page/page-1.phtml');
		return parent::_construct();
	}
}