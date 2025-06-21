<?php

declare(strict_types=1);

namespace Iranimij\McpServer\Tools;

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;
use Magento\Framework\App\RequestInterface;

class ProductSearch
{
    public function __construct(
        private readonly ProductCollectionFactory $productCollectionFactory,
        private readonly RequestInterface $request
    ) {
    }

    public function get(): array
    {
        $sku = $this->request->getParam('sku');
        $id = $this->request->getParam('id');
        $name = $this->request->getParam('name');

        if (!$sku && !$id && !$name) {
            return ['error' => 'At least one of sku, id, or name is required'];
        }

        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect(['entity_id', 'sku', 'name', 'price', 'status', 'type_id']);

        if ($sku) {
            $collection->addFieldToFilter('sku', ['eq' => $sku]);
        }
        if ($id) {
            $collection->addFieldToFilter('entity_id', ['eq' => $id]);
        }
        if ($name) {
            $collection->addFieldToFilter('name', ['like' => "%$name%"]);
        }

        $results = [];
        foreach ($collection as $product) {
            $results[] = [
                'id' => $product->getId(),
                'sku' => $product->getSku(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'status' => $product->getStatus(),
                'type_id' => $product->getTypeId(),
            ];
        }

        if (empty($results)) {
            return ['error' => 'No products found'];
        }

        return $results;
    }
}
