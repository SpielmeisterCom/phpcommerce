<?php
namespace PHPCommerce\Payment\Tests;

use Doctrine\Common\Persistence\ObjectRepository;
use PHPCommerce\Payment\Entity\OrderPayment;
use PHPCommerce\Payment\PaymentType;
use PHPUnit_Framework_TestCase;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Bundle\FrameworkBundle\Console\Application;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


use PHPCommerce\Bundle\Tests\AbstractDoctrineTest;
use PHPCommerce\ERP\Entity\Order;

class PaymentEntitiesTest extends AbstractDoctrineTest
{
    public function testOrderPayment()
    {
        $order = new Order();
        $this->em->persist($order);

        $orderpayment = new OrderPayment();
        $orderpayment->setOrder($order);
        $orderpayment->setType(PaymentType::$BANK_ACCOUNT);

        $this->em->persist($orderpayment);

        $orderpayment2 = new OrderPayment();
        $orderpayment2->setOrder($order);
        $orderpayment2->setType(PaymentType::$CREDIT_CARD);

        $this->em->persist($orderpayment2);

        $this->em->flush();

        /** @var ObjectRepository  $orderpaymentRepository */
        $orderpaymentRepository = $this->em->getRepository('PHPCommerce\Payment\Entity\OrderPayment');
        $orderpayments = $orderpaymentRepository->findAll();

        $this->assertCount(2, $orderpayments);

        $orderRepository = $this->em->getRepository('PHPCommerce\ERP\Entity\Order');
        $orders = $orderRepository->findAll();
        $this->assertCount(1, $orders);

        $payments = $orders[0]->getPayments();
        $this->assertCount(2, $payments);
    }

    public function testPaymentType() {
        $order = new Order();
        $this->em->persist($order);

        $orderpayment = new OrderPayment();
        $orderpayment->setOrder($order);
        $orderpayment->setType(PaymentType::$BANK_ACCOUNT);

        $this->em->persist($orderpayment);

        $orderpayment2 = new OrderPayment();
        $orderpayment2->setOrder($order);
        $orderpayment2->setType(PaymentType::$CREDIT_CARD);

        $this->em->persist($orderpayment2);

        $this->em->flush();

        $orderRepository = $this->em->getRepository('PHPCommerce\Payment\Entity\OrderPayment');
        $orderPayment = $orderRepository->findOneBy(['type' => PaymentType::$BANK_ACCOUNT]);

        $this->assertNotNull($orderPayment);
        $this->assertTrue(PaymentType::$BANK_ACCOUNT->equals($orderPayment->getType()));

        $orderPayment = $orderRepository->findOneBy(['type' => PaymentType::$COD]);
        $this->assertNull($orderPayment);
    }
}

