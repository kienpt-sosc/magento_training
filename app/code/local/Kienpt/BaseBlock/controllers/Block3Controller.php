<?php 
class Kienpt_BaseBlock_Block3Controller extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		$this->loadLayout('block3_layout_handle');
		$this->renderLayout();
	}
}