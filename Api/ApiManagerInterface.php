<?php

declare(strict_types=1);

namespace Iranimij\McpServer\Api;

interface ApiManagerInterface
{
    /**
     * Get product details by product ID
     *
     * @param string $name
     * @param int $params
     * @return array
     */
    public function getToolsResults($name, $params);
}
