<?php
namespace PegasusCommerce\Common\Payment\Service;
use PegasusCommerce\Common\Payment\Dto\PaymentRequestDTO;
use PegasusCommerce\Core\Payment\Service\Exception\PaymentException;

/**
 * <p>This API provides the ability to get the status of a Transaction after it has been submitted to the Gateway.
 * Gateways have different ways to provide this information.
 * For example, Cybersource can provide a nightly feed or FTP file that contain details of
 * what was SETTLED, CHARGEBACK, etc... to be reconciled in your system.
 * Braintree and Paypal have API hooks to either do a date based query or an individual
 * inquiry on a particular transaction.</p>
 *
 * @author Elbert Bautista (elbertbautista)
 */
interface PaymentGatewayReportingService {
    /**
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function findDetailsByTransaction(PaymentRequestDTO $paymentRequestDTO);

} 