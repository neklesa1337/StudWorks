<?php

namespace App\StudWorks\Files\Repository;

use App\StudWorks\Files\Entity\OrderFile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OrderFile|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderFile|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderFile[]    findAll()
 * @method OrderFile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderFileRepository extends ServiceEntityRepository
{
    /**
     * OrderFileRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OrderFile::class);
    }

    /**
     * @param OrderFile $file
     * @throws \Doctrine\ORM\ORMException
     */
    public function persist(OrderFile $file)
    {
        $this->getEntityManager()->persist($file);
    }
}
