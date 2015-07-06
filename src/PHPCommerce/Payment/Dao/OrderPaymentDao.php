<?php
namespace PHPCommerce\Payment\Dao;

interface OrderPaymentDao {
    /**
     * @param $paymentId
     * @return OrderPayment
     */
    public function readPaymentById($paymentId);

    /**
     * @return OrderPayment
     */
    public function saveOrderPayment(OrderPayment $payment);

    /**
     * @param PaymentTransaction $
     * @return PaymentTransaction
     */
    public function savePaymentTransaction(PaymentTransaction $transaction);

    /**
     * @param PaymentLog $
     * @return PaymentLog
     */
    public function savePaymentLog(PaymentLog $log);

    /**
     * @param Order $
     * @return OrderPayment[]
     */
    public function readPaymentsForOrder(Order $order);

    /**
     * @return OrderPayment
     */
    public function create();

    public function delete(OrderPayment $payment);

    /**
     * @return PaymentTransaction
     */
    public function createTransaction();

    /**
     * @param $transactionId
     * @return PaymentTransaction
     */
    public function readTransactionById($transactionId);

    /**
     * @return PaymentLog
     */
    public function createLog();

}