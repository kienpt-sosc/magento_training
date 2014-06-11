<?php
class Kienpt_Vendor_Block_Product_List_Vendor extends Mage_Catalog_Block_Product_List
{
    protected function _getProductCollection()
    {
        if (is_null($this->_productCollection)) {
            $collection = Mage::getResourceModel('catalog/product_collection');
            Mage::getModel('catalog/layer')->prepareProductCollection($collection);
            $vendorid = $this->getRequest()->getParam('vendorid');

            $collection->addAttributeToFilter('vendor', $vendorid)
                ->addStoreFilter();
            $this->_productCollection = $collection;
        }
        return $this->_productCollection;
    }
}
