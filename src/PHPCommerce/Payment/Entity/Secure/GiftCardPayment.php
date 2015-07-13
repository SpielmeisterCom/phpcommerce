<?php
namespace PHPCommerce\Entity\Secure;

/**
 * Entity associated with sensitive, secured bank account data. This data is stored specifically in the blSecurePU persistence.
 * All fetches and creates should go through {@link SecureOrderPaymentService} in order to properly decrypt/encrypt the data
 * from/to the database.
 *
 * @see {@link Referenced}
 * @author Phillip Verheyden (phillipuniverse)
 */
interface GiftCardPayment extends Referenced {

    /**
     * @return the id
     */
    public function getId();

    /**
     * @param id the id to set
     */
    public function setId($id);

    /**
     * @return the pan
     */
    public function getPan();

    /**
     * @param pan the pan to set
     */
    public function setPan($pan);

    /**
     * @return the pin
     */
    public function getPin();

    /**
     * @param pin the pin to set
     */
    public function setPin($pin);
}