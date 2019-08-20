<?php

namespace Custom\CustomWidget\Block\Widget;

use Magento\Catalog\Block\Product\ImageBuilder;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class BlockWrap extends Template implements BlockInterface
{
  /**
   * @var string
   */
  protected $_template = "widget/blockwrap.phtml";

  public function getTitle()
  {
    echo $this->getLayout()->getBlock('page.main.title')->getPageTitle();
  }
}