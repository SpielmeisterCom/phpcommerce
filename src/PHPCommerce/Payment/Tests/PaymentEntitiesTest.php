<?php
namespace PHPCommerce\Payment\Tests;

use Doctrine\Common\Persistence\ObjectRepository;
use PHPCommerce\Payment\Entity\OrderPayment;
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
    public function testOrderPayment() {
        $orderpayment = new OrderPayment();
        $this->em->persist($orderpayment);
        $this->em->flush();

        /** @var ObjectRepository $orderpaymentRepository */
        $orderpaymentRepository = $this->em->getRepository('PHPCommerce\Payment\Entity\OrderPayment');

        $orderpayments = $orderpaymentRepository->findAll();

        $this->assertCount(1, $orderpayments);
    }
}

