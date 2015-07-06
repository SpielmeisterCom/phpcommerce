<?php
/**
 * <p>This default implementation produces the Request Attributes and Request Paremeters
 * in JSON notation.</p>
 *
 * @Service("pcPaymentGatewayWebResponsePrintService")
 * @author Elbert Bautista (elbertbautista)
 */
namespace PHPCommerce\Payment\Service;

use Symfony\Component\HttpFoundation\Request;

class PaymentGatewayWebResponsePrintServiceImpl implements PaymentGatewayWebResponsePrintService {

    /**
     * @var string
     */
    public static $REQUEST_ATTRIBUTES = "attributes";

    /**
     * @var string
     */
    public static $REQUEST_PARAMETERS = "parameters";

    public function printRequest(Request $request) {
        //TODO: implementation
/*
                StringBuilder builder = new StringBuilder();
                Enumeration enAttr = request.getAttributeNames();
                builder.append("{");
                builder.append("\""+REQUEST_ATTRIBUTES+"\"" + ": {");
                while(enAttr.hasMoreElements()){
                String attributeName = (String)enAttr.nextElement();
                if (request.getAttribute(attributeName) instanceof String) {
                builder.append("\"");
                builder.append(attributeName);
                builder.append("\"");
                builder.append(":");
                builder.append("\"");
                builder.append(request.getAttribute(attributeName).toString());
                builder.append("\"");
                builder.append(",");
                }
                            }
                            builder.deleteCharAt(builder.lastIndexOf(","));
                            builder.append("},");
                            builder.append("\""+REQUEST_PARAMETERS+"\"" + ": {");
                            Enumeration enParams = request.getParameterNames();
                            while(enParams.hasMoreElements()){
                                String paramName = (String)enParams.nextElement();
                                builder.append("\"");
                                builder.append(paramName);
                                builder.append("\"");
                                builder.append(":");
                                builder.append("\"");
                                builder.append(request.getParameter(paramName));
                                builder.append("\"");
                                builder.append(",");
                            }
                            builder.deleteCharAt(builder.lastIndexOf(","));
                        builder.append("}");
                        builder.append("}");
                        return builder.toString();

*/
    }

}
