<?php
namespace Orbit\src\model;
use Orbit\libs\core\Model;


    class Client extends Model{

        
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
        public function addPhysique($client){
            if($this->db != null)
            {
                $this->db->persist($client);
                $this->db->flush();

                return $client->getId();
            }
        }

        //==================| SUPPRESSION |==================  
        public function deletePhysique($id){
            if($this->db != null)
            {
                $ClientPhysique = $this->db->find('ClientPhysique', $id);
                if($ClientPhysique != null)
                {
                    $this->db->remove($ClientPhysique);
                    $this->db->flush();
                }else {
                    die("Objet ".$id." does not existe!");
                }
            }
        }
        //==================|GENERATION NUMERO CLIENT PHYSIQUE|==================  
        /**
         * Generer un Numero de compte 
         * @return string
         *  */  
        public function physiqueNumGen(): string{
            $highest_id = $this->db->createQueryBuilder()
            ->select('MAX(c.id)')
            ->from('ClientPhysique', 'c')
            ->getQuery()
            ->getSingleScalarResult();
            $date = Date('Ymd'); //2020-07-01

            //Generate an Client Number as "TDTSB-MoisAnnee-lastIdCompte[select max(id) from compte]+1"
            $numIdClient = sprintf("BP-CP-%s-%d", $date, $highest_id+1);
            return $numIdClient;
        }

        //IL EST PAS POSSIBLE DE METTRE LA RECUPERATION DE LA LISTE ICI CAR UNE SESSION EST DEJA STARTED!

        //==================|TROUVER UN CLIENT PAR SON NUM|==================    
        /**
         * @return object
         */
        public function findPhysiqueByNum($numero){
            return $this->db->createQueryBuilder()->select('c')
            ->from('ClientPhysique', 'c')
            ->where('c.numId = :numeroClient')
            // ->orderBy('c.name', 'ASC')
            ->setParameter('numeroClient', $numero)
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
    }

    
        