<?php
class Kienpt_Helloworld_Model_Price_Observer
{
	protected $_fixedPrice = 0;
	protected $_fixedPercent = 0;


	/*
	*set _fixedPrice and _fixedPercent in Config
	*/
	public function __construct()
	{
		$this->_fixedPrice = Mage::getStoreConfig('kienpt_helloworld/messages/fixed_price');
		$this->_fixedPercent = Mage::getStoreConfig('kienpt_helloworld/messages/fixed_percent');
	}

	/*
	*print full action name in each controller
	*/
	public function beforeLoadController(Varien_Event_Observer $observer)
	{
		echo "<br/>".Mage::app()->getFrontController()->getAction()->getFullActionName();
	}


	/*
	*Update Product Price in action catelog_category_view (when show all products)
	*/
	public function updateAllPrice(Varien_Event_Observer $observer)
	{
		if ($this->_fixedPrice != 0)
		{
			foreach ($observer->getCollection() as $product) {
				$product->setPrice($this->_fixedPrice);
				$product->setFinalPrice($this->_fixedPrice);
			}
		}
	}


	/*
	*Update Product Price in action catalog_product_view (show product detail)
	*/
	public function updatePrice(Varien_Event_Observer $observer)
	{
		if($this->_fixedPrice != 0)
		{
			$product = $observer->getEvent()->getProduct();
			$product->setPrice($this->_fixedPrice);	
		}
	}


	/*
	*Update Product Price when add product to cart
	*/
	public function addProductCart(Varien_Event_Observer $observer)
	{
		if($this->_fixedPrice != 0)
		{
			$product = $observer->getQuoteItem();
			$currentPrice = $fixedPrice*($fixedPercent/100 + 1);
			$product->setCustomPrice($currentPrice)->setOriginalCustomPrice($currentPrice);
		}
	}
}