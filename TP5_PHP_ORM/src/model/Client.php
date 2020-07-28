<?php
namespace Orbit\src\model;
use Orbit\libs\core\Model;


    class Client extends Model{

        
        public function __construct()
        {
            parent::__construct();
            // var_dump($this->db->persist());
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
        //==================|GENERATION NUMERO CLIENT PHYSIQUE|==================  
        /**
         * Generer un Numero de compte 
         * @return string
         *  */  
        public function physiqueNumGen(): string{

            $date = Date('Ymd'); //2020-07-01
            $req = $this->db ->query ('SELECT max(id_client) FROM client_physique')->fetchColumn();

            //Generate an Client Number as "TDTSB-MoisAnnee-lastIdCompte[select max(id) from compte]+1"
            $numIdClient = sprintf("BP-CP-%s-%d", $date, $req+1);
            return $numIdClient;
        }

        //IL EST PAS POSSIBLE DE METTRE LA RECUPERATION DE LA LISTE ICI CAR UNE SESSION EST DEJA STARTED!

        //==================|TROUVER UN CLIENT PAR SON NUM|==================    
        /**
         * return array
         */
        public function findPhysiqueByNum($numero){
            $sql = $this->db->prepare("SELECT * FROM client_physique WHERE numIdentification=:numero");

            $sql ->execute(['numero' => $numero]);

            return $sql->fetch();
        }
    }

    
        