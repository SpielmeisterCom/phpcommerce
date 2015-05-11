<?php
namespace PHPCommerce\Core\Payment\Tests;
use PHPCommerce\Core\Payment\PaymentGatewayType;

class NullPaymentGatewayType extends PaymentGatewayType {
    /**
     * @var PaymentGatewayType
     */
    public static $NULL_GATEWAY;

    /**
     * @var PaymentGatewayType
     */
    public static $NULL_HOSTED_GATEWAY;
}

NullPaymentGatewayType::$NULL_GATEWAY = new PaymentGatewayType("NULL_GATEWAY", "Null Payment Gateway Implementation");
NullPaymentGatewayType::$NULL_HOSTED_GATEWAY = new PaymentGatewayType("NULL_HOSTED_GATEWAY", "Null Hosted Payment Gateway Implementation");