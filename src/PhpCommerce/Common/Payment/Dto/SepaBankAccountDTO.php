<?php

namespace PhpCommerce\Common\Payment\Dto;

/**
 * @author Julian Haupt
 */
class SepaBankAccountDTO {

    /**
     * @var object
     */
    protected $parent;

    /**
     * @var array
     */
    protected $additionalFields;
    /**
     * @var string
     */
    protected $sepaBankAccountBIC;

    /**
     * @var string
     */
    protected $sepaBankAccountIBAN;

    public function __construct($parent=null) {
        $this->additionalFields = array();
        $this->parent = $parent;
    }

    /**
     * @return object
     */
    public function done() {
        return $this->parent;
    }

    /**
     * @param String $key
     * @param Object $value
     * @return CreditCardDTO
     */
    public function additionalFields($key, $value) {
        $this->additionalFields[ $key ] = $value;
        return $this;
    }

    /**
     * @param String $sepaBankAccountBIC
     * @return SepaBankAccountDTO
     */
    public function sepaBankAccountBIC($sepaBankAccountBIC) {
        $this->sepaBankAccountBIC = $sepaBankAccountBIC;
        return $this;
    }

    /**
     * @param String $sepaBankAccountIBAN
     * @return SepaBankAccountDTO
     */
    public function sepaBankAccountIBAN($sepaBankAccountIBAN) {
        $this->sepaBankAccountIBAN = $sepaBankAccountIBAN;
        return $this;
    }

    /**
     * return array
     */
    public function getAdditionalFields() {
        return $this->additionalFields;
    }

    /**
     * @return String
     */
    public function getSepaBankAccountBIC() {
        return $this->sepaBankAccountBIC;
    }

    /**
     * @return String
     */
    public function getSepaBankAccountIBAN() {
        return $this->sepaBankAccountIBAN;
    }

    /**
     * @return bool
     */
    public function creditCardPopulated() {
        return (($this->getAdditionalFields() != "" && count($this->getAdditionalFields()) > 0) ||
            $this->getSepaBankAccountBIC() != "" ||
            $this->getSepaBankAccountIBAN() != "");
    }
}
