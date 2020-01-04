<?php

namespace App\Repository;

use App\Entity\Want;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Want|null find($id, $lockMode = null, $lockVersion = null)
 * @method Want|null findOneBy(array $criteria, array $orderBy = null)
 * @method Want[]    findAll()
 * @method Want[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Want::class);
    }

    // /**
    //  * @return Want[] Returns an array of Want objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Want
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
