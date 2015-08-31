<?php
namespace PHPCommerce\Payment\Service;

use PHPCommerce\Payment\Dto\PaymentResponseDTO;

/**
 * <p>The default implementation of this interface is represented in the core Broadleaf framework at
 * {@link org.broadleafcommerce.core.payment.service.BroadleafPaymentGatewayCheckoutService}. This is designed as
 * a generic contract for allowing payment modules to add payments to an order represented in Broadleaf while still
 * staying decoupled from any of the Broadleaf core framework concepts.</p>
 *
 * <p>These service methods are usually invoked from the controller that listens to the endpoint hit by the external payment
 * provider (which should be a subclass of {@link PaymentGatewayAbstractController}).</p>
 *
 * @see {@link PaymentGatewayAbstractController}
 *
 * @author Elbert Bautista (elbertbautista)
 * @author Phillip Verheyden (phillipuniverse)
 */
interface PaymentGatewayCheckoutService {
    /**
     * @param responseDTO the response that came back from the gateway
     * @param configService configuration values for the payment gateway
     * @return Long a unique ID of the payment as it is saved in the Broadleaf domain. This ID can be referred to to retrieve
     * the payment on the Broadleaf side for other methods like {@link #markPaymentAsInvalid(Long)}
     * @throws IllegalArgumentException if the {@link PaymentResponseDTO#getValid()} returns false or if the order that
     * the {@link PaymentResponseDTO} is attempted to be applied to has already gone through checkout
     */
    public function applyPaymentToOrder(PaymentResponseDTO $responseDTO, PaymentGatewayConfiguration $config);

    /**
     * Marks a given order payment as invalid. In the default implementation, this archives the payment. This can be
     * determined from the result of {@link #applyPaymentToOrder(PaymentResponseDTO, PaymentGatewayConfiguration)}
     * @param Long orderPaymentId the payment ID to mark as invalid
     */
    public function markPaymentAsInvalid($orderPaymentId);

    /**
     * Initiates the checkout process for a given <b>orderId</b>. This is usually from {@link PaymentResponseDTO#getOrderId()}
     * @param orderId the order to check out
     * @throws Exception
     * @return the response from checking out the order
     */
    public function initiateCheckout($orderId);

    /**
     * Looks up the order number for a particular order id from the {@link PaymentResponseDTO}. This can be used to redirect
     * the user coming from the payment gateway to the order confirmation page.
     *
     * @param responseDTO the response from the gateway
     * @return The order number for order id. This method can return null if the order number has not already been set
     * (which usually means that the order has not already been checked out)
     * @throws IllegalArgumentException if the order cannot be found from the {@link PaymentResponseDTO}
     */
    public function lookupOrderNumberFromOrderId(PaymentResponseDTO $responseDTO);
}
