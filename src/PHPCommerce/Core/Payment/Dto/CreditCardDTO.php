<?php

namespace PHPCommerce\Core\Payment\Dto;

/**
 * @author Elbert Bautista (elbertbautista)
 */
class CreditCardDTO {

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
    protected $creditCardHolderName;

    /**
     * @var string
     */
    protected $creditCardType;

    /**
     * @var string
     */
    protected $creditCardNum;

    /**
     * @var string
     */
    protected $creditCardLastFour;

    /**
     * @var string
     */
    protected $creditCardExpDate;

    /**
     * @var string
     */
    protected $creditCardExpMonth;

    /**
     * @var string
     */
    protected $creditCardExpYear;

    /**
     * @var string
     */
    protected $creditCardCvv;

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
     * @param String $creditCardHolderName
     * @return CreditCardDTO
     */
    public function creditCardHolderName($creditCardHolderName) {
        $this->creditCardHolderName = $creditCardHolderName;
        return $this;
    }

    /**
     * @param String $creditCardType
     * @return CreditCardDTO
     */
    public function creditCardType($creditCardType) {
        $this->creditCardType = $creditCardType;
        return $this;
    }

    /**
     * @param String $creditCardNum
     * @return CreditCardDTO
     */
    public function creditCardNum($creditCardNum) {
        $this->creditCardNum = $creditCardNum;
        return $this;
    }

    /**
     * @param String $creditCardLastFour
     * @return CreditCardDTO
     */
    public function creditCardLastFour($creditCardLastFour) {
        $this->creditCardLastFour = $creditCardLastFour;
        return $this;
    }

    /**
     * @param String $creditCardExpDate
     * @return CreditCardDTO
     */
    public function creditCardExpDate($creditCardExpDate) {
        $this->creditCardExpDate = $creditCardExpDate;
        return $this;
    }

    /**
     * @param String $creditCardExpMonth
     * @return CreditCardDTO
     */
    public function creditCardExpMonth($creditCardExpMonth) {
        $this->creditCardExpMonth = $creditCardExpMonth;
        return $this;
    }

    /**
     * @param String $creditCardExpYear
     * @return CreditCardDTO
     */
    public function creditCardExpYear($creditCardExpYear) {
        $this->creditCardExpYear = $creditCardExpYear;
        return $this;
    }

    /**
     * @param String $creditCardCvv
     * @return CreditCardDTO
     */
    public function creditCardCvv($creditCardCvv) {
        $this->creditCardCvv = $creditCardCvv;
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
    public function getCreditCardHolderName() {
        return $this->creditCardHolderName;
    }

    /**
     * @return String
     */
    public function getCreditCardType() {
        return $this->creditCardType;
    }

    /**
     * @return String
     */
    public function getCreditCardNum() {
        return $this->creditCardNum;
    }

    /**
     * @return String
     */
    public function getCreditCardLastFour() {
        return $this->creditCardLastFour;
    }

    /**
     * @return String
     */
    public function getCreditCardExpDate() {
        return $this->creditCardExpDate;
    }

    /**
     * @return String
     */
    public function getCreditCardExpMonth() {
        return $this->creditCardExpMonth;
    }

    /**
     * @return String
     */
    public function getCreditCardExpYear() {
        return $this->creditCardExpYear;
    }

    /**
     * @return String
     */
    public function getCreditCardCvv() {
        return $this->creditCardCvv;
    }

    /**
     * @return bool
     */
    public function creditCardPopulated() {
        return (($this->getAdditionalFields() != "" && count($this->getAdditionalFields()) > 0) ||
            $this->getCreditCardHolderName() != "" ||
            $this->getCreditCardType() != "" ||
            $this->getCreditCardNum() != "" ||
            $this->getCreditCardLastFour() != "" ||
            $this->getCreditCardExpDate() != "" ||
            $this->getCreditCardExpMonth() != "" ||
            $this->getCreditCardExpYear() != "" ||
            $this->getCreditCardCvv() != "");
    }
}
