<?php
    require_once('../libs/core/Model.php');

    class Client extends Model{
        
        //==================|CREATION D'UN CLIENT PHYSIQUE|==================  
        /**
         * Insert un client physique par requete preparee
         * @return integer
         *  */  
        public function persistPhysique($numIdCli,$nomClient, $prenomClient, $email, $cniClient, $adresseClient, $sexeClient, $dateNaiss, $features, $isSalarie){
            $date = Date('Y-m-d'); //2020-07-01
            
            // PREPARED QUERY
            $request = "INSERT INTO client_physique Values (?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?)";
            
            // SQL INJECTION PREVENT
            $this->db->prepare($request)->execute(array(null, $numIdCli, $nomClient, $prenomClient, $email, $cniClient, $adresseClient, $sexeClient, $dateNaiss,$date, $features, $isSalarie));
            
            // OLD TESTING : $this->db->exec($request);
            //Exec renvoi le nombre de ligne inseré
            return $this->db->lastInsertId();
            //Renvoi le dernier Identifiant Insérer au niveau de la table specifie
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

    
        