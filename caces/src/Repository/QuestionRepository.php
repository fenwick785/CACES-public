<?php

namespace App\Repository;

use App\Entity\Question;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Question|null find($id, $lockMode = null, $lockVersion = null)
 * @method Question|null findOneBy(array $criteria, array $orderBy = null)
 * @method Question[]    findAll()
 * @method Question[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Question::class);
    }

 
    public function findQuestion1(){
        return $this->createQueryBuilder('a')
            -> andWhere('a.theme = 1') // on regroupe par les questions par theme
            -> setMaxResults(12) // on garde 12 question
            -> getQuery()
            -> getResult();

    }

    public function findQuestion2(){
        return $this->createQueryBuilder('b')
            -> andWhere('b.theme = 2')
            -> setMaxResults(28)
            -> getQuery()
            -> getResult();
    }

    public function findQuestion3(){
        return $this->createQueryBuilder('c')
            -> andWhere('c.theme = 3')
            -> setMaxResults(44)
            -> getQuery()
            -> getResult();
    }

    public function findQuestion4(){
        return $this->createQueryBuilder('d')
            -> andWhere('d.theme = 4')
            -> setMaxResults(12)
            -> getQuery()
            -> getResult();
    }

    public function findQuestion5(){
        return $this->createQueryBuilder('e')
            -> andWhere('e.theme = 5')
            -> setMaxResults(4)
            -> getQuery()
            -> getResult();
    }

    public function findQuestionLearn($v){
        return $this->createQueryBuilder('l')
            -> andWhere("l.learnTheme = $v")
            -> setMaxResults(10)
            -> getQuery()
            -> getResult();
    }
}
