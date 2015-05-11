<?php
namespace PhpCommerce\Common\Payment\Tests;
use PhpCommerce\Common\Payment\Service\PaymentGatewayConfiguration;

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
