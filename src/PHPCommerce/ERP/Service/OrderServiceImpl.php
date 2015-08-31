<?php
namespace PHPCommerce\ERP\Service;

use PHPCommerce\ERP\Entity\OrderInterface;

class OrderServiceImpl implements OrderService
{
    /**
     * Looks up an Order by its database id
     *
     * @param orderId
     * @return OrderInterface the requested Order
     */
    public function findOrderById($orderId)
    {
        throw new \Exception("not implemented");
    }
}