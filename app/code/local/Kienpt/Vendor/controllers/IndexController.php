<?php
class Kienpt_Vendor_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		$vendors = Mage::getModel('vendors/vendor')->getCollection()->getData('vendor');
		
		$productModel = Mage::getModel('catalog/product');
		$attr = $productModel->getResource()->getAttribute("vendor");

		foreach ($vendors as $key=>$value) {
			if ($attr->usesSource()) {
		   		$vendors[$key]['option_id'] = $attr->getSource()->getOptionId($vendors[$key]['name']);
		   	}
		}
		Mage::register('vendors',$vendors);
		$this->loadLayout('vendor_list_handle')
			->renderLayout();
	}

	public function editAction()
	{
		$vendorId = $this->getRequest()->getParam('id');
		$vendor = Mage::getModel('vendors/vendor')->load($vendorId)->getData();
		Mage::register('vendor',$vendor);
		$this->loadLayout('vendor_edit_handle')
			->renderLayout();
	}

	public function newAction()
	{
		$this->_forward('edit');
	}

	public function saveAction()
	{
		$vendor = $this->getRequest()->getPost();
		$vendorId = $this->getRequest()->getParam('id');

		$model = Mage::getModel('vendors/vendor');
		$model->setData($vendor)->setId($vendorId);
		$model->save();
		$this->_redirect('*/*/');
	}
}