<?php
class Kienpt_BaseBlock_Helper_Layout extends Mage_Core_Helper_Abstract
{

    /*
    *Create a custom Block
    *@param $layoutObj
    *@param $type
    *@param $alias
    *@param $template
    *@param $blockName
    *@param $listChild
    */
    public function createMyBlock($layoutObj,$type = '',$alias = '', $template='',$blockName = '', $listChild = array())
    {
        $block = $layoutObj;
        if($template && $type && $alias)
        {
            $block = $block->createBlock($type,$alias)->setTemplate($template);
        }
        elseif($type && $alias)
        {
            $block = $block->createBlock($type,$alias);
        }

        if($blockName != '')
        {
            $block = $block->setBlockName($blockName);
        }

        if (!empty($listChild))
        {
            foreach($listChild as $child)
            {
                $block = $block->append($child['block'],$child['alias']);
            }
        }
        return  $block;
    }
}