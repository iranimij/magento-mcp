<?php

declare(strict_types=1);

namespace Iranimij\McpServer\Model;

use Iranimij\McpServer\Api\ApiManagerInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Iranimij\McpServer\Model\ToolFactory;

class ApiManager implements ApiManagerInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    private $toolFactory;

    public function __construct(ProductRepositoryInterface $productRepository, ToolFactory $toolFactory)
    {
        $this->productRepository = $productRepository;
        $this->toolFactory = $toolFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getToolsResults($name)
    {
        $tool = $this->toolFactory->create($name);
        return $tool->get();
    }
}
