<?php
namespace PHPCommerce\Payment\Dao;

interface SecureOrderPaymentDao {

    /**
     * @return BankAccountPayment
     */
    public function findBankAccountPayment($referenceNumber);

    /**
     * @return CreditCardPayment
     */
    public function findCreditCardPayment($referenceNumber);

    /**
     * @return GiftCardPayment
     */
    public function findGiftCardPayment($referenceNumber);

    /**
     * @return Referenced
     */
    public function save($securePaymentInfo);

    /**
     * @return BankAccountPayment
     */
    public function createBankAccountPayment();

    /**
     * @return GiftCardPayment
     */
    public function createGiftCardPayment();

    /**
     * @return CreditCardPayment
     */
    public function createCreditCardPayment();

    /**
     * @return
     */
    public function delete(Referenced $securePayment);

}