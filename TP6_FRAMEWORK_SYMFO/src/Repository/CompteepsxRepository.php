<?php

namespace App\Repository;

use App\Entity\Compteepsx;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Compteepsx|null find($id, $lockMode = null, $lockVersion = null)
 * @method Compteepsx|null findOneBy(array $criteria, array $orderBy = null)
 * @method Compteepsx[]    findAll()
 * @method Compteepsx[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompteepsxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Compteepsx::class);
    }

    //==================|GENERATION NUMERO COMPTE|================== 
    /**
     * Generate an Account Number from the actual agency
     *
     * @param [type] $idActualAgency
     * @return string
     */   
    public function generateAccNumber($idActualAgency): string{
        $highest_id = $this->createQueryBuilder('c')
        ->select('MAX(c.id)')
        ->getQuery()
        ->getSingleScalarResult();
        $date = Date('Ymd'); //2020-07-01

        //Generate an AccountNumber as "TDTSB-MoisAnnee-lastIdCompte[select max(id) from compte]+1"
        $codeAccount = sprintf("BP-SN-%s-%d-%d", $date, $highest_id+1, $idActualAgency);
        return $codeAccount;
    }

    // /**
    //  * @return Compteepsx[] Returns an array of Compteepsx objects
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
    public function findOneBySomeField($value): ?Compteepsx
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
