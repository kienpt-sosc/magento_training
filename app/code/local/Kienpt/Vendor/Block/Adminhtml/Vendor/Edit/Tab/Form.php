<?php
class Kienpt_Vendor_Block_Adminhtml_Vendor_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset(
            'vendor_form', 
            array(
                'legend'=>Mage::helper('vendor')->__('Vendor information')
            )
        );
       
        $fieldset->addField('name', 'text', array(
            'label'     => Mage::helper('vendor')->__('Name'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'name',
        ));

        $fieldset->addField('email', 'text', array(
            'label'     => Mage::helper('vendor')->__('Email'),
            'class'     => 'required-entry email',
            'required'  => true,
            'name'      => 'email',
        ));

        $fieldset->addField('contact', 'text', array(
            'label'     => Mage::helper('vendor')->__('Contact'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'contact',
        ));

        $fieldset->addField('address', 'text', array(
            'label'     => Mage::helper('vendor')->__('Address'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'address',
        ));

        // $fieldset->addField('url_image', 'image', array(
        //     'label'     => Mage::helper('vendor')->__('Image'),
        //     'class'     => 'required-entry',
        //     'required'  => true,
        //     'name'      => 'url_image',
        // ));

        $fieldset->addField('description', 'textarea', array(
            'label'     => Mage::helper('vendor')->__('Description'),
            'required'  => true,
            'name'      => 'description',
        ));
        
        if ( Mage::getSingleton('adminhtml/session')->getbannermanagerData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getvendorData());
            Mage::getSingleton('adminhtml/session')->setvendorData(null);
        } elseif ( Mage::registry('vendor_data') ) {
            $form->setValues(Mage::registry('vendor_data')->getData());
        }
        return parent::_prepareForm();
    }
}