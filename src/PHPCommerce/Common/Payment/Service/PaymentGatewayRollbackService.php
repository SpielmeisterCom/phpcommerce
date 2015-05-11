<?php
namespace PhpCommerce\Common\Payment\Service;
use PhpCommerce\Common\Payment\Dto\PaymentRequestDTO;
use PhpCommerce\Common\Payment\Dto\PaymentResponseDTO;
use PhpCommerce\Core\Payment\Service\Exception\PaymentException;

/**
 * <p>This API allows each module to provide its own implementation for rollback.
 * Each module needs to implement this if for some reason the checkout workflow fails
 * after payments have been finalized and the submitted transaction needs to rollback.</p>
 *
 * @author Elbert Bautista (elbertbautista)
 */
interface PaymentGatewayRollbackService {
    /**
     * @param PaymentRequestDTO $transactionToBeRolledBack
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function rollbackAuthorize(PaymentRequestDTO $transactionToBeRolledBack);

    /**
     *
     * @param PaymentRequestDTO $transactionToBeRolledBack
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function rollbackCapture(PaymentRequestDTO $transactionToBeRolledBack);

    /**
     *
     * @param PaymentRequestDTO $transactionToBeRolledBack
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function rollbackAuthorizeAndCapture(PaymentRequestDTO $transactionToBeRolledBack);

    /**
     * @param PaymentRequestDTO $transactionToBeRolledBack
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function rollbackRefund(PaymentRequestDTO $transactionToBeRolledBack);
}
