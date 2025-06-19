<?php

declare(strict_types=1);

namespace Iranimij\McpServer\Model;

use Magento\Framework\ObjectManagerInterface;

class ToolFactory
{
    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    public function __construct(ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Create a tool class instance by name
     *
     * @param string $toolClass Class name (e.g., 'ProductDetails')
     * @return object
     */
    public function create(string $toolClass): object
    {
        $fqcn = 'Iranimij\\McpServer\\Tools\\' . $toolClass;
        return $this->objectManager->create($fqcn);
    }
}
