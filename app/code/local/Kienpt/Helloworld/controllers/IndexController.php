<?php
class Kienpt_Helloworld_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		// Lay ra name
		// $data = $this->getRequest()->getParams('name');
		// $name = isset($data['name']) && $data['name'] != NULL ? $data['name'] : '';
		// echo "Hello $name";
		$this->loadLayout()->renderLayout();
	}
}