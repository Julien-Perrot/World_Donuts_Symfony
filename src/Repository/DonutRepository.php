<?php

namespace App\Repository;

use App\Entity\Donut;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Donut|null find($id, $lockMode = null, $lockVersion = null)
 * @method Donut|null findOneBy(array $criteria, array $orderBy = null)
 * @method Donut[]    findAll()
 * @method Donut[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DonutRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Donut::class);
    }

    // /**
    //  * @return Donut[] Returns an array of Donut objects
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
    public function findOneBySomeField($value): ?Donut
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
