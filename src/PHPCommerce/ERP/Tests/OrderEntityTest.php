<?php
namespace PHPCommerce\ERP\Tests;

use PHPCommerce\Bundle\Tests\AbstractDoctrineTest;
use PHPCommerce\ERP\Entity\Order;
use PHPCommerce\ERP\Entity\OrderInterface;

class OrderTest extends AbstractDoctrineTest
{
    public function testOrderCreation()
    {
        $order = new Order();
        $this->em->persist($order);
        $this->em->flush();

        /** @var ObjectRepository  $orderRepository */
        $orderRepository = $this->em->getRepository('PHPCommerce\ERP\Entity\Order');

        $orders = $orderRepository->findAll();

        $this->assertCount(1, $orders);
    }
}