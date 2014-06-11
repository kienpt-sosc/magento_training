<?php 
class Kienpt_Vendor_Block_Adminhtml_Template_Grid_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        return $this->_getValue($row);
    } 
    protected function _getValue(Varien_Object $row)
    {
        $product = Mage::getModel("catalog/product")->load($row->getEntityId());

        $val = str_replace("no_selection", "", $product->getThumbnail());
        $url = Mage::getBaseUrl('media') . 'catalog/product' . $val; 
        $out = "<img src=". $url ." width='60px' alt='no image'/>"; 
        return $out;
    }
}