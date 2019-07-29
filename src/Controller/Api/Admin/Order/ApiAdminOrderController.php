<?php

namespace App\Controller\Api\Admin\Order;

use App\StudWorks\Order\Entity\Order;
use App\StudWorks\Order\Service\OrderService;
use App\StudWorks\Order\Transformer\OrderTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/admin")
 */
class ApiAdminOrderController extends AbstractController
{
    /**
     * @Route("/orders/status/{statusId}", name="api_admin_created_order_list")
     * @param OrderService $orderService
     * @param OrderTransformer $transformer
     * @param int $statusId
     * @return Response
     */
    public function index(
        OrderService $orderService,
        OrderTransformer $transformer,
        int $statusId
    ): Response
    {
        return $this->json($transformer->transformMany(
            $orderService->getOrdersByStatus($statusId)
        ));
    }
}
