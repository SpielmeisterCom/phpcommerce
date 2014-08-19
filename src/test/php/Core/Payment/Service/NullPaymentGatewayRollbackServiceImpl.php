<?php
namespace PegasusCommerce\Core\Payment\Service;
use PegasusCommerce\Common\Payment\Dto\PaymentRequestDTO;
use PegasusCommerce\Common\Payment\Dto\PaymentResponseDTO;
use PegasusCommerce\Common\Payment\PaymentTransactionType;
use PegasusCommerce\Common\Payment\PaymentType;
use PegasusCommerce\Common\Payment\Service\PaymentGatewayRollbackService;
use PegasusCommerce\Core\Payment\Service\Exception\PaymentException;

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