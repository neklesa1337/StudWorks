<?php

namespace App\Controller\Admin\Corrector;

use App\StudWorks\Order\Entity\Order;
use App\StudWorks\Order\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/corrector")
 */
class CorrectorPageController extends AbstractController
{
    /**
     * @Route("/orders", name="corrector_orders")
     * @param OrderService $orderService
     * @return Response
     */
    public function index(
        OrderService $orderService
    ): Response
    {
        $orders = $orderService->getOrdersByStatus(Order::STATUS_ON_CHECK);
        return $this->render('admin/corrector/orders/index.html.twig', [
            'orders' => $orders
        ]);
    }
}
