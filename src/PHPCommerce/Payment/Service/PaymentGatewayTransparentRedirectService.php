<?php
namespace PHPCommerce\Payment\Service;
use PHPCommerce\Payment\Dto\PaymentRequestDTO;
use PHPCommerce\Payment\Dto\PaymentResponseDTO;
use PHPCommerce\Payment\Service\Exception\PaymentException;

/**
 * <p>The purpose of this class, is to provide an API that will create
 * any gateway specific parameters needed for a Transparent Redirect/Silent Order Post etc...</p>
 *
 * <p>Some payment gateways provide this ability and will generate either a Secure Token
 * or some hashed parameters that will be placed as hidden fields on your Credit Card form.
 * These parameters (along with the Credit Card information) will be placed on the ResponseDTO
 * and your HTML should include these fields to be POSTed directly to the
 * implementing gateway for processing.</p>
 *
 * @author Elbert Bautista (elbertbautista)
 */
interface PaymentGatewayTransparentRedirectService {
    /**
     * @param PaymentRequestDTO $requestDTO
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function createAuthorizeForm(PaymentRequestDTO $requestDTO);

    /**
     * @param PaymentRequestDTO $requestDTO
     * @throws PaymentException
     * @return PaymentResponseDTO
     */
    public function createAuthorizeAndCaptureForm(PaymentRequestDTO $requestDTO);

} 