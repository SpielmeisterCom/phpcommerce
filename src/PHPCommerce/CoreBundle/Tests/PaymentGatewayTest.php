<?php
namespace PHPCommerce\Payment\Tests;

use PHPCommerce\Payment\Dto\PaymentRequestDTO;
use PHPCommerce\Payment\Service\PaymentGatewayConfigurationServiceProvider;
use PHPUnit_Framework_TestCase;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class PaymentGatewayTest extends PHPUnit_Framework_TestCase {
    /**
     * @var PaymentGatewayConfigurationServiceProvider
     */
    protected $paymentGatewayConfigurationServiceProvider;

    public function setUp() {
        $container   = new ContainerBuilder();
        $loader      = new YamlFileLoader($container, new FileLocator(array(__DIR__ . "/../Resources/config")));
        $loader->load( 'config.yml');

        $this->paymentGatewayConfigurationServiceProvider = $container->get('phpcommerce.payment.gateway.configuration_service_provider');
    }

    public function testNoPaymentConfigured() {
        $gatewayConfigurationServices = $this->paymentGatewayConfigurationServiceProvider->getGatewayConfigurationServices();
        $this->assertEquals(0, count($gatewayConfigurationServices));
    }
}