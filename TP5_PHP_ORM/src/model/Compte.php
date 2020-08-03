<?php
namespace Orbit\src\model;
use Orbit\libs\core\Model;
    

    class Compte extends Model{

        public function __construct()
        {
            parent::__construct();
            // var_dump($this->findPhysiqueByNum('BP-TEST-DEV-001'));
        }
        
        //==================|CREATION D'UN CLIENT PHYSIQUE|==================  
        /**
         * Insert un client physique par requete preparee
         * @return integer
         *  */  
        public function addEPSX($account){
            if($this->db != null)
            {
                $this->db->persist($account);
                $this->db->flush();

                return $account->getId();
            }
        }

         //==================| SUPPRESSION |==================  
         public function deletePhysique($id){
            if($this->db != null)
            {
                $compteEpsx = $this->db->find('CompteEPSX', $id);
                if($compteEpsx != null)
                {
                    $this->db->remove($compteEpsx);
                    $this->db->flush();
                }else {
                    die("Objet ".$id." does not existe!");
                }
            }
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

        //==================|TROUVER UN COMPTE PAR SON NUM|==================    
        public function findAccByNum($numero){
            return $this->db->createQueryBuilder()->select('a')
            ->from('CompteEPSX', 'a')
            ->where('a.numId = :numeroCompte')
            // ->orderBy('c.name', 'ASC')
            ->setParameter('numeroCompte', $numero)
            ->getQuery()
            ->getSingleResult();
        }

        //==================|TROUVER UN ETAT PAR SON ID|==================    
        public function findStateById($id){
            return $this->db->createQueryBuilder()->select('s')
            ->from('State', 's')
            ->where('s.id = :identifier')
            // ->orderBy('c.name', 'ASC')
            ->setParameter('identifier', $id)
            ->getQuery()
            ->getSingleResult();
            
        }

        //==================|TROUVER UN CLIENT PAR SON ID|==================    
        /**
         * @return object
         */
        public function findPhysiqueById($id){
            return $this->db->createQueryBuilder()->select('c')
            ->from('ClientPhysique', 'c')
            ->where('c.id = :identifier')
            // ->orderBy('c.name', 'ASC')
            ->setParameter('identifier', $id)
            ->getQuery()
            ->getSingleResult();
            
        }

        //==================|TROUVER UN FRAIS PAR SON ID|==================    
        public function findOpFeesById($id){
            return $this->db->createQueryBuilder()->select('f')
            ->from('OpeningFees', 'f')
            ->where('f.id = :identifier')
            // ->orderBy('c.name', 'ASC')
            ->setParameter('identifier', $id)
            ->getQuery()
            ->getSingleResult();
            
        }

        //==================|TROUVER UNE AGENCE PAR SON ID|==================    
        public function findAgencyById($id){
            return $this->db->createQueryBuilder()->select('ag')
            ->from('Agency', 'ag')
            ->where('ag.id = :identifier')
            // ->orderBy('c.name', 'ASC')
            ->setParameter('identifier', $id)
            ->getQuery()
            ->getSingleResult();
            
        }

        //==================|TROUVER UN ETAT PAR SON ID|==================    
        public function findUserById($id){
            return $this->db->createQueryBuilder()->select('u')
            ->from('User', 'u')
            ->where('u.id = :identifier')
            // ->orderBy('c.name', 'ASC')
            ->setParameter('identifier', $id)
            ->getQuery()
            ->getSingleResult();
            
        }
    }