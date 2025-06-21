<?php

declare(strict_types=1);

namespace Iranimij\McpServer\Api;

interface ApiManagerInterface
{
    /**
     * Get product details by product ID
     *
     * @param string $name
     * @return array
     */
    public function getToolsResults($name);
}
