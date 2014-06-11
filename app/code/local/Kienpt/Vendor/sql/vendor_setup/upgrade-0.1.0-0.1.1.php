<?php
$installer = $this;
$installer->startSetup();

$setup = new Mage_Eav_Model_Entity_Setup('core_setup');

$entityTypeId     = $setup->getEntityTypeId('catalog_product');
$attributeSetId   = $setup->getDefaultAttributeSetId($entityTypeId);
$attributeGroupId = $setup->getDefaultAttributeGroupId($entityTypeId, $attributeSetId);

$setup->addAttribute('catalog_product', "vendor", array(
    'type'                       => 'int',
    'label'                      => 'Vendor Name',
    'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'input'                      => 'select',
    'required'                   => false,
    'user_defined'               => true,
    'filterable'                 => true,
    'comparable'                 => true,
    'is_configurable'            => false,
    'visible_on_front'           => true,
    'visible_in_advanced_search' => true,
    'used_in_product_listing'    => true,
    'source'                     => 'vendors/source_vendor',
    'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE,
));

$setup->addAttributeToGroup(
    $entityTypeId,
    $attributeSetId,
    $attributeGroupId,
    'vendor',
    '999'  //sort_order
);

$setup->endSetup();