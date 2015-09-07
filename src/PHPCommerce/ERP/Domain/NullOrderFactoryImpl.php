<?php
namespace PHPCommerce\ERP\Domain;

use PHPCommerce\ERP\Domain\OrderInterface;
use PHPCommerce\ERP\Entity\NullOrder;

class NullOrderFactoryImpl implements NullOrderFactory {
    /**
     * @return OrderInterface
     */
    public function getNullOrder()
    {
        return new NullOrder();
    }
}
