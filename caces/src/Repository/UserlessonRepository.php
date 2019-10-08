<?php

namespace App\Repository;

use App\Entity\Userlesson;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Userlesson|null find($id, $lockMode = null, $lockVersion = null)
 * @method Userlesson|null findOneBy(array $criteria, array $orderBy = null)
 * @method Userlesson[]    findAll()
 * @method Userlesson[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserlessonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Userlesson::class);
    }

    // /**
    //  * @return Userlesson[] Returns an array of Userlesson objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Userlesson
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
