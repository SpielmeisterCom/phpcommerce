<?php
namespace PegasusCommerce\Common\Payment\Dto;
use PegasusCommerce\Common\Payment\PaymentGatewayType;
use PegasusCommerce\Common\Payment\PaymentTransactionType;
use PegasusCommerce\Common\Payment\PaymentType;

/**
 * <p>The DTO object that represents the response coming back from any call to the Gateway.
 * This can either wrap an API result call or a translated HTTP Web response.
 * This can not only be the results of a transaction, but also a request for a Secure Token etc...</p>
 *
 * <p>Note: the success and validity flags are set to true by default, unless otherwise overridden by specific
 * gateway implementations</p>
 *
 * @author Elbert Bautista (elbertbautista)
 */
class PaymentResponseDTO {

    /**
     * Any customer information that relates to this transaction
     */
    //protected GatewayCustomerDTO<PaymentResponseDTO> customer;

    /**
     * If shipping information is captured on the gateway, the values sent back will be put here
     */
    //protected AddressDTO<PaymentResponseDTO> shipTo;

    /**
     * The billing address associated with this transaction
     */
    //protected AddressDTO<PaymentResponseDTO> billTo;

    /**
     * for sale/authorize transactions, this will be the Credit Card object that was charged. This data is useful for showing
     * on an order confirmation screen.
     */
    //protected CreditCardDTO<PaymentResponseDTO> creditCard;

    /**
     * Any gift cards that have been processed. This data is useful for showing
     * on an order confirmation screen
     */
    //protected List<GiftCardDTO<PaymentResponseDTO>> giftCards;

    /**
     * Any customer credit accounts that have been processed. This data is useful for showing
     * on an order confirmation screen
     */
    //protected List<CustomerCreditDTO<PaymentResponseDTO>> customerCredits;

    /**
     * The Payment Gateway Type that this transaction response represents
     * @var PaymentGatewayType
     */
    protected $paymentGatewayType;

    /**
     * The Type of Payment that this transaction response represents
     * @var PaymentType
     */
    protected $paymentType;

    /**
     * The Transaction Type of the Payment that this response represents
     * @var PaymentTransactionType
     */
    protected $paymentTransactionType;

    /**
     * The Order ID that this transaction is associated with
     * @var String
     */
    protected $orderId;

    /**
     * If this was a Transaction request, it will be the amount that was sent back from the gateway
     * @var Money
     */
    protected $amount;

    /**
     * Whether or not the transaction on the gateway was successful. This should be provided by the gateway alone.
     * @var bool
     */
    protected $successful = true;

    /**
     * Whether or not this response was tampered with. This used to verify that the response that was received on the
     * endpoint (which is intended to only be invoked from the payment gateway) actually came from the gateway and was not
     * otherwise maliciously invoked by a 3rd-party.
     * @var bool
     */
    protected $valid = true;

    /**
     * <p>Sets whether or not this module should complete checkout on callback.
     * In most Credit Card gateway implementation, this should be set to 'TRUE' and
     * should not be configurable as the gateway expects it to tbe the final step
     * in the checkout process.</p>
     *
     * <p>In gateways where it does not expect to be the last step in the checkout process,
     * for example BLC Gift Card Module, PayPal Express Checkout, etc... The callback from
     * the gateway can be configured whether or not to complete checkout.</p>
     *
     * @var bool
     */
    protected $completeCheckoutOnCallback = true;

    /**
     * A string representation of the response that came from the gateway. This should be a string serialization of
     * {@link #responseMap}.
     * @var String
     */
    protected $rawResponse;

    /**
     * A more convenient representation of {@link #rawResponse} to hold the response from the gateway.
     * @var array
     */
    protected $responseMap;

    public function __construct(PaymentType $paymentType, PaymentGatewayType $gatewayType) {
        $this->paymentType = $paymentType;
        $this->paymentGatewayType = $gatewayType;
        $this->responseMap = array();
 //       this.giftCards = new ArrayList<GiftCardDTO<PaymentResponseDTO>>();
//        this.customerCredits = new ArrayList<CustomerCreditDTO<PaymentResponseDTO>>();
    }


    /*public GatewayCustomerDTO<PaymentResponseDTO> customer() {
        customer = new GatewayCustomerDTO<PaymentResponseDTO>(this);
        return customer;
    }*/

