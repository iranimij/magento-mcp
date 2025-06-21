# magento-mcp-server
Magento 2 MCP server

## Iranimij_McpServer
This module provides general MCP features for Magento 2.

### Installation
```bash
composer require iranimij/magento-mcp
```

## Tools

This server exposes the following tools. Click each tool for detailed documentation:

- [get-product-details](https://github.com/iranimij/magento-mcp-node-server/blob/main/docs/get-product-details.md): Fetch product details for a given product ID from the Magento API.
- [get-todays-orders](https://github.com/iranimij/magento-mcp-node-server/blob/main/docs/get-todays-orders.md): Fetch all orders placed today from the Magento API.
- [create-customer](https://github.com/iranimij/magento-mcp-node-server/blob/main/docs/create-customer.md): Create a new customer in Magento.
- [create-simple-product](https://github.com/iranimij/magento-mcp-node-server/blob/main/docs/create-simple-product.md): Create a new simple product in Magento.
- [search-product-details](https://github.com/iranimij/magento-mcp-node-server/blob/main/docs/search-product-details.md): Search for product details by SKU, name, or ID from the Magento API.

---

### Example Output

Below is an example output for a product search using the `search-product-details` tool:

![Example product search output](https://github.com/iranimij/magento-mcp-node-server/blob/main/docs/search-product-name.png?raw=true)

### AI client configuration (Cursor, etc.)

```json
"testServer": {
  "command": "npx",
  "args": ["@iranimij/magento-mcp-remote-server"],
  "env": {
    "MAGENTO_API_URL": "https://app.magento.test/",
    "MAGENTO_ADMIN_USERNAME": "admin",
    "MAGENTO_ADMIN_PASSWORD": "admin1234"
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
