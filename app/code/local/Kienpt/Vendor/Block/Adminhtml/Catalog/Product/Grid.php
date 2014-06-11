<?php 
class Kienpt_Vendor_Block_Adminhtml_Catalog_Product_Grid extends Mage_Adminhtml_Block_Catalog_Product_Grid
{
    protected function _prepareColumns()
    {
        $vendors = Mage::getModel("vendors/vendor")->getCollection()->getData();
        $vendorOption = array();
        foreach ($vendors as $vendor) {
            $vendorOption[$vendor['vendor_id']] = $vendor['name'];
        }

        $this->addColumn('image', array(
            'header' => Mage::helper('catalog')->__('Image'),
            'align' => 'left',
            'index' => 'image',
            'width'     => '70',
            'filter'    => false,
            'renderer' => 'Kienpt_Vendor_Block_Adminhtml_Template_Grid_Renderer_Image'
        ));

        $this->addColumn('vendor', array(
            'header' => Mage::helper('vendor')->__('Vendor'),
            'align' => 'left',
            'index' => 'vendor',
            'width' => '70',
            'type'  => "options",
            "options" => $vendorOption,
            'renderer' => 'Kienpt_Vendor_Block_Adminhtml_Template_Grid_Renderer_Vendor'
        )); 
        return parent::_prepareColumns();
    }
}