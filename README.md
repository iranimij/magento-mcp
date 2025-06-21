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

## Tools Provided

### 1. `get-product-details`
Fetches product details for a given product ID from the Magento API.

example prompt: get product details 1

**Parameters:**
- `productId` (string): The product ID to fetch details for.

### 2. `get-todays-orders`
Fetches all orders placed today from the Magento API. This tool doesn't require any parameters.

example prompt: get todays orders

### 3. `create-customer`
Creates a new customer in Magento.

**Parameters:**
- `customer` (object): An object containing the customer's details.
    - `email` (string): The customer's email address.
    - `firstname` (string): The customer's first name.
    - `lastname` (string): The customer's last name.
    - `addresses` (array, optional): A list of customer addresses.
- `password` (string): The customer's password.

example prompt: create a new customer

### 4. `create-simple-product`
Creates a new simple product in Magento.

example prompt: create a new simple product

**Parameters:**
- `product` (object): An object containing the product's details.
    - `sku` (string): The product's SKU.
    - `name` (string): The product's name.
    - `price` (number): The product's price.
    - `attribute_set_id` (number): The attribute set ID for the product.
    - `status` (number): The product's status (e.g., 1 for enabled).
    - `visibility` (number): The product's visibility (e.g., 4 for catalog, search).
    - `type_id` (string): Must be set to "simple".

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
