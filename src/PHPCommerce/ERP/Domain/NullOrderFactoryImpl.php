<?php
namespace PHPCommerce\ERP\Domain;

use PHPCommerce\ERP\Domain\OrderInterface;
use PHPCommerce\ERP\Domain\NullOrder;

class NullOrderFactoryImpl implements NullOrderFactoryInterface {
    /**
     * @return OrderInterface
     */
    public function getNullOrder()
    {
        return new NullOrder();
    }
}
