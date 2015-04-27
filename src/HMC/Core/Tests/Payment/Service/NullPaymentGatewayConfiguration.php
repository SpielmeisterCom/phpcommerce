<?php
namespace HMC\Core\Payment\Service;
use HMC\Common\Payment\Service\PaymentGatewayConfiguration;

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
