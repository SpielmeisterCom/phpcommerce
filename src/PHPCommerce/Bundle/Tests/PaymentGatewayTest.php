<?php
namespace PHPCommerce\Bundle\Tests;

use PHPCommerce\Payment\Dto\PaymentRequestDTO;
use PHPCommerce\Payment\Service\PaymentGatewayConfigurationServiceProvider;
use PHPUnit_Framework_TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class PaymentGatewayTest extends KernelTestCase {
    /**
     * @var PaymentGatewayConfigurationServiceProvider
     */
    protected $paymentGatewayConfigurationServiceProvider;

    public function setUp() {
        self::bootKernel();
        $this->paymentGatewayConfigurationServiceProvider = static::$kernel->getContainer()->get('phpcommerce.payment.gateway.configuration_service_provider');
    }

    public function testNoPaymentConfigured() {
        $gatewayConfigurationServices = $this->paymentGatewayConfigurationServiceProvider->getGatewayConfigurationServices();
        $this->assertEquals(0, count($gatewayConfigurationServices));
    }
}