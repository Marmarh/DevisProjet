<?php

namespace App\Repository;

use App\Entity\DevisOperation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DevisOperation|null find($id, $lockMode = null, $lockVersion = null)
 * @method DevisOperation|null findOneBy(array $criteria, array $orderBy = null)
 * @method DevisOperation[]    findAll()
 * @method DevisOperation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DevisOperationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DevisOperation::class);
    }

    // /**
    //  * @return DevisOperation[] Returns an array of DevisOperation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DevisOperation
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
