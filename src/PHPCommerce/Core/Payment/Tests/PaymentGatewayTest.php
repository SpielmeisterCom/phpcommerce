<?php
namespace PHPCommerce\Core\Payment\Tests;

use PHPCommerce\Core\Payment\Dto\PaymentRequestDTO;
use PHPCommerce\Core\Payment\Service\PaymentGatewayConfigurationServiceProvider;
use PHPUnit_Framework_TestCase;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class PaymentGatewayTest extends PHPUnit_Framework_TestCase {
    /**
     * @var PaymentGatewayConfigurationServiceProvider
     */
    protected $paymentGatewayConfigurationServiceProvider;

    public function setUp() {
        $container   = new ContainerBuilder();
        $loader      = new XmlFileLoader($container, new FileLocator( __DIR__ ));
        $loader->load( 'applicationContext-nullPaymentGateway.xml');

        $this->paymentGatewayConfigurationServiceProvider = $container->get('paymentGatewayConfigurationServiceProvider');
    }

    /**
     * @return PHPCommerce\Core\Payment\Service\PaymentGatewayConfigurationService
     */
    protected function getPaymentGatewayConfigurationServiceUnderTest() {
        $gatewayConfigurationServices = $this->paymentGatewayConfigurationServiceProvider->getGatewayConfigurationServices();
        return $gatewayConfigurationServices[0];
    }

    public function testAtLeastOnePaymentGatewayConfigured() {
        $gatewayConfigurationServices = $this->paymentGatewayConfigurationServiceProvider->getGatewayConfigurationServices();
        $this->assertGreaterThan(0, count($gatewayConfigurationServices));
    }

    public function testAuthorize() {
        $service = $this->getPaymentGatewayConfigurationServiceUnderTest();
        $this->assertTrue($service->getConfiguration()->handlesAuthorize());

        $transactionService = $service->getTransactionService();

        $requestDto = new PaymentRequestDTO();

        $responseDto = $transactionService->authorize($requestDto);
    }

    /**
     * @depends testAtLeastOnePaymentGatewayConfigured
     */
    public function testRefund() {
    }
}