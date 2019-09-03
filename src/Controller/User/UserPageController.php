<?php

namespace App\Controller\User;

use App\StudWorks\Order\Dto\OrderDto;
use App\StudWorks\Order\Form\CreateOrderType;
use App\StudWorks\Order\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user")
 */
class UserPageController extends AbstractController
{
    /**
     * @Route("", methods={"GET"}, name="user_profiler")
     */
    public function index(): Response
    {
        $form = $this->createForm(CreateOrderType::class, []);

        return $this->render('user/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/order", methods={"POST"}, name="user_create_order")
     * @param Request $request
     * @param OrderService $orderService
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function createOrder(
        Request $request,
        OrderService $orderService
    ): Response
    {
        $form = $this->createForm(CreateOrderType::class, new OrderDto);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $orderDto = $form->getData();
            $orderService->createOrder(
                $this->getUser(),
                $orderDto
            );
        }

        return $this->redirectToRoute('user_profiler');
    }
}
