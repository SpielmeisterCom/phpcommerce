<?php

use PHPCommerce\Entity\Secure\Referenced;
use PHPCommerce\Payment\PaymentType;

interface SecureOrderPaymentServiceInterface {

    /**
     * @param $referenceNumber
     * @param PaymentType $paymentType
     * @throws WorkflowException
     * @return Referenced
     */
    public function findSecurePaymentInfo($referenceNumber, PaymentType $paymentType);

    /**
‚     * @param Referenced $securePayment
     * @return Referenced
     */
    public function save(Referenced $securePayment);

    /**
     * @param PaymentType $paymentType
     * @return Referenced
     */
    public function create(PaymentType $paymentType);

    /**
     * @param Referenced $securePayment
     * @return mixed
     */
    public function remove(Referenced $securePayment);

    /**
     * @param $referenceNumber
     * @param PaymentType $paymentType
     * @return mixed
     * @internal param $refernceNumber
     */
    public function findAndRemoveSecurePaymentInfo($referenceNumber, PaymentType $paymentType);

}
