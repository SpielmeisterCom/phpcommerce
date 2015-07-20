<?php
namespace PHPCommerce\ERP\Entity;

class Address
{
    protected $id;

    protected $first_name;

    protected $last_name;

    protected $company_name;

    protected $is_business;

    protected $postal_code;

    protected $city;

    protected $country;

    protected $phone_primary;

    protected $phone_secondary;

    protected $fax;

    protected $email_address;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * @param mixed $company_name
     */
    public function setCompanyName($company_name)
    {
        $this->company_name = $company_name;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * @param mixed $postal_code
     */
    public function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getPhonePrimary()
    {
        return $this->phone_primary;
    }

    /**
     * @param mixed $phone_primary
     */
    public function setPhonePrimary($phone_primary)
    {
        $this->phone_primary = $phone_primary;
    }

    /**
     * @return mixed
     */
    public function getPhoneSecondary()
    {
        return $this->phone_secondary;
    }

    /**
     * @param mixed $phone_secondary
     */
    public function setPhoneSecondary($phone_secondary)
    {
        $this->phone_secondary = $phone_secondary;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param mixed $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return mixed
     */
    public function getIsBusiness()
    {
        return $this->is_business;
    }

    /**
     * @param mixed $is_business
     */
    public function setIsBusiness($is_business)
    {
        $this->is_business = $is_business;
    }

    /**
     * @return mixed
     */
    public function getDeliveryInformation()
    {
        return $this->delivery_information;
    }

    /**
     * @param mixed $delivery_information
     */
    public function setDeliveryInformation($delivery_information)
    {
        $this->delivery_information = $delivery_information;
    }

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->email_address;
    }

    /**
     * @param mixed $email_address
     */
    public function setEmailAddress($email_address)
    {
        $this->email_address = $email_address;
    }



}

/*
 *
 * "Name1":"String",
 * "Name2":"String",
 * "LieferStrasse":"String",
 * "PostStrasse":"String",
 * "Matchcode":"String",
 * "Sprache":"String",
 * "Referenz":"String",
 */

/*
public void setAddressLine1(String addressLine1);

public String getAddressLine1();

public void setAddressLine2(String addressLine2);

public String getAddressLine2();

public void setAddressLine3(String addressLine3);

public String getAddressLine3();

public void setState(State state);

public State getState();

public String getCounty();

public void setCounty(String county);

public void setCountry(Country country);

public Country getCountry();

public boolean isDefault();

public void setDefault(boolean isDefault);

public String getEmailAddress();

public void setEmailAddress(String emailAddress);
}*/