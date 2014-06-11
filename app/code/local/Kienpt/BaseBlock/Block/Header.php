<?php
class Kienpt_BaseBlock_Block_Header extends Mage_Page_Block_Html_Header
{
	public function _construct()
	{
		// $logo = $this->createBlock('baseblock/logo','logo');
		$this->setTemplate('baseblock/page/header.phtml');
	}
}