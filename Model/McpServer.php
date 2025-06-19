<?php

declare(strict_types=1);

namespace Iranimij\McpServer\Model;

use PhpMcp\Server\Server;
use PhpMcp\Server\Transports\HttpServerTransport;

class McpServer
{
    public function execute()
    {
        $server = Server::make()
            ->withServerInfo('My Discovery Server', '1.0.2')
            ->build();

        // 2. **Explicitly run discovery**
        $server->discover(
            __DIR__,
            ['.'],
        );

        // 3. Create the Stdio Transport
        $transport = new HttpServerTransport(
            '127.0.0.1',   // Listen on all interfaces
            8080,          // Port to listen on
            'mcp' // Base path for endpoints (/mcp/sse, /mcp/message)
        // sslContext: [...] // Optional: ReactPHP socket context for HTTPS
        );

        // 4. Start Listening (BLOCKING call)
        $server->listen($transport);

        exit(0);
    }
}
