<?php
namespace PHPCommerce\Payment\Entity;
use PHPCommerce\ERP\Entity\Order;

/**
 * <p>This entity is designed to deal with payments associated to an {@link Order} and is <i>usually</i> unique for a particular
 * amount, {@link PaymentGatewayType} and {@link PaymentType} combination. This is immediately invalid for scenarios where multiple payments of the
 * same {@link PaymentType} should be supported (like paying with 2 {@link PaymentType#CREDIT_CARD} or 2 {@link PaymentType#GIFT_CARD}).
 * That said, even though the use case might be uncommon in, Broadleaf does not actively prevent that situation from occurring
 * online payments it is very common in point of sale systems.</p>
 *
 * <p>Once an {@link OrderPayment} is created, various {@link PaymentTransaction}s can be applied to this payment as
 * denoted by {@link PaymentTransactionType}. <b>There should be at least 1 {@link PaymentTransaction} for every
 * {@link OrderPayment} that is associated with an {@link Order} that has gone through checkout</b> (which means that
 * {@link Order#getStatus()} is {@link OrderStatus#SUBMITTED}).</p>
 *
 * <p>{@link OrderPayment}s are not actually deleted from the database but rather are only soft-deleted (archived = true)</p>
 *
 * @see {@link PaymentTransactionType}
 * @see {@link PaymentTransaction}
 * @see {@link PaymentType}
 * @author Phillip Verheyden (phillipuniverse)
 */
class OrderPayment {
    protected $id;

