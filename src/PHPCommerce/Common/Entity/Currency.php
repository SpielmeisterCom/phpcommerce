<?php
namespace PHPCommerce\Common\Entity;

class Currency
{
    /**
     * Three letter currency code
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $name;

    /**
     * 1 char symbol of this currency
     * @var string
     */
    protected $symbol;

    /**
     * Specifies if this is the default currency
     * @var string
     */
    protected $default;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    public function isDefault()
    {
        return ($this->default);
    }

    /**
     * @param mixed $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }

    /**
     * @return mixed
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @param mixed $symbol
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }
}
