<?php
namespace PHPCommerce\ERP\Service;

use PHPCommerce\ERP\Domain\NullOrderFactoryInterface;

class OrderServiceImpl implements OrderServiceInterface
{
    /**
     * @var NullOrderFactoryInterface
     */
    protected $nullOrderFactory;

    public function __construct(NullOrderFactoryInterface $nullOrderFactoryInterface)
    {
        $this->nullOrderFactory = $nullOrderFactoryInterface;
    }

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