    /**
     * @var Order
     */
    private $order;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param Order $order
     * @return mixed
     */
    public function setOrder(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Gets the billing address associated with this payment. This might be null for some payments where no billing address
     * is required (like gift cards or account credit)
     * @return Address
     */
 /*   public function getBillingAddress()
    {

    }*/

    /**
     * Sets the billing address associated with this payment. This might be null for some payments where no billing address
     * is required (like gift cards or account credit)
     */
  /*  public function setBillingAddress(Address $billingAddress)
    {

    }*/

    /**
     * The amount that this payment is allotted for. The summation of all of the {@link OrderPayment}s for a particular
     * {@link Order} should equal {@link Order#getTotal()}
     * @return Money
     */
    /*public function getAmount()
    {

    }*/

    /**
     * The amount that this payment is allotted for. The summation of all of the {@link OrderPayment}s for a particular
     * {@link Order} should equal {@link Order#getTotal()}
     */
  /*  public function setAmount(Money $amount)
    {

    }*/

    /**
     * The soft link to a {@link Referenced} entity which will be stored in the blSecurePU persistence unit. If you are not
     * attempting to store credit cards in your own database (which is the usual, recommended case) then this will not be
     * used or set. If you do use this reference number, this can be anything that is unique (like System.currentTimeMillis()).
     */
    /*public function getReferenceNumber()
    {

    }*/

    /**
     * Sets the soft link to a {@link Referenced} entity stored in the blSecurePU persistence unit. This will likely not
     * be used as the common case is to not store credit cards yourself.
     */
    /*public function setReferenceNumber($referenceNumber)
    {

    }*/

    /**
     * The type of this payment like Credit Card or Gift Card.
     *
     * @see {@link PaymentType}
     * @return PaymentType
     */
   /* public function getType()
    {

    }*/

    /**
     * Sets the type of this payment like Credit Card or Gift Card
     *
     * @see {@link PaymentType}
     */
    /*public function setType(PaymentType $type)
    {

    }*/

    /**
     * Gets the gateway that was used to process this order payment. Only a SINGLE payment gateway can modify transactions
     * on a particular order payment.
     * @return PaymentGatewayType
     */
    /*public function getGatewayType()
    {

    }*/

    /**
     * <p>Gets the gateway that was used to process this order payment. Only a SINGLE payment gateway can modify transactions
     * on a particular order payment.</p>
     *
     * <p>It usually does not make sense to modify the gateway type after it has already been set once. Instead, consider
     * just archiving this payment type (by deleting it) and creating a new payment for the new gateway.</p>
     */
   /* public function setPaymentGatewayType(PaymentGatewayType $gatewayType)
    {

    }*/

    /**
     * <p>All of the transactions that have been applied to this particular payment. Transactions are denoted by the various
     * {@link PaymentTransactionType}s. In almost all scenarios (as in, 99.9999% of all cases) there will be a at least one
     * {@link PaymentTransaction} for every {@link OrderPayment}.</p>
     *
     * <p>To add a transaction to an {@link OrderPayment} see {@link #addTransaction(PaymentTransaction)}.</p>
     *
     * @see {@link #addTransaction(PaymentTransaction)}
     * @return PaymentTransaction[]
     */
 /*   public function getTransactions()
    {

    }*/

    /**
     * <p>All of the transactions that have been applied to this particular payment. Transactions are denoted by the various
     * {@link PaymentTransactionType}s. In almost all scenarios (as in, 99.9999% of all cases) there will be a at least one
     * {@link PaymentTransaction} for every {@link OrderPayment}.</p>
     *
     * <p>To add a transaction to an {@link OrderPayment} see {@link #addTransaction(PaymentTransaction)}.</p>
     *
     * @see {@link #addTransaction(PaymentTransaction)}
     * @param PaymentTransaction
     */
   /* public function setTransactions($details)
    {

    }*/

    /**
     * A more declarative way to invoke {@link #getTransactions().add()}. This is the preferred way to add a transaction
     * to this payment.
     */
   /* public function addTransaction(PaymentTransaction $transaction)
    {

    }*/

    /**
     * Returns a transaction for given <b>type</b>. This is useful when validating whether or not a {@link PaymentTransaction}
     * can actually be added to this payment. For instance, there can only be a single {@link PaymentTransactionType#AUTHORIZE}
     * for a payment.
     *
     * @param type the type of transaction to look for within {@link #getTransactions()}
     * @return a list of transactions or an empty list if there are no transaction of that type
     *
     * @return PaymentTransaction[]
     */
    /*public function getTransactionsForType(PaymentTransactionType $type)
    {

    }*/

    /**
     * Returns the initial transaction for this order payment. This would either be an {@link PaymentTransactionType#AUTHORIZE}
     * or {@link PaymentTransactionType#AUTHORIZE_AND_CAPTURE} or {@link PaymentTransactionType#UNCONFIRMED}.
     * Implementation-wise this would
     * be any PaymentTransaction whose parentTransaction is NULL.
     *
     * @return PaymentTransaction the initial transaction for this order payment or null if there isn't any
     */
    /*public function getInitialTransaction()
    {

    }*/

    /**
     * Looks through all of the transactions for this payment and adds up the amount for the given transaction type. This
     * ignores whether the transaction was successful or not
     *
     * @param type
     * @return the amount of all of the transactions for the given type
     * @see {@link #getSuccessfulTransactionAmountForType(PaymentTransactionType)}
     */
    /*public function getTransactionAmountForType(PaymentTransactionType $type)
    {

    }*/

    /**
     * Returns all of the transactions on this payment that were successful for the given type.
     *
     * @param type the type of transaction
     * @return the amount of all of the transaction on this payment for the given type that have been successful
     */
/*    public function getSuccessfulTransactionAmountForType(PaymentTransactionType $type)
    {

    }*/

    /**
     * Looks through all of the transactions for this payment and returns whether or not
     * it contains a transaction of type {@link PaymentTransactionType#AUTHORIZE_AND_CAPTURE} or
     * {@link PaymentTransactionType#AUTHORIZE}
     *
     * @return
     */
    /*public function isConfirmed()
    {

    }*/

    /**
     * Returns whether or not this payment is considered to be the final payment on the order.
     * The default implementation considers those payment of type {@link PaymentType#THIRD_PARTY_ACCOUNT}
     * and {@link PaymentType#CREDIT_CARD} final payments because integrations with external Payment Gateways require it.
     *
     * For example, a THIRD_PARTY_ACCOUNT payment's (e.g. PayPal Express Checkout) amount to charge
     * to the customer will be automatically calculated based on other payments that have already been applied
     * to the order, such as GIFT_CARDs or ACCOUNT_CREDITs. This final amount (OrderPayment) will be sent to the gateway.
     *
     * @return bool
     */
    /*public function isFinalPayment()
    {

    }*/

    /**
     * The currency that this payment should be taken in. This is a delegate to {@link #getOrder()#getCurrency()}.
     * @return BroadleafCurrency
     */
    /*public function getCurrency()
    {

    }*/

}
