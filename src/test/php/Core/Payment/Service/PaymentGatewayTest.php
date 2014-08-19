<?php
namespace PegasusCommerce\Core\Payment\Service;

use PegasusCommerce\Common\Payment\Dto\PaymentRequestDTO;
use PegasusCommerce\Common\Payment\Service\PaymentGatewayConfigurationServiceProvider;
use PHPUnit_Framework_TestCase;

class PaymentGatewayTest extends PHPUnit_Framework_TestCase {
    /**
     * @var PaymentGatewayConfigurationServiceProvider
     */
    protected $paymentGatewayConfigurationServiceProvider;

    public function setUp() {
        $this->paymentGatewayConfigurationServiceProvider = \Registry::getObj('paymentGatewayConfigurationServiceProvider');
    }

    /**
     * @return \PegasusCommerce\Common\Payment\Service\PaymentGatewayConfigurationService
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
        $service = $this->getPaymentGatewayConfigurationServiceUnderTest();
        $this->assertTrue($service->getConfiguration()->handlesRefund());

    }
}