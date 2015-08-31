<?php
use PHPCommerce\Common\Money\Money;
use PHPCommerce\ERP\Entity\Order;
use PHPCommerce\Payment\Dto\PaymentRequestDTO;
use PHPCommerce\Payment\Entity\PaymentTransaction;

/**
 * @author Elbert Bautista (elbertbautista)
 */
interface OrderToPaymentRequestDTOService {

    /**
     * <p>This translates an Order of {@link PaymentType#CREDIT_CARD} into a PaymentRequestDTO.
     * This method assumes that this translation will apply to a final payment which means that the transaction amount for
     * the returned {@link PaymentRequestDTO} will be {@link Order#getTotalAfterAppliedPayments()}
     * It assumes that all other payments (e.g. gift cards/account credit) have already
     * been applied to the {@link Order}.</p>
     *
     * @param order the {@link Order} to be translated
     * @return PaymentRequestDTO a {@link PaymentRequestDTO} based on the properties of <b>order</b>. This will only utilize the payments
     * that are of type {@link PaymentType#CREDIT_CARD}
     */
    public function translateOrder(Order $order);

    /**
     * Utilizes the {@link PaymentTransaction#getAdditionalFields()} map to populate necessary request parameters on the
     * resulting {@link PaymentRequestDTO}. These additional fields are then used by the payment gateway to construct
     * additional requests to the payment gateway. For instance, this might be use to refund or void the given <b>paymentTransaction</b>
     *
     * @param transactionAmount the amount that should be placed on {@link PaymentRequestDTO#getTransactionTotal()}
     * @param paymentTransaction the transaction whose additional fields should be placed on {@link PaymentRequestDTO#getAdditionalFields()}
     * for the gateway to use
     * @return PaymentRequestDTO a new {@link PaymentRequestDTO} populated with the additional fields from <b>paymentTransaction</b> and
     * the amount from <b>transactionAmount<b>
     */
    public function translatePaymentTransaction(Money $transactionAmount, PaymentTransaction $paymentTransaction);

    public function populateTotals(Order $order, PaymentRequestDTO $requestDTO);

    public function populateCustomerInfo(Order $order, PaymentRequestDTO $requestDTO);

    /**
     * Uses the first shippable fulfillment group to populate the {@link PaymentRequestDTO#shipTo()} object
     * @param order the {@link Order} to get data from
     * @param requestDTO the {@link PaymentRequestDTO} that should be populated
     * @see {@link FulfillmentGroupService#getFirstShippableFulfillmentGroup(Order)}
     */
    public function populateShipTo(Order $order, PaymentRequestDTO $requestDTO);

    public function populateBillTo(Order $order, PaymentRequestDTO $requestDTO);

    public function populateDefaultLineItemsAndSubtotal(Order $order, PaymentRequestDTO $requestDTO);
}