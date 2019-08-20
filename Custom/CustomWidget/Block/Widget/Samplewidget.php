<?php

namespace Custom\CustomWidget\Block\Widget;

use Magento\Catalog\Block\Product\ImageBuilder;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Samplewidget extends Template implements BlockInterface
{
  /**
   * @var \Magento\Catalog\Model\ProductRepository
   */
  protected $_productRepository;

  /**
   * @var string
   */
  protected $_template = "widget/samplewidget.phtml";

  /**
   * @var \Magento\Catalog\Model\Layer\Resolver
   */
  protected $layerResolver;

  /**
   * @var \Magento\Framework\View\Result\PageFactory
   */
  protected $pageFactory;

  /**
   * @var ImageBuilder
   * @since 102.0.0
   */
  protected $imageBuilder;

  public function __construct(
    Template\Context $context,
    \Magento\Catalog\Block\Product\Context $ProductContext,
    \Magento\Catalog\Model\ProductRepository $productRepository,
    array $data = [],
    \Magento\Framework\View\Result\PageFactory $pageFactory,
    \Magento\Catalog\Model\Layer\Resolver $layerResolver
  ) {

    ini_set("display_errors", 1);
    error_reporting(E_ALL);


    $this->layerResolver      = $layerResolver;
    $this->pageFactory        = $pageFactory;
    $this->_productRepository = $productRepository;


    $this->imageBuilder = $ProductContext->getImageBuilder();

    parent::__construct($context, $data);
  }

  /**
   * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
   */
  public function getProductCollection()
  {
    $collection = $this->layerResolver->get()->getProductCollection()
      ->addAttributeToFilter(
        [
          ['attribute' => 'style_bags', 'eq' => 24],
        ]
      );

    return $collection;
  }

  /**
   * @param       $product
   * @param       $imageId
   * @param array $attributes
   * @return \Magento\Catalog\Block\Product\Image
   */
  public function getImage($product, $imageId, $attributes = [])
  {
    return $this->imageBuilder->create($product, $imageId, $attributes);
  }
}