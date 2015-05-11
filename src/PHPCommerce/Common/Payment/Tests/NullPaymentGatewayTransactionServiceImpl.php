<?php
namespace PhpCommerce\Common\Payment\Tests;
use PhpCommerce\Common\Payment\Dto\PaymentRequestDTO;
use PhpCommerce\Common\Payment\Dto\PaymentResponseDTO;
use PhpCommerce\Common\Payment\Service\PaymentGatewayTransactionService;
use PhpCommerce\Core\Payment\Service\Exception\PaymentException;
use PhpCommerce\Common\Payment\PaymentType;

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
        return new PaymentResponseDTO(PaymentType::$THIRD_PARTY_ACCOUNT, NullPaymentGatewayType::$NULL_GATEWAY);
    }

    /**
     * @param PaymentRequestDTO $paymentRequestDTO
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function capture(PaymentRequestDTO $paymentRequestDTO)
    {
        return new PaymentResponseDTO(PaymentType::$THIRD_PARTY_ACCOUNT, NullPaymentGatewayType::$NULL_GATEWAY);
    }

    /**
     * @param PaymentRequestDTO $paymentRequestDTO
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function authorizeAndCapture(PaymentRequestDTO $paymentRequestDTO)
    {
        return new PaymentResponseDTO(PaymentType::$THIRD_PARTY_ACCOUNT, NullPaymentGatewayType::$NULL_GATEWAY);
    }

    /**
     * @param PaymentRequestDTO $paymentRequestDTO
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function reverseAuthorize(PaymentRequestDTO $paymentRequestDTO)
    {
        return new PaymentResponseDTO(PaymentType::$THIRD_PARTY_ACCOUNT, NullPaymentGatewayType::$NULL_GATEWAY);
    }

    /**
     * @param PaymentRequestDTO $paymentRequestDTO
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function refund(PaymentRequestDTO $paymentRequestDTO)
    {
        return new PaymentResponseDTO(PaymentType::$THIRD_PARTY_ACCOUNT, NullPaymentGatewayType::$NULL_GATEWAY);
    }

    /**
     * @param PaymentRequestDTO $paymentRequestDTO
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function voidPayment(PaymentRequestDTO $paymentRequestDTO)
    {
        return new PaymentResponseDTO(PaymentType::$THIRD_PARTY_ACCOUNT, NullPaymentGatewayType::$NULL_GATEWAY);
    }
}