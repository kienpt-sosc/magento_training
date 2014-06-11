<?php 
class Kienpt_BaseBlock_Block4Controller extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		$this->loadLayout('block4_layout_handle');
		$this->renderLayout();
	}
}