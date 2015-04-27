<?php
namespace HMC\Common\Payment\Tests;
use HMC\Common\Payment\Dto\PaymentRequestDTO;
use HMC\Common\Payment\Dto\PaymentResponseDTO;
use HMC\Common\Payment\PaymentTransactionType;
use HMC\Common\Payment\PaymentType;
use HMC\Common\Payment\Service\PaymentGatewayRollbackService;
use HMC\Core\Payment\Service\Exception\PaymentException;

/**
 * @Service("nullPaymentGatewayRollbackService")
 */
class NullPaymentGatewayRollbackServiceImpl implements PaymentGatewayRollbackService {
    /**
     * @param PaymentRequestDTO $transactionToBeRolledBack
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function rollbackAuthorize(PaymentRequestDTO $transactionToBeRolledBack)
    {
        $responseDto = new PaymentResponseDTO(PaymentType::$CREDIT_CARD, NullPaymentGatewayType::$NULL_GATEWAY);
        $responseDto->rawResponse("rollback authorize - successful")
        ->successful(true)
        ->paymentTransactionType(PaymentTransactionType::$REVERSE_AUTH)
        ->amount(new Money($transactionToBeRolledBack->getTransactionTotal()));

        return $responseDto;
    }

    /**
     * @param PaymentRequestDTO $transactionToBeRolledBack
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function rollbackCapture(PaymentRequestDTO $transactionToBeRolledBack)
    {
        throw new PaymentException("The Rollback Capture method is not supported for this module");
    }

    /**
     * @param PaymentRequestDTO $transactionToBeRolledBack
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function rollbackAuthorizeAndCapture(PaymentRequestDTO $transactionToBeRolledBack)
    {
        $responseDto = new PaymentResponseDTO(PaymentType::$CREDIT_CARD, NullPaymentGatewayType::$NULL_GATEWAY);
        $responseDto->rawResponse("rollback authorize and capture - successful")
        ->successful(true)
        ->paymentTransactionType(PaymentTransactionType::$VOID)
        ->amount(new Money($transactionToBeRolledBack->getTransactionTotal()));

        return $responseDto;
    }

    /**
     * @param PaymentRequestDTO $transactionToBeRolledBack
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function rollbackRefund(PaymentRequestDTO $transactionToBeRolledBack)
    {
        throw new PaymentException("The Rollback Refund method is not supported for this module");
    }
}