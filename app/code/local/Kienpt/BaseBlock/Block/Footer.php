<?php
class Kienpt_BaseBlock_Block_Footer extends Mage_Page_Block_Html_Footer
{
	public function _construct()
	{
		$this->setTemplate('baseblock/page/footer.phtml');
	}
}