<?php 
class Kienpt_Vendor_Block_Adminhtml_Template_Grid_Renderer_Vendor extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        return $this->_getValue($row);
    } 
    protected function _getValue(Varien_Object $row)
    {       
        $productId = $row->getEntityId();
        $vendorProduct = Mage::getModel("catalog/product")->load($productId)->getVendor();

        $vendorName = Mage::getModel("vendors/vendor")->load($vendorProduct)->getName();

        return $vendorName;
    }
}