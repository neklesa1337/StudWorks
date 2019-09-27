<?php

namespace App\Controller\Api\Admin\Order;

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
class ApiAdminOrderController extends AbstractController
{
    /**
     * @Route("/orders/status/{statusId}", name="api_admin_order_list")
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

    /**
     * @Route(
     *     "/orders/{order}",
     *     name="api_admin_order_show",
     *     methods={"GET"}
     * )
     * @param Order $order
     * @param OrderTransformer $transformer
     * @return Response
     */
    public function show(
        Order $order,
        OrderTransformer $transformer
    ): Response
    {
        return $this->json(
            $transformer->transformOne($order, true)
        );
    }

    /**
     * @Route(
     *     "/orders/{order}",
     *     name="api_admin_order_update",
     *     methods={"PUT"}
     * )
     * @param Order $order
     * @param Request $request
     * @param OrderService $orderService
     * @param OrderTransformer $transformer
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update(
        Order $order,
        Request $request,
        OrderService $orderService,
        OrderTransformer $transformer
    ): Response
    {
        return $this->json($transformer->transformOne(
            $orderService->updateOrder(
                $order,
                new OrderDto(json_decode($request->getContent(), true))
            )
        ));
    }

    /**
     * @Route(
     *     "/orders/{order}/unmoderate",
     *     name="api_admin_order_unmoderate",
     *     methods={"POST"}
     * )
     * @param Order $order
     * @param Request $request
     * @param OrderService $orderService
     * @param OrderTransformer $transformer
     * @return Response
     * @throws \Exception
     */
    public function unmoderated(
        Order $order,
        Request $request,
        OrderService $orderService,
        OrderTransformer $transformer
    ): Response
    {
        return $this->json($transformer->transformOne(
            $orderService->unModerateOrder(
                $order,
                $this->getUser(),
                json_decode($request->getContent(), true)['comment']
            )
        ));
    }

    /**
     * @Route(
     *     "/orders/{order}/uncorrect",
     *     name="api_admin_order_uncorrcted",
     *     methods={"POST"}
     * )
     * @param Order $order
     * @param Request $request
     * @param OrderService $orderService
     * @param OrderTransformer $transformer
     * @return Response
     * @throws \Exception
     */
    public function uncorrected(
        Order $order,
        Request $request,
        OrderService $orderService,
        OrderTransformer $transformer
    ): Response
    {
        return $this->json($transformer->transformOne(
            $orderService->unCorrectOrder(
                $order,
                $this->getUser(),
                json_decode($request->getContent(), true)['comment']
            )
        ));
    }
}
