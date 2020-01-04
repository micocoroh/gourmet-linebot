<?php

namespace App\Repository;

use App\Entity\Thank;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Thank|null find($id, $lockMode = null, $lockVersion = null)
 * @method Thank|null findOneBy(array $criteria, array $orderBy = null)
 * @method Thank[]    findAll()
 * @method Thank[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThankRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Thank::class);
    }

    // /**
    //  * @return Thank[] Returns an array of Thank objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Thank
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
