<?php
namespace PHPCommerce\ERP\Service;

use PHPCommerce\ERP\Dao\OrderDaoInterface;
use PHPCommerce\ERP\Domain\NullOrderFactoryInterface;

class OrderServiceImpl implements OrderServiceInterface
{
    /**
     * @var OrderDaoInterface
     */
    protected $orderDao;

    /**
     * @var NullOrderFactoryInterface
     */
    protected $nullOrderFactory;

    public function __construct(
        OrderDaoInterface $orderDao,
        NullOrderFactoryInterface $nullOrderFactoryInterface
    )
    {
        $this->orderDao = $orderDao;
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