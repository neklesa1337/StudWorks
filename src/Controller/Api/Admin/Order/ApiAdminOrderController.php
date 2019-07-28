<?php

namespace App\Controller\Api\Admin\Order;

use App\StudWorks\Order\Entity\Order;
use App\StudWorks\Order\Service\OrderService;
use App\StudWorks\Order\Transformer\OrderTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/user")
 */
class ApiAdminOrderController extends AbstractController
{
    /**
     * @Route("orders/created", name="api_admin_created_order_list")
     * @param OrderService $orderService
     * @param OrderTransformer $transformer
     * @return Response
     */
    public function index(
        OrderService $orderService,
        OrderTransformer $transformer
    ): Response
    {
        return $this->json($transformer->transformMany(
            $orderService->getOrdersByStatus(Order::STATUS_CREATED)
        ));
    }
}
