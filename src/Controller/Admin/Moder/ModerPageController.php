<?php

namespace App\Controller\Admin\Moder;

use App\StudWorks\Order\Entity\Order;
use App\StudWorks\Order\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/moder")
 */
class ModerPageController extends AbstractController
{
    /**
     * @Route("/orders", name="moder_orders")
     */
    public function index(): Response
    {
        return $this->render('admin/moder/orders/index.html.twig');
    }

    /**
     * @Route("/dashboard", name="moder_dashboard")
     * @param OrderService $orderService
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function dashboard(
        OrderService $orderService
    ): Response
    {
        return $this->render('admin/moder/index.html.twig', [
            'ordersToModerate' => count($orderService->getOrdersByStatus(Order::STATUS_CREATED))
        ]);
    }
}
