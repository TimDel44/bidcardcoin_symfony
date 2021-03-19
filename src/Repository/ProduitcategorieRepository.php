<?php

namespace App\Repository;

use App\Entity\Produitcategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Produitcategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produitcategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produitcategorie[]    findAll()
 * @method Produitcategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitcategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produitcategorie::class);
    }

    // /**
    //  * @return Produitcategorie[] Returns an array of Produitcategorie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Produitcategorie
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
