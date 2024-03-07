<?php

namespace App\Repository;

use App\Entity\CaptePo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CaptePo>
 *
 * @method CaptePo|null find($id, $lockMode = null, $lockVersion = null)
 * @method CaptePo|null findOneBy(array $criteria, array $orderBy = null)
 * @method CaptePo[]    findAll()
 * @method CaptePo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CaptePoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CaptePo::class);
    }

    //    /**
    //     * @return CaptePo[] Returns an array of CaptePo objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?CaptePo
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
