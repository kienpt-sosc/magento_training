<?php
class Kienpt_BaseBlock_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $layoutObject = $this->loadLayout();
        $header = $layoutObject->getLayout()
                    ->createBlock('baseblock/page','header')
                    ->setTemplate('baseblock/page/header.phtml');
        $footer = $layoutObject->getLayout()
                    ->createBlock('baseblock/page','footer')
                    ->setTemplate('baseblock/page/footer.phtml');

        $left_colum = $layoutObject->getLayout()
                        ->createBlock('core/text_list','left_colum');

        $content = $layoutObject->getLayout()
                        ->createBlock('core/text_list','content');
        $right_colum = $layoutObject->getLayout()                        
                        ->createBlock('core/text_list','right_colum');

        $blockA = $layoutObject->getLayout()
                    ->createBlock('core/template','block-a')
                    ->setTemplate('baseblock/block/block.phtml')
                    ->setBlockName('Block A');

        $blockB = $layoutObject->getLayout()
                    ->createBlock('core/template','block-b')
                    ->setTemplate('baseblock/block/block.phtml')
                    ->setBlockName('Block B');

        $blockC = $layoutObject->getLayout()
                    ->createBlock('core/template','block-c')
                    ->setTemplate('baseblock/block/block.phtml')
                    ->setBlockName('Block C');

        $blockD = $layoutObject->getLayout()
                    ->createBlock('core/template','block-d')
                    ->setTemplate('baseblock/block/block.phtml')
                    ->setBlockName('Block D');

        $content->append($blockA);
        $content->append($blockB);

        $left_colum->append($blockC);

        $right_colum->append($blockD);

        $block = $layoutObject->getLayout()
                    ->createBlock('baseblock/page')
                    ->append($header,'header')
                    ->append($left_colum,'left_colum')
                    ->append($content,'content')
                    ->append($right_colum,'right_colum')
                    ->append($footer,'footer');

        echo $block->toHtml();
    }
}