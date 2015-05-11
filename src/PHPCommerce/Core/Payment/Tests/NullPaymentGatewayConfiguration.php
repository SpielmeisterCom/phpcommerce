<?php
namespace PHPCommerce\Core\Payment\Tests;
use PHPCommerce\Core\Payment\Service\PaymentGatewayConfiguration;

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
