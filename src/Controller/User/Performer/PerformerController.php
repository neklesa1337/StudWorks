<?php

namespace App\Controller\User\Performer;

use App\StudWorks\Order\Entity\Order;
use App\StudWorks\Order\Form\ResultFileType;
use App\StudWorks\Order\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/performer")
 */
class PerformerController extends AbstractController
{
    /**
     * @Route("", methods={"GET"}, name="performer_profiler")
     * @param OrderService $orderService
     * @return Response
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
     *     "/order/{order}",
     *     methods={"GET"},
     *     name="performer_order_inform"
     * )
     * @param Order $order
     * @return Response
     */
    public function order(
        Order $order
    ): Response
    {
        $form = $this->createForm(ResultFileType::class, []);
        return $this->render('performer/order/order.html.twig', [
            'order' => $order,
            'form' => $form->createView()
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
     * @param Request $request
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function orderApprove(
        Order $order,
        OrderService $orderService,
        Request $request
    ): Response
    {
        $form = $this->createForm(ResultFileType::class, []);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $orderService->performerExecuteOrder(
                $order,
                $form->getData()['resultFile']
            );
        }

        return $this->redirectToRoute('performer_profiler');
    }
}
