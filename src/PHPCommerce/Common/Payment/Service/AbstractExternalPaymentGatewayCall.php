<?php
namespace PhpCommerce\Common\Payment\Service;
use Exception;
use PhpCommerce\Common\Vencor\Service\Type\ServiceStatusType;
use PhpCommerce\Common\Vendor\Service\Monitor\ServiceStatusDetectable;
use PhpCommerce\Core\Payment\Service\Exception\PaymentException;

/**
 * <p>All payment gateway classes that intend to make an external call, either manually
 * from an HTTP Post or through an SDK which makes its own external call, should
 * extend this class. The implementations should override the abstract methods:
 * communicateWithVendor(), and getFailureReportingThreshold();</p>
 *
 * <p>The generic Type 'T' represents the payment request object that is going to be sent to the external gateway.
 * The generic Type 'R' reprenents the payment result object that will be returned</p>
 *
 * <p>This allows anyone using the framework to configure the ServiceMonitor AOP hooks
 * and detect any outages to provide (email/logging) feedback when necessary.</p>
 *
 * @see org.broadleafcommerce.common.vendor.service.monitor.ServiceMonitor
 * @see org.broadleafcommerce.common.vendor.service.monitor.StatusHandler
 * @see ServiceStatusDetectable
 *
 * @author Elbert Bautista (elbertbautista)
 */
abstract class AbstractExternalPaymentGatewayCall implements ServiceStatusDetectable {

    /**
     * @var int
     */
    protected $failureCount = 0;

    /**
     * @var bool
     */
    protected $isUp = true;

    protected function clearStatus() {
        $this->isUp         = true;
        $this->failureCount = 0;
    }

    protected function incrementFailure() {
        if ($this->failureCount >= $this->getFailureReportingThreshold()) {
            $this->isUp = false;
        } else {
            $this->failureCount++;
        }
    }

    /**
     * @return ServiceStatusType
     */
    public function getServiceStatus() {
        if ($this->isUp) {
            return ServiceStatusType::$UP;
        } else {
            return ServiceStatusType::$DOWN;
        }
    }

    /**
     * @throws throws PaymentException
     */
    public function process($paymentRequest) {
        try {
            $response = $this->communicateWithVendor($paymentRequest);
        } catch (Exception $e) {
            $this->incrementFailure();
            throw new PaymentException($e);
        }

        $this->clearStatus();

        return $response;
    }

    /**
     * @param $paymentRequest
     * @return mixed
     * @throws Exception
     */
    public abstract function communicateWithVendor($paymentRequest);


    /**
     * @return int
     */
    public abstract function getFailureReportingThreshold();
} 