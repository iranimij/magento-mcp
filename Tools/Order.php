<?php

namespace Iranimij\McpServer\Tools;

use Magento\Sales\Model\ResourceModel\Order\CollectionFactory as OrderCollectionFactory;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;

class Order
{
    private OrderCollectionFactory $orderCollectionFactory;
    private TimezoneInterface $timezone;

    public function __construct(
        OrderCollectionFactory $orderCollectionFactory,
        TimezoneInterface $timezone
    ) {
        $this->orderCollectionFactory = $orderCollectionFactory;
        $this->timezone = $timezone;
    }

    public function get(): array
    {
        $today = $this->timezone->date()->format('Y-m-d');
        $start = $today . ' 00:00:00';
        $end = $today . ' 23:59:59';

        $collection = $this->orderCollectionFactory->create();
        $collection->addFieldToFilter('created_at', ['from' => $start, 'to' => $end]);

        $orders = [];
        foreach ($collection as $order) {
            // Customer details
            $customer = [
                'id' => $order->getCustomerId(),
                'email' => $order->getCustomerEmail(),
                'firstname' => $order->getCustomerFirstname(),
                'lastname' => $order->getCustomerLastname(),
                'group_id' => $order->getCustomerGroupId(),
            ];

            // Billing address
            $billing = null;
            if ($order->getBillingAddress()) {
                $billing = [
                    'firstname' => $order->getBillingAddress()->getFirstname(),
                    'lastname' => $order->getBillingAddress()->getLastname(),
                    'street' => $order->getBillingAddress()->getStreet(),
                    'city' => $order->getBillingAddress()->getCity(),
                    'postcode' => $order->getBillingAddress()->getPostcode(),
                    'country_id' => $order->getBillingAddress()->getCountryId(),
                    'telephone' => $order->getBillingAddress()->getTelephone(),
                ];
            }

            // Shipping address
            $shipping = null;
            if ($order->getShippingAddress()) {
                $shipping = [
                    'firstname' => $order->getShippingAddress()->getFirstname(),
                    'lastname' => $order->getShippingAddress()->getLastname(),
                    'street' => $order->getShippingAddress()->getStreet(),
                    'city' => $order->getShippingAddress()->getCity(),
                    'postcode' => $order->getShippingAddress()->getPostcode(),
                    'country_id' => $order->getShippingAddress()->getCountryId(),
                    'telephone' => $order->getShippingAddress()->getTelephone(),
                ];
            }

            // Order items
            $items = [];
            foreach ($order->getAllVisibleItems() as $item) {
                $items[] = [
                    'item_id' => $item->getItemId(),
                    'product_id' => $item->getProductId(),
                    'sku' => $item->getSku(),
                    'name' => $item->getName(),
                    'qty_ordered' => $item->getQtyOrdered(),
                    'price' => $item->getPrice(),
                    'price_incl_tax' => $item->getPriceInclTax(),
                    'row_total' => $item->getRowTotal(),
                    'row_total_incl_tax' => $item->getRowTotalInclTax(),
                    'tax_amount' => $item->getTaxAmount(),
                    'discount_amount' => $item->getDiscountAmount(),
                ];
            }

            $orders[] = [
                'id' => $order->getId(),
                'increment_id' => $order->getIncrementId(),
                'created_at' => $order->getCreatedAt(),
                'status' => $order->getStatus(),
                'grand_total' => $order->getGrandTotal(),
                'subtotal' => $order->getSubtotal(),
                'tax_amount' => $order->getTaxAmount(),
                'shipping_amount' => $order->getShippingAmount(),
                'discount_amount' => $order->getDiscountAmount(),
                'currency_code' => $order->getOrderCurrencyCode(),
                'customer' => $customer,
                'billing_address' => $billing,
                'shipping_address' => $shipping,
                'items' => $items,
            ];
        }
        return $orders;
    }
}
