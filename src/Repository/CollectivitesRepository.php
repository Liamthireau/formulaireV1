<?php

namespace App\Repository;

use App\Entity\Collectivites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Collectivites|null find($id, $lockMode = null, $lockVersion = null)
 * @method Collectivites|null findOneBy(array $criteria, array $orderBy = null)
 * @method Collectivites[]    findAll()
 * @method Collectivites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CollectivitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Collectivites::class);
    }

    // /**
    //  * @return Collectivites[] Returns an array of Collectivites objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Collectivites
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
