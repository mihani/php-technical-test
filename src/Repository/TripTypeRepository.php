<?php

namespace App\Repository;

use App\Entity\TripType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TripType|null find($id, $lockMode = null, $lockVersion = null)
 * @method TripType|null findOneBy(array $criteria, array $orderBy = null)
 * @method TripType[]    findAll()
 * @method TripType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TripTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TripType::class);
    }

    // /**
    //  * @return TripType[] Returns an array of TripType objects
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
    public function findOneBySomeField($value): ?TripType
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
