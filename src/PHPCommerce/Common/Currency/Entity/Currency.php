<?php
namespace PHPCommerce\Common\Currency\Entity;

class Currency
{
    protected $currencyCode;

    protected $friendlyName;

    protected $defaultFlag;

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param mixed $code
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return mixed
     */
    public function getFriendlyName()
    {
        return $this->friendlyName;
    }

    /**
     * @param mixed $friendlyName
     */
    public function setFriendlyName($friendlyName)
    {
        $this->friendlyName = $friendlyName;
    }

    /**
     * @return mixed
     */
    public function getDefaultFlag()
    {
        return $this->defaultFlag;
    }

    /**
     * @param mixed $defaultFlag
     */
    public function setDefaultFlag($defaultFlag)
    {
        $this->defaultFlag = $defaultFlag;
    }
}
