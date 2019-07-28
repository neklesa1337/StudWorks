<?php

namespace App\Controller\Admin\Moder;

use App\StudWorks\Order\Entity\Order;
use App\StudWorks\Order\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/moder", name="app_login")
 */
class ModerPageController extends AbstractController
{
    /**
     * @Route("")
     */
    public function index(
        OrderService $orderService
    )
    {
        return $this->render('admin/moder/index.html.twig', [
            'ordersToModerate' => count($orderService->getOrdersByStatus(Order::STATUS_CREATED))
        ]);
    }
}