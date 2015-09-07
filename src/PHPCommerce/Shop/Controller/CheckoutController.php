<?php
namespace PHPCommerce\Shop\Controller;

use PHPCommerce\ERP\Service\OrderService;
use PHPCommerce\ERP\Service\OrderServiceInterface;
use PHPCommerce\Shop\CartState;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CheckoutController extends Controller {


    /**
     * @var OrderServiceInterface
     */
    protected $orderService;

    public function __construct(OrderServiceInterface $orderServiceInterface)
    {
        $this->orderService = $orderServiceInterface;
    }

    public function indexAction()
    {
     //   $cart = CartState::getCart();

        $this->orderService->findOrderById(10);
        return new Response("Checkout");
    }
}