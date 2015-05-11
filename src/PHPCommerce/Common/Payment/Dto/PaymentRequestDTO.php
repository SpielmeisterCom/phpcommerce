<?php
namespace PHPCommerce\Common\Payment\Dto;

use PHPCommerce\Common\Payment\Dto\CreditCardDTO;
use PHPCommerce\Common\Payment\Dto\SepaBankAccountDTO;

/**
  * <p>
  *     A DTO that is comprised of all the information that is sent to a Payment Gateway
  *     to complete a transaction. This DTO uses a modified builder pattern in order to
  *     provide an easy way of constructing the request. You can construct a DTO
  *     using the following notation:
  * </p>
  * <p>
  *     IMPORTANT: note that some of the convenience methods generate a new instance of the object.
  *     (e.g. billTo, shipTo, etc...) So, if you need to modify the shipping or billing information
  *     after you have invoked requestDTO.shipTo()..., use the getShipTo() method to append more information.
  *     Otherwise, you will overwrite the shipping information with a new instance.
  * </p>
  *
  * <pre><code>
  *      PaymentRequestDTO requestDTO = new PaymentRequestDTO()
  *          ->orderId(referenceNumber)
  *          ->customer()
  *              ->customerId("1")
  *              ->done()
  *          ->shipTo()
  *              ->addressFirstName("Bill")
  *              ->addressLastName("Broadleaf")
  *              ->addressLine1("123 Test Dr.")
  *              ->addressCityLocality("Austin")
  *              ->addressStateRegion("TX")
  *              ->addressPostalCode("78759")
  *              ->done()
  *          ->billTo()
  *              ->addressFirstName("Bill")
  *              ->addressLastName("Broadleaf")
  *              ->addressLine1("123 Test Dr.")
  *              ->addressCityLocality("Austin")
  *              ->addressStateRegion("TX")
  *              ->addressPostalCode("78759")
  *              ->done()
  *          ->shippingTotal("0")
  *          ->taxTotal("0")
  *          ->orderCurrencyCode("USD")
  *          ->orderDescription("My Order Description")
  *          ->orderSubtotal("10.00")
  *          ->transactionTotal("10.00")
  *          ->lineItem()
  *              ->name("My Product")
  *              ->description("My Product Description")
  *              ->shortDescription("My Product Short Description")
  *              ->systemId("1")
  *              ->amount("10.00")
  *              ->quantity("1")
  *              ->itemTotal("10.00")
  *              ->tax("0")
  *              ->total("10.00")
  *              ->done();
  * </code></pre>
  *
  * @author Elbert Bautista (elbertbautista)
  */
class PaymentRequestDTO {
/*
protected GatewayCustomerDTO<PaymentRequestDTO> customer;
protected AddressDTO<PaymentRequestDTO> shipTo;
protected AddressDTO<PaymentRequestDTO> billTo;
protected SubscriptionDTO<PaymentRequestDTO> subscription;
protected List<GiftCardDTO<PaymentRequestDTO>> giftCards;
protected List<CustomerCreditDTO<PaymentRequestDTO>> customerCredits;
protected List<LineItemDTO> lineItems;
*/
    /**
     * @var array
     */
    protected $additionalFields;

    /**
     * @var CreditCardDTO
     */
    protected $creditCard;

    /**
     * @var SepaBankAccountDTO
     */
    protected $sepaBankAccount;

    /**
     * @var String
     */
    protected $orderId;

    /**
     * @var String
     */
    protected $orderCurrencyCode;

    /**
     * @var String
     */
    protected $orderDescription;

    /**
     * @var String
     */
    protected $orderSubtotal;

    /**
     * @var String
     */
    protected $shippingTotal;

    /**
     * @var String
     */
    protected $taxTotal;

    /**
     * @var String
     */
    protected $transactionTotal;

    /**
     * @var bool
     */
    protected $completeCheckoutOnCallback = true;

    public function __construct() {
        $this->additionalFields = array();
    /*$this->giftCards = new ArrayList<GiftCardDTO<PaymentRequestDTO>>();
    $this->customerCredits = new ArrayList<CustomerCreditDTO<PaymentRequestDTO>>();
    $this->lineItems = new ArrayList<LineItemDTO>();
    */
    }

    /**
      * You should only call this once, as it will create a new customer
      * if called more than once. Use the getter if you need to append more information later.
      */
/*    public GatewayCustomerDTO<PaymentRequestDTO> customer() {
        customer = new GatewayCustomerDTO<PaymentRequestDTO>(this);
        return customer;
    }
*/
    /**
    * You should only call this once, as it will create a new credit card
    * if called more than once. Use the getter if you need to append more information later.
     * @return CreditCardDTO
    */
    public function creditCard() {
        $this->creditCard = new CreditCardDTO($this);
        return $this->creditCard;
    }

    /**
     * You should only call this once, as it will create a new SEPA bank account
     * if called more than once. Use the getter if you need to append more information later.
     * @return SepaBankAccountDTO
     */
    public function sepaBankAccount() {
        $this->sepaBankAccount = new SepaBankAccountDTO($this);
        return $this->sepaBankAccount;
    }

    /**
      * You should only call this once, as it will create a new subscription
      * if called more than once. Use the getter if you need to append more information later.
      */
    /*public SubscriptionDTO<PaymentRequestDTO> subscription() {
        subscription = new SubscriptionDTO<PaymentRequestDTO>(this);
        return subscription;
    }*/

    /**
     * You should only call this once, as it will create a new customer
     * if called more than once. Use the getter if you need to append more information later.
     */
    /*public AddressDTO<PaymentRequestDTO> shipTo() {
        shipTo = new AddressDTO<PaymentRequestDTO>(this);
        return shipTo;
    }*/

