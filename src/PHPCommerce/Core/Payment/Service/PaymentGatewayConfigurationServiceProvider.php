<?php
namespace PHPCommerce\Core\Payment\Service;
use PHPCommerce\Core\Payment\PaymentGatewayType;

/**
 * <p>This represents the main servic bus for grabbing configurations to configured payment gateways to execute service calls
 * programmatically. The main use for this in the framework is in
 * {@link org.broadleafcommerce.core.checkout.service.workflow.ValidateAndConfirmPaymentActivity} and its rollback handler
 * {@link org.broadleafcommerce.core.checkout.service.workflow.ConfirmPaymentsRollbackHandler}. Since multiple gateways
 * can be configured for a single implementation (like Paypal Express and Braintree, or Paypal Express, a credit card
 * module and a gift card module) this allows you to select between them to perform additional operations on a payment
 * transaction.</p>
 *
 * <p>Once you obtain the correct gateway configuration bean, you can then obtain links to each service to perform individual
 * operations like {@link PaymentGatewayTransactionService} or {@link PaymentGatewayFraudService}.</p>
 *
 * @author Phillip Verheyden (phillipuniverse)
 */
interface PaymentGatewayConfigurationServiceProvider {

    /**
     * <p>Returns the first {@link PaymentGatewayConfigurationService} that matches the given {@link PaymentGatewayType}. Useful when
     * you need a particular {@link PaymentGatewayConfigurationService} to communicate in different ways to a payment gateway.</p>
     *
     * @param PaymentGatewayType $gatewayType
     * @throws Exception
     * @return PaymentGatewayConfigurationService
     */
    public function getGatewayConfigurationService(PaymentGatewayType $gatewayType);

    /**
     * All of the gateway configurations configured in the system.
     * @return PaymentGatewayConfigurationService[]
     */
    public function getGatewayConfigurationServices();

    public function setGatewayConfigurationServices($gatewayConfigurationServices);
}