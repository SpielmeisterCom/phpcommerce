<?php
namespace PHPCommerce\Shop\Controller;

use PHPCommerce\ERP\Service\OrderService;
use PHPCommerce\Shop\CartState;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CheckoutController extends Controller {

    public function __construct()
    {
    }

    public function indexAction()
    {
        $cart = CartState::getCart();

        /** @var $orderService OrderService */
        $orderService = $this->get('phpcommerce.erp.order_service');

       $orderService->findOrderById(10);
        return new Response("Checkout");
    }
}