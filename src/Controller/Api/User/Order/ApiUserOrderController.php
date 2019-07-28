<?php


namespace App\Controller\Api\User\Order;

use App\StudWorks\Order\Dto\OrderDto;
use App\StudWorks\Order\Entity\Order;
use App\StudWorks\Order\Service\OrderService;
use App\StudWorks\Order\Transformer\OrderTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/admin")
 */
class ApiUserOrderController extends AbstractController
{
    /**
     * @Route(
     *     "orders/process",
     *     name="api_user_allowed_orders_list",
     *     methods={"GET"}
     * )
     * @param OrderService $orderService
     * @param OrderTransformer $transformer
     * @return Response
     */
    public function allowedOrders(
        OrderService $orderService,
        OrderTransformer $transformer
    ): Response
    {
        return $this->json($transformer->transformMany(
            $orderService->getAllowedUserOrders($this->getUser())
        ));
    }

    /**
     * @Route(
     *     "orders/history",
     *     name="api_user_history_orders_list",
     *     methods={"GET"}
     * )
     * @param OrderService $orderService
     * @param OrderTransformer $transformer
     * @return Response
     */
    public function historyOrders(
        OrderService $orderService,
        OrderTransformer $transformer
    ): Response
    {
        return $this->json($transformer->transformMany(
            $orderService->getHistoredUserOrders($this->getUser())
        ));
    }

    /**
     * @Route(
     *     "orders",
     *     name="api_user_order_create",
     *     methods={"POST"}
     * )
     * @param OrderService $orderService
     * @param OrderTransformer $transformer
     * @param Request $request
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function create(
        OrderService $orderService,
        OrderTransformer $transformer,
        Request $request
    ): Response
    {
        return $this->json($transformer->transformOne(
            $orderService->createOrder(
                $this->getUser(),
                new OrderDto(json_decode($request->getContent(), true))
            )
        ));
    }
}
