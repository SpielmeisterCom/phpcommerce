<?php
namespace PHPCommerce\ERP\Entity;

use Exception;
use PHPCommerce\ERP\Domain\OrderInterface;
use PHPCommerce\ERP\Domain\OrderPayment;
use PHPCommerce\Payment\Entity\Payment;

class NullOrder implements OrderInterface
{

    public function getId()
    {
        return null;
    }

    public function setId($id)
    {
        return new Exception("NullOrder does not support any modification operations");
    }

    public function addPayment(Payment $payment)
    {
        return new Exception("NullOrder does not support any modification operations");
    }

    /**
     * @return OrderPayment[]
     */
    public function getPayments()
    {
        return null;
    }

    /**
     * @param OrderPayment $payment
     */
    public function setPayments($payments)
    {
        return new Exception("NullOrder does not support any modification operations");
    }
}