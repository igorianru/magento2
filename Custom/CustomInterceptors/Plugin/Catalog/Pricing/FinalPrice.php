<?php

namespace Custom\CustomInterceptors\Plugin\Catalog\Pricing;

/**
 * Class FinalPrice.
 *
 * @package Custom\CustomInterceptors\Plugin\Catalog\Pricing
 */
class FinalPrice
{
  /**
   * @param \Magento\Catalog\Pricing\Price\FinalPrice $subject
   * @param \Magento\CatalogWidget\Block\Product\ProductsList $subject
   * @param                                           $result
   * @return float
   */
  public function afterGetValue(\Magento\Catalog\Pricing\Price\FinalPrice $subject, $result)
  {
    return $result + $result * 0.10;
  }
}