<?php
namespace PHPCommerce\Service\Monitor;

use PHPCommerce\Service\Type\ServiceStatusType;

interface ServiceStatusDetectable {

    /**
     * @return ServiceStatusType
     */
    public function getServiceStatus();

    /**
     * @return String
     */
    public function getServiceName();

    /**
     * @throws Exception
     */
    public function process($arg);

}
