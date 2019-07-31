<?php


namespace App\Controller\User;

use App\StudWorks\Order\Dto\OrderDto;
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
        return $this->render('user/index.html.twig');
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
        $orderService->createOrder(
            $this->getUser(),
            new OrderDto(
                ['description' => $request->get('description')]
            )
        );
        return $this->redirectToRoute('user_profiler');
    }
}
