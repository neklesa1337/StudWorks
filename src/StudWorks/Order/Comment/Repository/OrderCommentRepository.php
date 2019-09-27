<?php

namespace App\StudWorks\Order\Comment\Repository;

use App\StudWorks\Order\Comment\Entity\OrderComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OrderComment|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderComment|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderComment[]    findAll()
 * @method OrderComment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderCommentRepository extends ServiceEntityRepository
{
    /**
     * OrderCommentRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OrderComment::class);
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEM(): EntityManager
    {
        return parent::getEntityManager();
    }
}