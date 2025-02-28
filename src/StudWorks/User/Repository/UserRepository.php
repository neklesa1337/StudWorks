<?php

namespace App\StudWorks\User\Repository;

use App\StudWorks\User\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @param $status
     * @return User[]
     */
    public function findUsersByStatus($status): array
    {
        return $this->createQueryBuilder('u')
            ->where('u.roles like :status')
            ->setParameter('status', '%' . $status . '%')
            ->getQuery()
            ->getResult();
    }
}
