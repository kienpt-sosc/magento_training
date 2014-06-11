<?php
class Kienpt_Vendor_Model_Source_Vendor extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
	public function getAllOptions($withEmpty = true)
    {
        $vendors = Mage::getModel('vendors/vendor')
            ->getCollection()
            ->getData();

        $result = array();

        foreach ($vendors as $vendor) {
            $result[] = array(
                'value' => $vendor['vendor_id'],
                'label' => $vendor['name']
            );
        }

        if ($withEmpty) {
            array_unshift($result, array('label' => '', 'value' => ''));
        }

        return $result;
    }
}