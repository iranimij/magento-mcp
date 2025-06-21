<?php

declare(strict_types=1);

namespace Iranimij\McpServer\Tools;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\App\RequestInterface;

class Product
{
    public function __construct(
        private readonly ProductRepositoryInterface $productRepository,
        private readonly RequestInterface $request
    ) {
    }

    public function get()
    {
        $productId = $this->request->getParam('productId');
        if (!$productId) {
            return ['error' => 'Product ID is required'];
        }
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
