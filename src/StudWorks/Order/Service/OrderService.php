<?php

namespace App\StudWorks\Order\Service;

use App\StudWorks\Order\Dto\OrderDto;
use App\StudWorks\Order\Entity\Order;
use App\StudWorks\Order\Repository\OrderRepository;
use App\StudWorks\User\Entity\User;

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
     * OrderService constructor.
     * @param OrderRepository $orderRepository
     */
    public function __construct(
        OrderRepository $orderRepository
    )
    {
        $this->orderRepository = $orderRepository;
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

        $this->orderRepository->create($order);

        return $order;
    }
}
