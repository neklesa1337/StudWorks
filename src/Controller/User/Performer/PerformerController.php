<?php

namespace App\Controller\User\Performer;

use App\StudWorks\Order\Entity\Order;
use App\StudWorks\Order\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/performer")
 */
class PerformerController extends AbstractController
{
    /**
     * @Route("", methods={"GET"}, name="performer_profiler")
     */
    public function index(
        OrderService $orderService
    ): Response
    {
        return $this->render('performer/index.html.twig', [
            'orders' => $orderService->getPerformerOrders($this->getUser())
        ]);
    }

    /**
     * @Route(
     *     "/order/{order}/approve",
     *     methods={"POST"},
     *     name="performer_order_aprove"
     * )
     * @param Order $order
     * @param OrderService $orderService
     * @return Response
     */
    public function orderApprove(
        Order $order,
        OrderService $orderService
    ): Response
    {
        $orderService->performerExecuteOrder($order);
        return $this->redirectToRoute('performer_profiler');
    }
}
