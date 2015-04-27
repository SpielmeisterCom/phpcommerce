<?php
namespace HMC\Common\Payment\Tests;
use HMC\Common\Payment\Dto\PaymentRequestDTO;
use HMC\Common\Payment\Dto\PaymentResponseDTO;
use HMC\Common\Payment\Service\PaymentGatewayTransactionService;
use HMC\Core\Payment\Service\Exception\PaymentException;
use HMC\Common\Payment\PaymentType;

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