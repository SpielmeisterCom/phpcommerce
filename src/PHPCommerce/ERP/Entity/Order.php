<?php
namespace PHPCommerce\ERP\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use PHPCommerce\Payment\Entity\OrderPayment;

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