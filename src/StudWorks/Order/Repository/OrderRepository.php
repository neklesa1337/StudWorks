<?php


namespace App\StudWorks\Order\Repository;

use App\StudWorks\Order\Entity\Order;
use App\StudWorks\User\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Order|null find($id, $lockMode = null, $lockVersion = null)
 * @method Order|null findOneBy(array $criteria, array $orderBy = null)
 * @method Order[]    findAll()
 * @method Order[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderRepository extends ServiceEntityRepository
{
    /**
     * OrderRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Order::class);
    }

    /**
     * @param int $status
     * @return Order[]
     */
    public function getOrdersByStatus(int $status): array
    {
        return $this->findBy(['status' => $status]);
    }

    /**
     * @param User $user
     * @return array
     */
    public function getAllowedUserOrders(User $user): array
    {
        return $this->createQueryBuilder('order')
            ->where('order.user = :user')
            ->andWhere('order.status != :status')
            ->setParameter('status', Order::STATUS_APPROVE)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param User $user
     * @return Order[]
     */
    public function getPerformerOrders(User $user): array
    {
        return $this->createQueryBuilder('o')
            ->where('o.performer = :user')
            ->setParameter('user', $user->getId())
            ->getQuery()
            ->getResult();
    }

    /**
     * @param User $user
     * @param int $status
     * @return array
     */
    public function getUserOrdersByStatus(User $user, int $status): array
    {
        return $this->createQueryBuilder('order')
            ->where('order.user = :user')
            ->andWhere('order.status = :status')
            ->setParameter('status', $status)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param Order $order
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function create(Order $order)
    {
        $this->getEntityManager()->persist($order);
        $this->update();
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update()
    {
        $this->getEntityManager()->flush();
    }
}
