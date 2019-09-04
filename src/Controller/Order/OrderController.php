<?php

namespace App\Controller\Order;

use App\StudWorks\Order\Entity\Order;
use App\StudWorks\Order\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/order")
 */
class OrderController extends AbstractController
{
    /**
     * @Route("/firstpaymentapprove/{order}", name="order_approve_first_payment")
     * @param Order $order
     * @param OrderService $orderService
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function index(
        Order $order,
        OrderService $orderService
    ): Response
    {
        $orderService->approveFirstPayment($order);
        return $this->redirectToRoute('user_profiler');
    }
}
