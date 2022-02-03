<?php

namespace App\Repository;

use App\Entity\Extranets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Extranets|null find($id, $lockMode = null, $lockVersion = null)
 * @method Extranets|null findOneBy(array $criteria, array $orderBy = null)
 * @method Extranets[]    findAll()
 * @method Extranets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExtranetsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Extranets::class);
    }

    // /**
    //  * @return Extranets[] Returns an array of Extranets objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Extranets
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
