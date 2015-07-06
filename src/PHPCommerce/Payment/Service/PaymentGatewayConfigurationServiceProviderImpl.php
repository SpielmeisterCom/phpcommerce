<?php
namespace PHPCommerce\Payment\Service;
use PHPCommerce\Payment\PaymentGatewayType;

class PaymentGatewayConfigurationServiceProviderImpl implements PaymentGatewayConfigurationServiceProvider {
    /**
     * @var PaymentGatewayConfigurationService[]
     */
    protected $gatewayConfigurationServices;

    public function __construct() {
        $this->gatewayConfigurationServices = array();
    }

    /**
     * @param PaymentGatewayConfigurationService $gatewayConfigurationService
     */
    public function addGatewayConfigurationService(PaymentGatewayConfigurationService $gatewayConfigurationService) {
        $this->gatewayConfigurationServices[] = $gatewayConfigurationService;
    }

    /**
     * <p>Returns the first {@link PaymentGatewayConfigurationService} that matches the given {@link PaymentGatewayType}. Useful when
     * you need a particular {@link PaymentGatewayConfigurationService} to communicate in different ways to a payment gateway.</p>
     *
     * @param PaymentGatewayType $gatewayType
     * @throws Exception
     * @return PaymentGatewayConfigurationService
     */
    public function getGatewayConfigurationService(PaymentGatewayType $gatewayType)
    {
        foreach ($this->getGatewayConfigurationServices() as $config) {
            if ($config->getConfiguration()->getGatewayType()->equals($gatewayType)) {
                return $config;
            }
        }

        throw new \Exception("There is no gateway configured for " . $gatewayType->getFriendlyType());
    }

    /**
     * All of the gateway configurations configured in the system.
     * @return PaymentGatewayConfigurationService[]
     */
    public function getGatewayConfigurationServices()
    {
        return $this->gatewayConfigurationServices;
    }

    public function setGatewayConfigurationServices($gatewayConfigurationServices)
    {
        $this->gatewayConfigurationServices = $gatewayConfigurationServices;
    }
}
