<?php
namespace PHPCommerce\Common\Payment\Tests;
use PHPCommerce\Common\Payment\Service\PaymentGatewayConfiguration;

/**
 * @author Elbert Bautista (elbertbautista)
 */
interface NullPaymentGatewayConfiguration extends PaymentGatewayConfiguration {

    /**
     * @return String
     */
    public function getTransparentRedirectUrl();

    /**
     * @return String
     */
    public function getTransparentRedirectReturnUrl();

}
