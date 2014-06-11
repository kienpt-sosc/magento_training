<?php
class Kienpt_Vendor_Block_Adminhtml_Vendor extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function _construct()
  {
    $this->_controller = 'adminhtml_vendor';
    $this->_blockGroup = 'vendor';
    $this->_headerText = Mage::helper('vendor')->__('Quản lý Vendor');
    $this->_addButtonLabel = Mage::helper('vendor')->__('Add new Vendor');
    parent::_construct();
    // $this->_removeButton('add');
  }
}