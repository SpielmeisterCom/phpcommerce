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
interface BankAccountPayment extends Referenced {
    /**
    * @return the id
    */
    public function getId();

    /**
    * @param id the id to set
    */
    public function setId($id);

    /**
    * @return the account number
    */
    public function getAccountNumber();

    /**
    * @param account number the account number to set
    */
    public function setAccountNumber($accountNumber);

    /**
    * @return the routing number
    */
    public function getRoutingNumber();

    /**
    * @param routing number the routing number to set
    */
    public function setRoutingNumber($routingNumber);
}