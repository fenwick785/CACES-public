<?php

namespace App\Repository;

use App\Entity\ResultEvaluate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ResultEvaluate|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResultEvaluate|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResultEvaluate[]    findAll()
 * @method ResultEvaluate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResultEvaluateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResultEvaluate::class);
    }

    // /**
    //  * @return ResultEvaluate[] Returns an array of ResultEvaluate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ResultEvaluate
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
