<?php
namespace PHPCommerce\Core\Payment\Service;
use Symfony\Component\HttpFoundation\Request;

/**
 * <p>This is a utility service that aids in translating the Request Attribute and
 * Request Parameters to a single String. This is useful when setting the Raw Response
 * fields on a PaymentResponseDTO. Primarily used in the PaymentGatewayWebResponseService
 * but can be injected anywhere you need to get the attributes or paraeters from an HTTPServletRequest
 * as a String.</p>
 *
 * @see {@link PaymentGatewayWebResponseService}
 * @see {@link org.broadleafcommerce.common.payment.dto.PaymentResponseDTO}
 *
 * @author Elbert Bautista (elbertbautista)
 */
interface PaymentGatewayWebResponsePrintService {
    /**
     * @param Request $request
     * @return String
     */
    public function printRequest(Request $request);

}
