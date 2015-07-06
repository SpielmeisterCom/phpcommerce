<?php
namespace PHPCommerce\Payment\Entity;

use Doctrine\ORM\Mapping as ORM;

class PaymentTransaction /* extends Serializable, Status, AdditionalFields */ {
    /**
     * <p>Used to store individual transactions about a particular payment. While an {@link OrderPayment} holds data like what the
     * user might be paying with and the total amount they will be paying (like credit card and $10), a {@link PaymentTransaction}
     * is more about what happens with that particular payment. Thus, {@link PaymentTransaction}s do not make sense by
     * themselves and ONLY make sense in the context of an {@link OrderPayment}.</p>
     *
     * <p>For instance, the user might say they want to pay $10 but rather than capture the payment at order checkout, there
     * might first be a transaction for {@link PaymentTransactionType#AUTHORIZE} and then when the item is shipped there is
     * another {@link PaymentTransaction} for {@link PaymentTransactionType#CAPTURE}.</p>
     *
     * <p>In the above case, this also implies that a {@link PaymentTransaction} can have a <b>parent transaction</b> (retrieved
     * via {@link #getParentTransaction()}). The parent transaction will only be set in the following cases:</p>
     *
     * <ul>
     *  <li>{@link PaymentTransactionType#CAPTURE} -> {@link PaymentTransactionType#AUTHORIZE}</li>
     *  <li>{@link PaymentTransactionType#REFUND} -> {@link PaymentTransactionType#CAPTURE} OR {@link PaymentTransactionType#SETTLED}</li>
     *  <li>{@link PaymentTransactionType#SETTLED} -> {@link PaymentTransactionType#CAPTURE}</li>
     *  <li>{@link PaymentTransactionType#VOID} -> {@link PaymentTransactionType#CAPTURE}</li>
     *  <li>{@link PaymentTransactionType#REVERSE_AUTH} -> {@link PaymentTransactionType#AUTHORIZE}</li>
     * </ul>
     *
     * <p>For {@link PaymentTransactionType#UNCONFIRMED}, they will have children that will be either {@link PaymentTransactionType#AUTHORIZE}
     * or {@link PaymentTransactionType#AUTHORIZE_AND_CAPTURE}.</p> *
     * @author Phillip Verheyden (phillipuniverse)
     */

    protected $id;

    protected $date;

    protected $customer_ip_address;

    protected $parent_transaction;

    protected $order_payment;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    /**
     * The overall payment that this transaction applies to. Note that if the relationship to an order payment is unset on
     * this particular transaction, then this will automatically attempt to obtain the {@link OrderPayment} from
     * {@link #getParentTransaction()}.
     *
     * @return OrderPayment
     */
    public function getOrderPayment() {
        return $this->order_payment;
    }

    /**
     * Sets the overall payment that this transaction applies to
     */
    public function setOrderPayment(OrderPayment $payment) {
        $this->order_payment = $payment;
    }

    /**
     * Transactions can have a parent-child relationship for modifying transactions that can occur. Examples of this:
     * <ul>
     *  <li>{@link PaymentTransactionType#CAPTURE} -> {@link PaymentTransactionType#AUTHORIZE}</li>
     *  <li>{@link PaymentTransactionType#REFUND} -> {@link PaymentTransactionType#CAPTURE} OR {@link PaymentTransactionType#SETTLED}</li>
     *  <li>{@link PaymentTransactionType#SETTLED} -> {@link PaymentTransactionType#CAPTURE}</li>
     *  <li>{@link PaymentTransactionType#VOID} -> {@link PaymentTransactionType#CAPTURE}</li>
     *  <li>{@link PaymentTransactionType#REVERSE_AUTH} -> {@link PaymentTransactionType#AUTHORIZE}</li>
     * </ul>
     *
     * <p>For {@link PaymentTransactionType#UNCONFIRMED}, they will have children that will be either {@link PaymentTransactionType#AUTHORIZE}
     * or {@link PaymentTransactionType#AUTHORIZE_AND_CAPTURE}.</p>
     *
     * @return PaymentTransaction
     */
    public function getParentTransaction() {
        return $this->parent_transaction;
    }

    public function setParentTransaction(PaymentTransaction $parentTransaction) {
        $this->parent_transaction = $parentTransaction;
    }

    /**
     * The type of
     * @return PaymentTransactionType
     */
    public function getType() {

    }

    public function setType(PaymentTransactionType $type) {

    }

    /**
     * Gets the amount that this transaction is for
     * @return Money
     */
    public function getAmount() {

    }

    /**
     * Sets the amount of this transaction
     */
    public function setAmount(Money $amount) {

    }

    /**
     * Gets the date that this transaction was made on
     * @return Date
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Sets the date that this transaction was made on
     */
    public function setDate(DateTime $date) {
        $this->date = $date;
    }

    /**
     * Gets the {@link Customer} IP address that instigated this transaction. This is an optional field
     */
    public function getCustomerIpAddress() {
        return $this->customer_ip_address;
    }

    /**
     * Sets the {@link Customer} IP address that instigated the transaction. This is an optional field.
     */
    public function setCustomerIpAddress($customerIpAddress) {
        $this->customer_ip_address = $customerIpAddress;
    }

    /**
     * Gets the string-representation of the serialized response from the gateway. This is usually the complete request
     * parameter map serialized in string form.
     */
    public function getRawResponse() {

    }

    /**
     * Sets the raw response that was returned from the gateway.
     */
    public function setRawResponse($rawResponse) {

    }

    /**
     * Gets whether or not this transaction was successful. There are multiple reasons that a transaction could be
     * unsuccessful such as failed credit card processing or any other errors from the gateway.
     */
    public function getSuccess() {

    }

    public function setSuccess($success) {

    }

    /**
     * @see {@link PaymentAdditionalFieldType}
     */
    public function getAdditionalFields() {

    }

    public function setAdditionalFields() {

    }
}