<?php
namespace PHPCommerce\Shop;

use PHPCommerce\ERP\Entity\Order;

class CartState {

    /**
     * Gets the current cart based on the current request
     *
     * @return Order the current customer's cart
     */
    public static function getCart() {
        throw new \NotImplementedException();
    }

    /**
     * Sets the current cart on the current request
     *
     * @param cart the new cart to set
     */
    public static function setCart(Order $cart) {
        throw new \NotImplementedException();
    }
}