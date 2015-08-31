<?php
namespace PHPCommerce\Shop;

use PHPCommerce\ERP\Entity\OrderInterface;

class CartState {

    /**
     * Gets the current cart based on the current request
     *
     * @return OrderInterface the current customer's cart
     */
    public static function getCart() {
        throw new \Exception("not implemented");
    }

    /**
     * Sets the current cart on the current request
     *
     * @param cart the new cart to set
     */
    public static function setCart(OrderInterface $cart) {
        throw new \Exception("not implemented");
    }
}