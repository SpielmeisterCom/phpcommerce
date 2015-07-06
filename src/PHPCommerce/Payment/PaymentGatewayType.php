<?php
namespace PHPCommerce\Payment;
/**
 * <p>This is designed such that individual payment modules will extend this to add their own type. For instance, while
 * this class does not explicitly have a 'Braintree' payment gateway type, the Braintree module will provide an extension
 * to this class and add itself in the list of types. For instance:</p>
 *
 * <pre>
 * {@code
 * public class BraintreeGatewayType extends PaymentGatewayType {
 *     public static final BRAINTREE = new PaymentGatewayType("BRAINTREE", "Braintree");
 * }
 * </pre>
 *
 * And then in your application context:
 * <pre>
 * {@code
 * <bean class="org.broadleafcommerce.vendor.braintree.BraintreeGatewayType" />
 * }
 * </pre>
 *
 * <p>This is especially useful in auditing scenarios so that, at a glance, you can easily see what gateway a particular
 * order payment was processed by.</p>
 *
 * @author Phillip Verheyden (phillipuniverse)
 */
class PaymentGatewayType {
    private static $TYPES = array();

    /**
     * @param $type
     * @return PaymentGatewayType
     */
    public static function getInstance($type) {
        return self::$TYPES[$type];
    }

    /**
     * @var PaymentGatewayType
     */
    public static $TEMPORARY;

    /**
     * @var PaymentGatewayType
     */
    public static $PASSTHROUGH;


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

    public function equals(PaymentGatewayType $obj) {
        return ($this->getType() == $obj->getType());
    }
}

PaymentGatewayType::$TEMPORARY   = new PaymentGatewayType("Temporary", "This is a temporary Order Payment");
PaymentGatewayType::$PASSTHROUGH = new PaymentGatewayType("Passthrough", "Passthrough Payment");