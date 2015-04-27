<?php
namespace HMC\Common\Payment\Service;
use HMC\Common\Payment\PaymentGatewayType;

/**
 * <p>This API is intended to define the specific configuration parameters
 * that this gateway implementation currently supports.</p>
 *
 * @author Elbert Bautista (elbertbautista)
 */
interface PaymentGatewayConfiguration {

    /**
     * <p> Gets the configured transaction type for this module. </p>
     * <p> The possible initial transaction types for a gateway can be:
     * 'Authorize' or 'Authorize and Capture'</p>
     *
     * <p>This property is intended to be configurable</p>
     *
     * @see {@link org.broadleafcommerce.common.payment.PaymentTransactionType}
     * @return boolean
     */
    public function isPerformAuthorizeAndCapture();

    /**
     * <p> Sets the transaction type to 'AUTHORIZE AND CAPTURE'
     * for this gateway. If this is set to 'FALSE', then the gateway
     * will only issue an 'AUTHORIZATION' request.</p>
     *
     * <p>This property is intended to be configurable</p>
     *
     * @see {@link org.broadleafcommerce.common.payment.PaymentTransactionType}
     * @param boolean $performAuthorizeAndCapture
     */
    public function setPerformAuthorizeAndCapture($performAuthorizeAndCapture);

    /**
     * <p>All payment gateway classes that intend to make an external call, either manually
     * from an HTTP Post or through an SDK which makes its own external call, should
     * extend the AbstractExternalPaymentGatewayCall class. One of the configuration parameters
     * is the failure reporting threshold.</p>
     *
     * @see {@link AbstractExternalPaymentGatewayCall}
     * @return int
     */
    public function getFailureReportingThreshold();

    /**
     * <p>All payment gateway classes that intend to make an external call, either manually
     * from an HTTP Post or through an SDK which makes its own external call, should
     * extend the AbstractExternalPaymentGatewayCall class. One of the configuration parameters
     * is the failure reporting threshold.</p>
     *
     * @param int failureReportingThreshold
     * @see {@link AbstractExternalPaymentGatewayCall}
     */
    public function setFailureReportingThreshold($failureReportingThreshold);

    /**
     * @return boolean
     */
    public function handlesAuthorize();

    /**
     * @return boolean
     */
    public function handlesCapture();

    /**
     * @return boolean
     */
    public function handlesAuthorizeAndCapture();

    /**
     * @return boolean
     */
    public function handlesReverseAuthorize();

    /**
     * @return boolean
     */
    public function handlesVoid();

    /**
     * @return boolean
     */
    public function handlesRefund();

    /**
     * @return boolean
     */
    public function handlesPartialCapture();

    /**
     * @return boolean
     */
    public function  handlesMultipleShipment();

    /**
     * @return boolean
     */
    public function handlesRecurringPayment();

    /**
     * @return boolean
     */
    public function handlesSavedCustomerPayment();

    /**
     * <p>Denotes whether or not this payment provider supports multiple payments on an order. For instance, a gift card provider
     * might want to support multiple gift cards on a single order but a credit card provider may not support payment with
     * multiple credit cards.</p>
     *
     * <p>If a provider does not support multiple payments in an order then that means that all payments are deleted (archived)
     * on an order whenever a new payment of that type is attempted to be added to the order.</p>
     *
     * @return boolean
     * @see {@link PaymentGatewayCheckoutService}
     */
    public function handlesMultiplePayments();

    /**
     * <p>Each payment module should have a unique subclass of {@link PaymentGatewayType} with only a single type. For instance,
     * the Braintree module would have a 'BraintreePaymentGatewayType' subclass which adds itself to the global static map.</p>
     *
     * <p>In order to ensure that the class loader loads the extension of {@link PaymentGatewayType}, it is recommended
     * to add a simple bean definition to a module application context that is utilized by both the site and admin. Using
     * the Braintree module as an example again, this might look like:
     *
     * <pre>
     * {@code
     * <bean class="com.broadleafcommerce.payment.service.gateway.BraintreeGatewayType" />
     * }
     * </pre>
     * </p>
     *
     * @return PaymentGatewayType
     */
    public function getGatewayType();

}