<?php

namespace App\StudWorks\Order\Service;

use App\StudWorks\Order\Dto\OrderDto;
use App\StudWorks\Order\Entity\Order;
use App\StudWorks\Order\Logs\Service\OrderLogService;
use App\StudWorks\Order\Repository\OrderRepository;
use App\StudWorks\User\Entity\User;
use App\StudWorks\User\Service\UserService;

/**
 * Class OrderService
 * @package App\StudWorks\Order\Service
 */
class OrderService
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var OrderLogService
     */
    private $logService;

    /**
     * OrderService constructor.
     * @param OrderRepository $orderRepository
     * @param UserService $userService
     * @param OrderLogService $logService
     */
    public function __construct(
        OrderRepository $orderRepository,
        UserService $userService,
        OrderLogService $logService
    )
    {
        $this->orderRepository = $orderRepository;
        $this->userService = $userService;
        $this->logService = $logService;
    }

    /**
     * @param int $status
     * @return Order[]
     */
    public function getOrdersByStatus(int $status): array
    {
        return  $this->orderRepository->getOrdersByStatus($status);
    }

    /**
     * @param User $user
     * @return array
     */
    public function getAllowedUserOrders(User $user): array
    {
        return $this->orderRepository->getAllowedUserOrders($user);
    }

    /**
     * @param User $user
     * @return array
     */
    public function getHistoredUserOrders(User $user): array
    {
        return $this->orderRepository->getUserOrdersByStatus($user, Order::STATUS_APPROVE);
    }

    /**
     * @param User $user
     * @param OrderDto $dto
     * @return Order
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function createOrder(User $user, OrderDto $dto): Order
    {
        $order = new Order();
        $order->setUser($user);
        $order->setDescription($dto->getDescription());
        $order->setStatus(Order::STATUS_CREATED);

        $this->orderRepository->create($order);

        return $order;
    }

    /**
     * @param Order $order
     * @param OrderDto $dto
     * @return Order
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function updateOrder(Order $order, OrderDto $dto): Order
    {
        $this->logService->pushLog($order, $dto);
        $order->setDescription($dto->getDescription());
        $order->setStatus($dto->getStatus());
        if ($dto->getPerformerId()) {
            $order->setPerformer(
                $this->userService->getUserById($dto->getPerformerId())
            );
        }

        $this->orderRepository->update();

        return $order;
    }

}
