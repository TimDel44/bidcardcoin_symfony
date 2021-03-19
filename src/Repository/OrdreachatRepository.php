<?php

namespace App\Repository;

use App\Entity\Ordreachat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ordreachat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ordreachat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ordreachat[]    findAll()
 * @method Ordreachat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdreachatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ordreachat::class);
    }

    // /**
    //  * @return Ordreachat[] Returns an array of Ordreachat objects
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
    public function findOneBySomeField($value): ?Ordreachat
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
