<?php
namespace PHPCommerce\ERP\Domain;
use PHPCommerce\Payment\Entity\Payment;

interface OrderInterface
{
    public function getId();

    public function setId($id);

    public function addPayment(Payment $payment);

    /**
     * @return OrderPayment[]
     */
    public function getPayments();

    /**
     * @param OrderPayment $payment
     */
    public function setPayments($payments);
}