<?php
namespace PegasusCommerce\Core\Payment\Service;
use PegasusCommerce\Common\Payment\Dto\PaymentRequestDTO;
use PegasusCommerce\Common\Payment\Dto\PaymentResponseDTO;
use PegasusCommerce\Common\Payment\Service\PaymentGatewayTransactionService;
use PegasusCommerce\Core\Payment\Service\Exception\PaymentException;

/**
 * @Service("nullPaymentGatewayTransactionService")
 */
class NullPaymentGatewayTransactionServiceImpl implements PaymentGatewayTransactionService {

    /**
     * @param PaymentRequestDTO $paymentRequestDTO
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function authorize(PaymentRequestDTO $paymentRequestDTO)
    {
        throw new PaymentException("The Transaction Authorize method is not supported for this module");
    }

    /**
     * @param PaymentRequestDTO $paymentRequestDTO
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function capture(PaymentRequestDTO $paymentRequestDTO)
    {
        throw new PaymentException("The Transaction Capture method is not supported for this module");
    }

    /**
     * @param PaymentRequestDTO $paymentRequestDTO
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function authorizeAndCapture(PaymentRequestDTO $paymentRequestDTO)
    {
        throw new PaymentException("The Transaction Authorize&Capture method is not supported for this module");
    }

    /**
     * @param PaymentRequestDTO $paymentRequestDTO
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function reverseAuthorize(PaymentRequestDTO $paymentRequestDTO)
    {
        throw new PaymentException("The Transaction Reverse Authorize method is not supported for this module");
    }

    /**
     * @param PaymentRequestDTO $paymentRequestDTO
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function refund(PaymentRequestDTO $paymentRequestDTO)
    {
        throw new PaymentException("The Transaction Refund method is not supported for this module");
    }

    /**
     * @param PaymentRequestDTO $paymentRequestDTO
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function voidPayment(PaymentRequestDTO $paymentRequestDTO)
    {
        throw new PaymentException("The Transaction Void Payment is not supported for this module");
    }
}