    /**
     * You should only call this once, as it will create a new bill to address
     * if called more than once. Use the getter if you need to append more information later.
     */
    /*public AddressDTO<PaymentRequestDTO> billTo() {
        billTo = new AddressDTO<PaymentRequestDTO>(this);
        return billTo;
    }*/

    /**
     * You should only call this once, as it will create a new gift card
     * if called more than once. Use the getter if you need to append more information later.
     */
/*    public GiftCardDTO<PaymentRequestDTO> giftCard() {
        GiftCardDTO<PaymentRequestDTO> giftCardDTO = new GiftCardDTO<PaymentRequestDTO>(this);
        giftCards.add(giftCardDTO);
        return giftCardDTO;
    }*/

    /**
     * You should only call this once, as it will create a new gift card
     * if called more than once. Use the getter if you need to append more information later.
     */
    /*public CustomerCreditDTO<PaymentRequestDTO> customerCredit() {
        CustomerCreditDTO<PaymentRequestDTO> customerCreditDTO = new CustomerCreditDTO<PaymentRequestDTO>(this);
        customerCredits.add(customerCreditDTO);
        return customerCreditDTO;
    }*/

    /*public LineItemDTO lineItem() {
        return new LineItemDTO(this);
    }*/

    /**
     * @param String $key
     * @param Object $value
     * @return PaymentRequestDTO
     */
    public function additionalField($key, $value) {
        $this->additionalFields[$key] = $value;
        return $this;
    }

    /**
     * @param String $orderId
     * @return PaymentRequestDTO
     */
    public function orderId($orderId) {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @param String $orderCurrencyCode
     * @return PaymentRequestDTO
     */
    public function orderCurrencyCode($orderCurrencyCode) {
        $this->orderCurrencyCode = $orderCurrencyCode;
        return $this;
    }

    /**
     * @param String $orderDescription
     * @return PaymentRequestDTO
     */
    public function orderDescription($orderDescription) {
        $this->orderDescription = $orderDescription;
        return $this;
    }

    /**
     * @param String $orderSubtotal
     * @return PaymentRequestDTO
     */
    public function orderSubtotal($orderSubtotal) {
        $this->orderSubtotal = $orderSubtotal;
        return $this;
    }

    /**
     * @param String $shippingTotal
     * @return PaymentRequestDTO
     */
    public function shippingTotal($shippingTotal) {
        $this->shippingTotal = $shippingTotal;
        return $this;
    }

    /**
     * @param String $taxTotal
     * @return PaymentRequestDTO
     */
    public function taxTotal($taxTotal) {
        $this->taxTotal = $taxTotal;
        return $this;
    }

    /**
     * @param String $transactionTotal
     * @return PaymentRequestDTO
     */
    public function transactionTotal($transactionTotal) {
        $this->transactionTotal = $transactionTotal;
        return $this;
    }

    /**
     * @param boolean $completeCheckoutOnCallback
     * @return PaymentRequestDTO
     */
    public function completeCheckoutOnCallback($completeCheckoutOnCallback) {
        $this->completeCheckoutOnCallback = $completeCheckoutOnCallback;
        return $this;
    }

    /*public List<LineItemDTO> getLineItems() {
        return lineItems;
    }*/

    /*public List<GiftCardDTO<PaymentRequestDTO>> getGiftCards() {
        return giftCards;
    }*/

    /*public List<CustomerCreditDTO<PaymentRequestDTO>> getCustomerCredits() {
        return customerCredits;
     }*/

    /*public AddressDTO getShipTo() {
        return shipTo;
    }*/

    /*public AddressDTO getBillTo() {
        return billTo;
        }*/

    /**
     * @return CreditCardDTO
     */
    public function getCreditCard() {
        return $this->creditCard;
    }

    /**
     * @return SepaBankAccountDTO
     */
    public function getSepaBankAccount() {
        return $this->sepaBankAccount;
    }

        /*public SubscriptionDTO getSubscription() {
        return subscription;
        }*/

        /*public GatewayCustomerDTO getCustomer() {
        return customer;
        }*/

    /**
     * @return array
     */
    public function getAdditionalFields() {
        return $this->additionalFields;
    }

    /**
     * @return String
     */
    public function getOrderId() {
        return $this->orderId;
    }

    /**
     * @return String
     */
    public function getOrderCurrencyCode() {
        return $this->orderCurrencyCode;
    }

    /**
     * @return String
     */
    public function getOrderDescription() {
        return $this->orderDescription;
    }

    /**
     * @return String
     */
    public function getOrderSubtotal() {
        return $this->orderSubtotal;
    }

    /**
     * @return String
     */
    public function getShippingTotal() {
        return $this->shippingTotal;
    }

    /**
     * @return String
     */
    public function getTaxTotal() {
        return $this->taxTotal;
    }

    /**
     * @return String
     */
    public function getTransactionTotal() {
        return $this->transactionTotal;
    }

    /**
     * @return bool
     */
    public function isCompleteCheckoutOnCallback() {
        return $this->completeCheckoutOnCallback;
    }

    /*
    public boolean shipToPopulated() {
        return (getShipTo() != null && getShipTo().addressPopulated());
    }*/

    /*
    public boolean billToPopulated() {
        return (getBillTo() != null && getBillTo().addressPopulated());
    }*/

    /*
    public boolean creditCardPopulated() {
        return (getCreditCard() != null && getCreditCard().creditCardPopulated());
    }*/

    /*
    public boolean customerPopulated() {
        return (getCustomer() != null && getCustomer().customerPopulated());
    }*/

    /*
    public boolean subscriptionPopulated() {
        return (getSubscription() != null && getSubscription().subscriptionPopulated());
    }*/

}