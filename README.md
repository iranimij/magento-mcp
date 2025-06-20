# magento-mcp-server
Magento 2 MCP server

## Iranimij_McpServer
This module provides general MCP features for Magento 2.

### Installation
```bash
composer require iranimij/magento-mcp
```

### Features
- Sends products details based on the product ID.
- ...

### Example prompts
1. send product detail 1


### AI client configuration (Cursor, Claude desktop, etc.)

```json
"testServer": {
  "command": "npx",
  "args": ["@iranimij/magento-mcp-remote-server"],
  "env": {
    "MAGENTO_API_URL": "https://app.magento.test/"
  }
},
```

Make sure to put your magento URL in `MAGENTO_API_URL`.


Future useful prompts:
- Send client names
- Send client addresses
- Send order details
- Send order items
- Send order totals
- Send order shipping details
- Send order payment details
- Send order status
- Send order history
- create order
- create admin
- create product
- create category
- create customer
- Send blog posts

### The remote server
This modules remote server https://github.com/iranimij/mcp-node-server works with this module to provide a remote MCP server for Magento 2. It is designed to work with the [Model Context Protocol (MCP)](https://modelcontextprotocol.org/) and provides a CLI server that exposes tools for demonstration and fetching product details from a Magento backend.