    /*public CreditCardDTO<PaymentResponseDTO> creditCard() {
creditCard = new CreditCardDTO<PaymentResponseDTO>(this);
        return creditCard;
    }*/

    /*public AddressDTO<PaymentResponseDTO> shipTo() {
shipTo = new AddressDTO<PaymentResponseDTO>(this);
        return shipTo;
    }*/

    /*public AddressDTO<PaymentResponseDTO> billTo() {
billTo = new AddressDTO<PaymentResponseDTO>(this);
        return billTo;
    }*/

    /*public GiftCardDTO<PaymentResponseDTO> giftCard() {
GiftCardDTO<PaymentResponseDTO> giftCardDTO = new GiftCardDTO<PaymentResponseDTO>(this);
        giftCards.add(giftCardDTO);
        return giftCardDTO;
    }*/

    /*public CustomerCreditDTO<PaymentResponseDTO> customerCredit() {
CustomerCreditDTO<PaymentResponseDTO> customerCreditDTO = new CustomerCreditDTO<PaymentResponseDTO>(this);
        customerCredits.add(customerCreditDTO);
        return customerCreditDTO;
    }*/

    /**
     * @param String $key
     * @param String $value
     * @return PaymentResponseDTO
     */
    public function responseMap($key, $value) {
        $this->responseMap[ key ] = $value;
        return $this;
    }

    /**
     * @param String $orderId
     * @return PaymentResponseDTO
     */
    public function orderId($orderId) {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @param Money $amount
     * @return PaymentResponseDTO
     */
    public function amount(Money $amount) {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @param PaymentTransactionType $paymentTransactionType
     * @return PaymentResponseDTO
     */
    public function paymentTransactionType(PaymentTransactionType $paymentTransactionType) {
        $this->paymentTransactionType = $paymentTransactionType;
        return $this;
    }

    /**
     * @param bool $successful
     * @return PaymentResponseDTO
     */
    public function successful($successful) {
        $this->successful = $successful;
        return $this;
    }

    /**
     * @param boolean $completeCheckoutOnCallback
     * @return PaymentResponseDTO
     */
    public function completeCheckoutOnCallback($completeCheckoutOnCallback) {
        $this->completeCheckoutOnCallback = $completeCheckoutOnCallback;
        return $this;
    }

    /**
     * @param bool $valid
     * @return PaymentResponseDTO
     */
    public function valid($valid) {
        $this->valid = $valid;
        return $this;
    }

    /**
     * @param String $rawResponse
     * @return PaymentResponseDTO
     */
    public function rawResponse($rawResponse) {
        $this->rawResponse = $rawResponse;
        return $this;
    }

/*    public GatewayCustomerDTO<PaymentResponseDTO> getCustomer() {
        return customer;
    }*/

/*    public AddressDTO<PaymentResponseDTO> getShipTo() {
        return shipTo;
    }*/

/*    public AddressDTO<PaymentResponseDTO> getBillTo() {
        return billTo;
    }*/

    /*public List<GiftCardDTO<PaymentResponseDTO>> getGiftCards() {
        return giftCards;
    }*/

    /*public List<CustomerCreditDTO<PaymentResponseDTO>> getCustomerCredits() {
        return customerCredits;
    }*/

    /**
     * @return PaymentType
     */
    public function getPaymentType() {
        return $this->paymentType;
    }

    /**
     * @return PaymentGatewayType
     */
    public function getPaymentGatewayType() {
        return $this->paymentGatewayType;
    }

    /**
     * @return String
     */
    public function getOrderId() {
        return $this->orderId;
    }

    /**
     * @return Money
     */
    public function getAmount() {
        return $this->amount;
    }

    /**
     * @return PaymentTransactionType
     */
    public function getPaymentTransactionType() {
        return $this->paymentTransactionType;
    }

    /**
     * @return bool
     */
    public function isSuccessful() {
        return $this->successful;
    }

    /**
     * @return bool
     */
    public function isValid() {
        return $this->valid;
    }

    /**
     * @return bool
     */
    public function isCompleteCheckoutOnCallback() {
        return $this->completeCheckoutOnCallback;
    }

    /*public CreditCardDTO<PaymentResponseDTO> getCreditCard() {
        return creditCard;
    }*/

    /**
     * @return String
     */
    public function getRawResponse() {
        return $this->rawResponse;
    }

    /**
     * @return Array
     */
    public function getResponseMap() {
        return $this->responseMap;
    }
}
