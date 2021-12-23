<?php

namespace App\Repository;

use App\Entity\OperationService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OperationService|null find($id, $lockMode = null, $lockVersion = null)
 * @method OperationService|null findOneBy(array $criteria, array $orderBy = null)
 * @method OperationService[]    findAll()
 * @method OperationService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperationServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OperationService::class);
    }

    // /**
    //  * @return OperationService[] Returns an array of OperationService objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OperationService
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
