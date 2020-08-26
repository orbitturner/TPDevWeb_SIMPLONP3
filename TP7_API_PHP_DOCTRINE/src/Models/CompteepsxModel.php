<?php
namespace Orbit\Models;

use CompteEPSX;

class CompteEPSXModel {

    private $db = null;

    public function __construct($entityManager)
    {
        $this->db = $entityManager;        
        // $clientRepository = $this->db->getRepository(CompteEPSX::class);
        
    }

    //==================|TROUVER TOUS LES COMPTE|================== 
    /**
     * FindAll Clients
     *
     * @return array() | String()
     */
    public function findAll()
    {
        try {
            $accounts = $this->db->createQueryBuilder()
            ->select('a')
            ->from(CompteEPSX::class,'a')
            ->getQuery()
            ->getArrayResult();

            return $accounts;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    //==================|TROUVER UN COMPTE PAR SON ID|================== 
    /**
     * Find a Client By ID
     *
     * @param [int] $id
     * @return array() | String()
     */
    public function find($id)
    {
        try {
            $result = $this->db->createQueryBuilder()
            ->select('c')
            ->from(CompteEPSX::class, 'c')
            ->where('c.id = :identifier')
            ->orderBy('c.nom', 'ASC')
            ->setParameter('identifier', $id)
            ->getQuery()
            ->getArrayResult();
            
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    //==================|TROUVER UN COMPTE PAR SON NUM|==================    
        /**
         * @return Array
         */
        public function findN(string $numero){
            return $this->db->createQueryBuilder()->select('a.solde')
            ->from(CompteEPSX::class, 'a')
            ->where('a.accountNumber = :numeroAcc')
            // ->orderBy('c.name', 'ASC')
            ->setParameter('numeroAcc', $numero)
            ->getQuery()
            ->getArrayResult();
            
        }
    

    
        //==================|GENERATION NUMERO COMPTE|==================    
        public function generateAccNumber($idActualAgency): string{
            $highest_id = $this->db->createQueryBuilder()
            ->select('MAX(a.id)')
            ->from('CompteEPSX', 'a')
            ->getQuery()
            ->getSingleScalarResult();
            $date = Date('Ymd'); //2020-07-01

            //Generate an AccountNumber as "TDTSB-MoisAnnee-lastIdCompte[select max(id) from compte]+1"
            $codeAccount = sprintf("BP-SN-%s-%d-%d", $date, $highest_id+1, $idActualAgency);
            return $codeAccount;
        }


}