<?php
class Kienpt_Vendor_Block_Adminhtml_Vendor_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function _construct()
	{
		parent::_construct();
		$this->setId('vendorGrid');
		$this->setDefaultSort('vendor_id');
		$this->setDefaultDir('ASC');
		$this->setSaveParametersInSession(true);
		$this->setUseAjax(true);
	}

	/**
     * lay ra collection can hien thi len grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('vendors/vendor')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

	/*
	*Lấy ra collection can hiển thị lên grid
	*/

	public function _prepareColumns()
	{
		$this->addColumn('vendor_id',array(
			'header' => Mage::helper('vendor')->__('ID'),
			'align' => 'right',
			'width' => '50px',
			'index' => 'vendor_id',
			));

		$this->addColumn('name',array(
			'header' => Mage::helper('vendor')->__('Name'),
			'align' => 'left',
			'index' => 'name',
			));

		$this->addColumn('email',array(
			'header' => Mage::helper('vendor')->__('Email'),
			'align' => 'left',
			'index' => 'email',
			));
		$this->addColumn('address',array(
			'header' => Mage::helper('vendor')->__('Address'),
			'align' => 'center',
			'index' => 'address',
			));
		$this->addColumn('contact',array(
			'header' => Mage::helper('vendor')->__('Contact'),
			'align' => 'right',
			'index' => 'contact',
			));
		$this->addColumn('description',array(
			'header' => Mage::helper('vendor')->__('Description'),
			'align' => 'center',
			'index' => 'description',
			));

		return parent::_prepareColumns();
	}

	/**
     * Prepare grid massaction actions
     *
     * 
     */
    protected function _prepareMassaction()
    {
    	$this->setMassactionIdField('vendor_id');
        $this->getMassactionBlock()->setFormFieldName('list_vendor');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => 'Delete',
            'url' => $this->getUrl('*/*/deleteSelected'),
            'confirm' => 'Are you sure?'
        ));
        return $this;
    }

	/*
	*Hàm trả lại url cho mỗi row trong grid
	*/
	public function getRowUrl($row)
	{
        return $this->getUrl(
            'vendor_manager/adminhtml_vendor/edit',
            array(
                'id' => $row->getId()
            )
        );
	}

	public function getGridUrl($row)
	{
		return $this->getUrl('*/*/gridVendor', array('_current'=>true));
	}
}