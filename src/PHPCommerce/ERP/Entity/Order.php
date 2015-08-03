<?php
namespace PHPCommerce\ERP\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use PHPCommerce\Payment\Entity\Payment;

class Order {
    protected $id;

    /**
     * @var OrderPayment[]
     */
    protected $payments;

    public function __construct() {
        $this->payments = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function addPayment(Payment $payment)
    {
        $this->payments->add($payment);
    }

    /**
     * @return OrderPayment[]
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @param OrderPayment $payment
     */
    public function setPayments($payments)
    {
        $this->payments = $payments;
    }
}