<?php
namespace PHPCommerce\Entity\Secure;

/**
 * Entity associated with sensitive, secured credit card data. This data is stored specifically in the blSecurePU persistence.
 * All fetches and creates should go through {@link SecureOrderPaymentService} in order to properly decrypt/encrypt the data
 * from/to the database.
 *
 * @see {@link Referenced}
 * @author Phillip Verheyden (phillipuniverse)
 */
interface CreditCardPayment extends Referenced {

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
     * @return the expirationMonth
     */
    public function getExpirationMonth();

    /**
     * @param expirationMonth the expirationMonth to set
     */
    public function setExpirationMonth($expirationMonth);

    /**
     * @return the expirationYear
     */
    public function getExpirationYear();

    /**
     * @param expirationYear the expirationYear to set
     */
    public function setExpirationYear($expirationYear);

    /**
     * @return the nameOnCard
     */
    public function getNameOnCard();

    /**
     * @param nameOnCard the name on the card to set
     */
    public function setNameOnCard($nameOnCard);

    public function getCvvCode();

    public function setCvvCode($cvvCode);
}