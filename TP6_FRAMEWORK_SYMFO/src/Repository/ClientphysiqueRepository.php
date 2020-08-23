<?php

namespace App\Repository;

use App\Entity\Clientphysique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Clientphysique|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clientphysique|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clientphysique[]    findAll()
 * @method Clientphysique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientphysiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Clientphysique::class);
    }

    //==================|GENERATION NUMERO CLIENT PHYSIQUE|==================  
    /**
     * Generate an Client Number 
     *
     * @return string
     */
    public function physiqueNumGen(): string{
        $highest_id = $this->createQueryBuilder('p')
        ->select('MAX(p.id)')
        ->getQuery()
        ->getSingleScalarResult();
        $date = Date('Ymd'); //2020-07-01

        //Generate an Client Number as "TDTSB-MoisAnnee-lastIdCompte[select max(id) from compte]+1"
        $numIdClient = sprintf("BP-CP-%s-%d", $date, $highest_id+1);
        return $numIdClient;
    }

    // /**
    //  * @return Clientphysique[] Returns an array of Clientphysique objects
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
    public function findOneBySomeField($value): ?Clientphysique
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
