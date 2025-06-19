# magento-mcp-server
Magento 2 MCP server

## Iranimij_McpServer
This module provides general MCP features for Magento 2.

### Installation
```bash
composer require iranimij/magento2-mcp-server
```

### Features
- Provides core MCP features for Magento 2.

### Example Usage
// Add usage examples here as the module develops.


https://app.magento.test/rest/V1/iranimij/Product/1


How to define your sever to the AI client : 

`"testServer": {
"command": "npx",
"args": ["@iranimij/magento-mcp-remote-server"],
"env": {
"MAGENTO_API_URL": "https://app.magento.test/"
}
},`



What I have done so far:
1. Created the server 
2. Sent URl varialbe to the server to it knows that which website should it use
3. created the Token API by patch so after installing the module the Token is generated.
4. Now the prompt "get product detail 1" returns data
5. the bundle is generated in the js file.

What should I do:
1. Check the token if it is correct or not, and if the token is correct I can return the data.
2. I edited the token manager and it just creates the token, I can add a get function for getting the token.
