<?php
namespace PHPCommerce\Payment\Tests;

use DateTime;
use Doctrine\Common\Persistence\ObjectRepository;
use PHPCommerce\Payment\Entity\Payment;
use PHPCommerce\Payment\Entity\PaymentTransaction;
use PHPCommerce\Payment\PaymentTransactionType;
use PHPCommerce\Payment\PaymentType;
use PHPCommerce\Payment\PaymentGatewayType;
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
    public function testPayment()
    {
        $order = new Order();

        $payment = new Payment();
        $payment->setOrder($order);
        $payment->setType(PaymentType::$BANK_ACCOUNT);
        $payment->setGatewayType(PaymentGatewayType::$TEMPORARY);

        $this->em->persist($payment);

        $payment2 = new Payment();
        $payment2->setOrder($order);
        $payment2->setType(PaymentType::$CREDIT_CARD);
        $payment2->setGatewayType(PaymentGatewayType::$TEMPORARY);

        $this->em->persist($payment2);

        $this->em->flush();

        /** @var ObjectRepository  $orderpaymentRepository */
        $orderpaymentRepository = $this->em->getRepository('PHPCommerce\Payment\Entity\Payment');
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

        $orderpayment = new Payment();
        $orderpayment->setOrder($order);
        $orderpayment->setType(PaymentType::$BANK_ACCOUNT);
        $orderpayment->setGatewayType(PaymentGatewayType::$TEMPORARY);

        $this->em->persist($orderpayment);

        $orderpayment2 = new Payment();
        $orderpayment2->setOrder($order);
        $orderpayment2->setType(PaymentType::$CREDIT_CARD);
        $orderpayment2->setGatewayType(PaymentGatewayType::$TEMPORARY);

        $this->em->persist($orderpayment2);

        $this->em->flush();

        $orderPaymentRepository = $this->em->getRepository('PHPCommerce\Payment\Entity\Payment');
        $orderPayment = $orderPaymentRepository->findOneBy(['type' => PaymentType::$BANK_ACCOUNT]);

        $this->assertNotNull($orderPayment);
        $this->assertTrue(PaymentType::$BANK_ACCOUNT->equals($orderPayment->getType()));

        $orderPayment = $orderPaymentRepository->findOneBy(['type' => PaymentType::$COD]);
        $this->assertNull($orderPayment);
    }

    public function testTransactions() {
        $order = new Order();

        $orderpayment = new Payment();
        $orderpayment->setOrder($order);
        $orderpayment->setType(PaymentType::$BANK_ACCOUNT);
        $orderpayment->setGatewayType(PaymentGatewayType::$TEMPORARY);

        $trx = new PaymentTransaction();

        $trx
            ->setType(PaymentTransactionType::$AUTHORIZE)
            ->setDate(new DateTime())
            ->setCustomerIpAddress("127.0.0.1");

        $orderpayment->addTransaction($trx);

        $trx2 = new PaymentTransaction();

        $trx2
            ->setType(PaymentTransactionType::$AUTHORIZE_AND_CAPTURE)
            ->setDate(new DateTime())
            ->setCustomerIpAddress("127.0.0.1");

        $orderpayment->addTransaction($trx2);

        $this->em->persist($orderpayment);

        $this->em->flush();

        $orderPaymentRepository = $this->em->getRepository('PHPCommerce\Payment\Entity\Payment');

        $orderPayments = $orderPaymentRepository->findAll();
        $this->assertCount(1, $orderPayments);

        $this->assertCount(2, $orderPayments[0]->getTransactions());

    }
}

