<?php
namespace PHPCommerce\Core\Payment\Service;
use PHPCommerce\Core\Payment\PaymentGatewayType;

/**
 * @Service("blPaymentGatewayConfigurationServiceProvider")
 */
class PaymentGatewayConfigurationServiceProviderImpl implements PaymentGatewayConfigurationServiceProvider {
    /**
     * @Resource(name = "blPaymentGatewayConfigurationServices")
     * @var List<PaymentGatewayConfigurationService>
     */
    protected $gatewayConfigurationServices;

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
            if ($config->getConfiguration()->getGatewayType()->equals(gatewayType)) {
                return config;
            }
        }

        throw new Exception("There is no gateway configured for " + $gatewayType->getFriendlyType());
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
