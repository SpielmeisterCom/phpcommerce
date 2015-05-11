<?php
namespace PhpCommerce\Common\Payment;

/**
 * The PaymentTransactionType is used to represent the types of operations that could occur on the within the same payment.
 * In the Broadleaf core framework, these types appear on the org.broadleafcommerce.core.payment.domain.PaymentTransaction.
 *
 * @see {@link #AUTHORIZE}
 * @see {@link #CAPTURE}
 * @see {@link #AUTHORIZE_AND_CAPTURE}
 * @see {@link #SETTLED}
 * @see {@link #REFUND}
 * @see {@link #VOID}
 * @see {@link #REVERSE_AUTH}
 * @see {@link #UNCONFIRMED}
 *
 * @author Jerry Ocanas (jocanas)
 * @author Phillip Verheyden (phillipuniverse)
 */
class PaymentTransactionType {
    private static $TYPES = array();

    /**
     * Funds have been authorized for capture. This might appear as a 'pending' transaction on a customer's credit
     * card statement
     * @var PaymentTransactionType
     */
    public static $AUTHORIZE;

    /**
     * Funds have been charged/submitted/debited from the customer and payment is complete. Can <b>ONLY</b> occur after an
     * amount has ben {@link #AUTHORIZE}d.
     * @var PaymentTransactionType
     */
    public static $CAPTURE;

    /**
     * <p>Funds have been captured/authorized all at once. While this might be the simplest to
     * implement from an order management perspective, the recommended approach is to {@link #AUTHORIZE} and then {@link #CAPTURE}
     * in separate transactions and at separate times. For instance, an {@link AUTHORIZE} would happen once the {@link Order}
     * has completed checkout but then a {@link CAPTURE} would happen once the {@link Order} has shipped.</p>
     *
     * <p>NOTE: Many Gateways like to refer to this as also a SALE transaction.</p>
     *
     * <p>This should be treated the exact same as a {@link #CAPTURE}.</p>
     * @var PaymentTransactionType
     */
    public static $AUTHORIZE_AND_CAPTURE;

    /**
     * Can <b>ONLY</b> occur after a payment has been {@link #CAPTURE}d. This represents a payment that has been balanced by
     * the payment provider. This represents more finality than a {@link #CAPTURE}. Some payment providers might not explicitly
     * expose the details of settled transactions which are usually done in batches at the end of the day.
     * @var PaymentTransactionType
     */
    public static $SETTLED;

    /**
     * Funds have been refunded/credited. This can <b>ONLY</b> occur after funds have been {@link #CAPTURE}d or
     * {@link #SETTLED}. This should only be used when money goes back to a customer.
     * @var PaymentTransactionType
     */
    public static $REFUND;

    /**
     * Void can happen after a CAPTURE but before it has been SETTLED. Payment transactions are usually settled in batches
     * at the end of the day. This basically performs the same action as a REFUND, although the transaction might not
     * hit the customer's card.
     * @var PaymentTransactionType
     */
    public static $VOID;

    /**
     * The reverse of {@link #AUTHORIZE}. This can <b>ONLY</b> occur <b>AFTER</b> funds have been
     * {@link #AUTHORIZE}d but <b>BEFORE</b> funds have been {@link #CAPTURE}d.
     * @var PaymentTransactionType
     */
    public static $REVERSE_AUTH;

    /**
     * <p>This occurs for Payment Types like PayPal Express Checkout where a transaction must be confirmed at a later stage. A transaction is confirmed if the gateway
     * has actually communicated something to hit against the user's card. There might be instances where payments have not
     * been confirmed at the moment that those payments have actually been added to the order. For instance, there might be
     * a scenario where it is desired to show a 'confirmation' page to the user before actually hitting 'submit' and
     * completing the checkout workflow that actually takes funds away from the user account (this is also the desired case
     * with gift cards and account credits). When the user adds all of the payments to their order, all of those payments
     * may not have been confirmed by the gateway but they should be on checkout.</p>
     *
     * <p>Unconfirmed transactions are confirmed in the checkout workflow via the {@link ValidateAndConfirmPaymentActivity}.</p>
     * @var PaymentTransactionType
     */
    public static $UNCONFIRMED;

    /**
     * @param $type
     * @return PaymentTransactionType
     */
    public static function getInstance($type) {
        return self::$TYPES[$type];
    }

    /**
     * @var String
     */
    private $type;

    /**
     * @var String
     */
    private $friendlyType;

    public function __construct($type = null, $friendlyType = null) {
        if ($friendlyType) {
            $this->friendlyType = $friendlyType;
        }

        if ($type) {
            $this->setType($type);
        }
    }


    /**
     * @return String
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @return String
     */
    public function getFriendlyType() {
        return $this->friendlyType;
    }

    private function setType($type) {
        $this->type = $type;

        if (!array_key_exists($type, self::$TYPES)) {
            self::$TYPES[$type] = $this;
        }
    }

    public function equals(PaymentTransactionType $obj) {
        return ($this->getType() == $obj->getType());
    }
}

PaymentTransactionType::$AUTHORIZE = new PaymentTransactionType("AUTHORIZE", "Authorize");
PaymentTransactionType::$CAPTURE = new PaymentTransactionType("CAPTURE", "Capture");
PaymentTransactionType::$AUTHORIZE_AND_CAPTURE = new PaymentTransactionType("AUTHORIZE_AND_CAPTURE", "Authorize and Capture");
PaymentTransactionType::$SETTLED = new PaymentTransactionType("SETTLED", "Settled");
PaymentTransactionType::$REFUND = new PaymentTransactionType("REFUND", "Refund");
PaymentTransactionType::$VOID = new PaymentTransactionType("VOID", "Void");
PaymentTransactionType::$REVERSE_AUTH = new PaymentTransactionType("REVERSE_AUTH", "Reverse Auth");
PaymentTransactionType::$UNCONFIRMED = new PaymentTransactionType("UNCONFIRMED", "Not Confirmed");
