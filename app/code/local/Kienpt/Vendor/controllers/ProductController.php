<?php
class Kienpt_Vendor_ProductController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		// $this->_forward("list");
	}

	public function editAction()
	{
		$this->loadLayout('product_edit_handle')
			->renderLayout();
	}

	public function newAction()
	{
		$this->_forward('edit');
	}

	public function listAction()
	{
		$this->loadLayout('vendor_list_product_handle')
			 ->renderLayout();
	}

	public function saveAction()
	{
		try {
			$newProduct = Mage::getModel('catalog/product'); 
			$product = $this->getRequest()->getPost();
			
			$newProduct->setAttributeSetId(4)
                    ->setTypeId('simple')
                    ->setVisibility($product['visibility'])
                    ->setTaxClassId($product['tax'])
                    ->setCreatedAt(strtotime('now'))
                    ->setName($product['name'])
                    ->setSku($product['sku'])
                    ->setWeight($product['weight'])
                    ->setStatus($product['status'])
                    ->setPrice($product['price'])
                    ->setCategoryIds(array(23))
                    ->setWebsiteIds(array(1))
                    ->setDescription($product['desc'])
                    ->setShortDescription($product['short-desc'])
                    ->setVendor($this->getRequest()->getParam('vendorid'));

            $newProduct->save(); 
		} 
		catch (Exception $ex) { 
		//Handle the error 
			echo "Can't creat product";
		}
		
		// $this->_redirect('*/*/');
		$this->_redirect("*/*/list/vendorid/".$this->getRequest()->getParam('vendorid')); 
	}
}