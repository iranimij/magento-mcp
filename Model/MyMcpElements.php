<?php

declare(strict_types=1);

namespace Iranimij\McpServer\Model;

class MyMcpElements
{
    /**
     * Adds two numbers together.
     * @param int $a The first number.
     * @param int $b The second number.
     * @return int The sum.
     */
    #[McpTool(name: 'simple_adder')]
    public function add(int $a, int $b): int
    {
        fwrite(STDERR, "Executing simple_adder with a=$a, b=$b\n");
        return $a + $b;
    }
}
