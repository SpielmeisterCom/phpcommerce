<?php
namespace PHPCommerce\Common\Payment;
/**
 * <p>This represents types of payments that can be applied to an order. There might be multiple order payments with the
 * same type on an order if the customer can pay with multiple cards (like 2 credit cards or 3 gift cards).</p>
 *
 * @see {@link OrderPayment}
 * @author Phillip Verheyden (phillipuniverse)
 */
class PaymentType {
    private static $TYPES = array();

    /**
     * @var PaymentType
     */
    public static $GIFT_CARD;

    /**
     * @var PaymentType
     */
    public static $CREDIT_CARD;

    /**
     * @var PaymentType
     */
    public static $BANK_ACCOUNT;

    /**
     * @var PaymentType
     */
    public static $CHECK;

    /**
     * @var PaymentType
     */
    public static $ELECTRONIC_CHECK;

    /**
     * @var PaymentType
     */
    public static $WIRE;

    /**
     * @var PaymentType
     */
    public static $MONEY_ORDER;

    /**
     * @var PaymentType
     */
    public static $CUSTOMER_CREDIT;

    /**
     * @var PaymentType
     */
    public static $COD;

    /**
     * Intended for modules like PayPal Express Checkout
     *
     * It is important to note that in this system an `UNCONFIRMED` `THIRD_PARTY_ACCOUNT` has a specific use case.
     * The Order Payment amount can be variable. That means, when you confirm that `UNCONFIRMED` transaction, you can pass in a different amount
     * than what was sent as the initial transaction amount. see (AdjustOrderPaymentsActivity)
     *
     * Note that not all third party gateways support this feature described above.
     * Make sure to the gateway does before assigning this type to your Order Payment.
     *
     * @var PaymentType
     */
    public static $THIRD_PARTY_ACCOUNT;


    /**
     * @return PaymentType
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

    /**
     * @param String $type
     * @param String $friendlyType
     */
    public function __construct($type=null, $friendlyType=null) {

        if($friendlyType) {
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


    /**
     * @param String $type
     */
    private function setType($type) {
        $this->type = $type;

        if (!array_key_exists($type, self::$TYPES)) {
            self::$TYPES[$type] = $this;
        }
    }

    public function equals(PaymentType $obj) {
        return ($this->getType() == $obj->getType());
    }
}

PaymentType::$GIFT_CARD = new PaymentType("GIFT_CARD", "Gift Card");
PaymentType::$CREDIT_CARD = new PaymentType("CREDIT_CARD", "Credit Card");
PaymentType::$BANK_ACCOUNT = new PaymentType("BANK_ACCOUNT", "Bank Account");
PaymentType::$CHECK = new PaymentType("CHECK", "Check");
PaymentType::$ELECTRONIC_CHECK = new PaymentType("ELECTRONIC_CHECK", "Electronic Check");
PaymentType::$WIRE = new PaymentType("WIRE", "Wire Transfer");
PaymentType::$MONEY_ORDER = new PaymentType("MONEY_ORDER", "Money Order");
PaymentType::$CUSTOMER_CREDIT = new PaymentType("CUSTOMER_CREDIT", "Customer Credit");
PaymentType::$COD = new PaymentType("COD", "Collect On Delivery");
PaymentType::$THIRD_PARTY_ACCOUNT = new PaymentType("THIRD_PARTY_ACCOUNT", "3rd-Party Account");
