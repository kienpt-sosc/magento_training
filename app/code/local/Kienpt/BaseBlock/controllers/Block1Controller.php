<?php
class Kienpt_BaseBlock_Block1Controller extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $layoutObj = $this->loadLayout();
        $blocktemp = $layoutObj->getLayout();

        $header = Mage::helper('baseblock/layout')->createMyBlock($blocktemp,'baseblock/header','header');
        $footer = Mage::helper('baseblock/layout')->createMyBlock($blocktemp,'baseblock/footer','footer');
        $left_column = Mage::helper('baseblock/layout')->createMyBlock($blocktemp,'core/text_list','left_column');
        $content = Mage::helper('baseblock/layout')->createMyBlock($blocktemp,'core/text_list','content');
        $right_column = Mage::helper('baseblock/layout')->createMyBlock($blocktemp,'core/text_list','right_column');
        $blockA = Mage::helper('baseblock/layout')->createMyBlock($blocktemp,'core/template','block-a','baseblock/block/block.phtml','Block A');
        $blockB = Mage::helper('baseblock/layout')->createMyBlock($blocktemp,'core/template','block-b','baseblock/block/block.phtml','Block B');
        $blockC = Mage::helper('baseblock/layout')->createMyBlock($blocktemp,'core/template','block-c','baseblock/block/block.phtml','Block C');
        $blockD = Mage::helper('baseblock/layout')->createMyBlock($blocktemp,'core/template','block-d','baseblock/block/block.phtml','Block D');

        $content->append($blockA)->append($blockB);
        $left_column->append($blockC);
        $right_column->append($blockD);

        $listChild = array(
            array('block'=>$header,'alias'=>'header'),
            array('block'=>$left_column,'alias'=>'left_colum'),
            array('block'=>$content,'alias'=>'content'),
            array('block'=>$right_column,'alias'=>'right_colum'),
            array('block'=>$footer,'alias'=>'footer')
        );

        $block = Mage::helper('baseblock/layout')->createMyBlock($blocktemp,'baseblock/page','page','baseblock/page/page-1.phtml','',$listChild);
        echo $block->toHtml();
    }
}