<?php
namespace PHPCommerce\ERP\Entity;

use Exception;
use PHPCommerce\ERP\Domain\OrderInterface;
use PHPCommerce\ERP\Domain\OrderPayment;
use PHPCommerce\Payment\Entity\Payment;

/**
 * NullOrderImpl is a class that represents an unmodifiable, empty order. This class is used as the default order
 * for a customer. It is a shared class between customers, and serves as a placeholder order until an item
 * is initially added to cart, at which point a real Order gets created. This prevents creating individual orders
 * for customers that are just browsing the site.
 *
 * @author apazzolini
 */
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