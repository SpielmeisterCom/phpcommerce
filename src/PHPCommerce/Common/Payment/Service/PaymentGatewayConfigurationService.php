<?php
namespace PhpCommerce\Common\Payment\Service;

use PhpCommerce\Common\Payment\Service\PaymentGatewayConfiguration;
use PhpCommerce\Common\Payment\Service\PaymentGatewayTransparentRedirectService;

/**
* Each payment gateway module should configure an instance of this. In order for multiple gateways to exist in the system
* at the same time, a list of these is managed via the {@link PaymentGatewayConfigurationServiceProvider}. This allows for proper
* delegation to the right gateway to perform operations against via different order payments on an order.
*
* @author Elbert Bautista (elbertbautista)
* @author Phillip Verheyden (phillipuniverse)
*/
interface PaymentGatewayConfigurationService {
    /**
     * @return PaymentGatewayConfiguration
     */
    public function getConfiguration();

    /**
     * @return PaymentGatewayTransactionService
     */
    public function getTransactionService();

    /**
     * @return PaymentGatewayTransactionConfirmationService
     */
    public function getTransactionConfirmationService();

    /**
     * @return PaymentGatewayReportingService
     */
    public function getReportingService();

    /**
     * @return PaymentGatewayCreditCardService
     */
    public function getCreditCardService();

    /**
     * @return PaymentGatewayCustomerService
     */
    public function getCustomerService();

    /**
     * @return PaymentGatewaySubscriptionService
     */
    public function getSubscriptionService();

    /**
     * @return PaymentGatewayFraudService
     */
    public function getFraudService();

    /**
     * @return PaymentGatewayHostedService
     */
    public function getHostedService();

    /**
     * @return PaymentGatewayRollbackService
     */
    public function getRollbackService();

    /**
     * @return PaymentGatewayWebResponseService
     */
    public function getWebResponseService();

    /**
     * @return PaymentGatewayTransparentRedirectService
     */
    public function getTransparentRedirectService();

    /**
     * @return TRCreditCardExtensionHandler
     */
    public function getCreditCardExtensionHandler();

    /**
     * @return PaymentGatewayFieldExtensionHandler
     */
    public function getFieldExtensionHandler();

    /**
     * @return CreditCardTypesExtensionHandler
     */
    public function getCreditCardTypesExtensionHandler();

}
