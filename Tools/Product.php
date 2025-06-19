<?php

declare(strict_types=1);

namespace Iranimij\McpServer\Tools;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class Product
{
    public function __construct(private readonly ProductRepositoryInterface $productRepository)
    {
    }

    public function get($productId)
    {
        try {
            $product = $this->productRepository->getById($productId);
            return [
                'id' => $product->getId(),
                'sku' => $product->getSku(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'status' => $product->getStatus(),
                'type_id' => $product->getTypeId(),
            ];
        } catch (NoSuchEntityException $e) {
            return ['error' => 'Product not found'];
        }
    }
}
