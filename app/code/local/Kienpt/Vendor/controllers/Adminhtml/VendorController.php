<?php
class Kienpt_Vendor_Adminhtml_VendorController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
	{
		$vendorBlock = $this->getLayout()
							->createBlock('vendor/adminhtml_vendor');
		$this->loadLayout()
			->_addContent($vendorBlock)
			->renderLayout();
	}

	public function editAction()
	{
		$vendorId = $this->getRequest()->getParam('id');
		if($vendorId != null)
		{
			$vendor = Mage::getModel('vendors/vendor')->load($vendorId);
			if ($vendor->getData() == NULL)
			{
				Mage::getSingleton('adminhtml/session')->addError($this->__("Vendor {$vendor['name']} doesn't  exist."));
				$this->_redirect('*/*/');
			} else {
				Mage::register('vendor_data',$vendor);				
			}
		}		
		$vendorEdit = $this->getLayout()
						->createBlock('vendor/adminhtml_vendor_edit');
		$this->loadLayout()
				->_addContent($vendorEdit)
				->_addLeft($this->getLayout()->createBlock('vendor/adminhtml_vendor_edit_tabs'))
				->renderLayout();
	}

	public function newAction()
	{
		$this->_forward('edit');
	}

	public function saveAction()
	{
		$data = $this->getRequest()->getPost();
		$vendorId = $this->getRequest()->getParam('id');
		$vendors = Mage::getModel('vendors/vendor')->getCollection()->getData();
		
		if ($this->checkExistVendor($data,$vendorId))
		{
			try{
				$model = Mage::getModel('vendors/vendor');
				$model->setData($data)->setId($vendorId);
				$model->save();
				Mage::getSingleton('adminhtml/session')->addSuccess($this->__("Save vendor successed."));
				Mage::getSingleton('adminhtml/session')->setFormData(false);
				$this->_redirect('*/*/');	
			} catch(Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            	Mage::getSingleton('adminhtml/session')->setFormData($data);
			}			
		}
	}

	public function checkExistVendor($data = array(),$vendorId = '')
	{
		$vendors = Mage::getModel('vendors/vendor')->getCollection()->getData();
		if($vendorId != null)
		{
			foreach ($vendors as $element) {
				if($data['name'] == $element['name'] && $vendorId != $element['vendor_id'])
				{
					Mage::getSingleton('adminhtml/session')->addError($this->__("Vendor name {$vendor['name']} is exist."));
					Mage::getSingleton('adminhtml/session')->setFormData($data);
					$this->_redirect('*/*/edit', array('id' => $vendorId));					
					return false;
				}
			}
		} else {
			foreach ($vendors as $element) {
				if($data['name'] == $element['name'])
				{
					Mage::getSingleton('adminhtml/session')->addError($this->__("Vendor name {$vendor['name']} is exist."));
					Mage::getSingleton('adminhtml/session')->setFormData($data);
					$this->_redirect("*/*/new");
					return false;
				}
			}
		}
		return true;
	}

	public function gridVendorAction()
	{
	    $this->loadLayout();
	    $this->getResponse()->setBody(
	           $this->getLayout()->createBlock('vendor/adminhtml_vendor_grid')->toHtml()
	    ); 
	}

	public function gridProductAction()
	{
	    $this->loadLayout();
	    $this->getResponse()->setBody(
	           $this->getLayout()->createBlock('vendor/adminhtml_vendor_edit_tab_listProduct')->toHtml()
	    ); 
	}


	/*
	*Delete single vendor in Edit Form
	*/

	public function deleteAction()
	{
		$vendorId = $this->getRequest()->getParam('id');
		if($vendorId != NULL)
		{
			$model = Mage::getModel("vendors/vendor")->load($vendorId);
			$this->deleteProductInVendor($vendorId);
			// die();
			$model->delete();
			Mage::getSingleton('adminhtml/session')->addSuccess($this->__("Delete vendor successed."));
			$this->_redirect('*/*/');
		} else {
			Mage::getSingleton('adminhtml/session')->addError($this->__("Vendor {$vendor['name']} doesn't  exist."));
			$this->_redirect('*/*/');
		}
	}


	/*
	*Delete many vendor selected from grid
	*/
	public function deleteSelectedAction()
	{
		$list_vendor = $this->getRequest()->getParam('list_vendor');
		if ($list_vendor != NULL)
		{
			foreach ($list_vendor as $vendorId) {
				$model = Mage::getModel("vendors/vendor")->load($vendorId);
				// var_dump($model->getData());
				$this->deleteProductInVendor($vendorId);
				// die();
				$model->delete();

			}
			Mage::getSingleton('adminhtml/session')->addSuccess($this->__("Delete vendor successed."));
			$this->_redirect('*/*/');
		}
	}

	/*
	*Delete all product of vendor when vendor is deleted
	*/

	public function deleteProductInVendor($vendorId = '')
	{
		if ($vendorId != NULL)
		{
			$colection = Mage::getModel('catalog/product')->getCollection()
				->addAttributeToFilter('vendor', $this->getRequest()->getParam('id'));
			$list_product = $colection->getData();
			// var_dump($list_product);
			// exit();
			if ($list_product != NULL)
			{
				foreach ($list_product as $product) {
					$productModel = Mage::getModel('catalog/product')->load($product['entity_id'])->delete();
				}
			}
		}
	}
}