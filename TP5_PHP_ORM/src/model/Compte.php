<?php
namespace Orbit\src\model;
use Orbit\libs\core\Model;
    // require_once('../libs/core/Model.php');
    

    class Compte extends Model{

        /*null,$accountNumber,$cleRIB,$ownerCompte, $soldeAccount, $state, null,$idConnectedUser,$numAgency, $accountCreationFee, $nextRemunDate*/
        //==================| CREATION D'UN EPARGNE XEEWEUL SIMPLE |==================    
        public function persistEPSX($accountNumber,$cleRIB,$idOwnerCompte, $soldeAccount, $state, $idConnectedUser,$numAgency, $accountCreationFee, $nextRemunDate,$typeClientOwner){
            
            $date = Date('Y-m-d'); //2020-07-01

            // PREPARED QUERY
            $req = "INSERT into compte_epargne_sx VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
                    
            // SQL INJECTION PREVENT
            if($typeClientOwner == 1) {
                $this->db->prepare($req)->execute(array(null,$accountNumber,$cleRIB,$idOwnerCompte,null, $soldeAccount, $state, $date, null,$idConnectedUser,$numAgency, $accountCreationFee, $nextRemunDate,null));
            }else {
                $this->db->prepare($req)->execute(array(null,$accountNumber,$cleRIB,null, $idOwnerCompte,$soldeAccount, $state, $date, null,$idConnectedUser,$numAgency, $accountCreationFee, $nextRemunDate,null));
            }


            return $idCompte = $this->db->lastInsertId();

            //test if the request has been executed 
            // if ($idCompte > 0) {
            //    return depot($soldeAccount, 'DEPOT',$idCompte, $idUser);
            // }
            /*null,$accountNumber,$cleRIB,$ownerCompte, $soldeAccount, $state, null,$idConnectedUser,$numAgency, $accountCreationFee, $nextRemunDate*/
        } 


        //==================|GENERATION NUMERO COMPTE|==================    
        public function generateAccNumber ($idActualAgency):string{

            $date = Date('Ymd'); //2020-07-01
            $req = $this->db->query ('SELECT max(id_compte_ep) FROM compte_epargne_sx')->fetchColumn();

            //Generate an AccountNumber as "TDTSB-MoisAnnee-lastIdCompte[select max(id) from compte]+1"
            $codeAccount = sprintf("BP-SN-%s-%d-%d", $date, $req+1, $idActualAgency);
            return $codeAccount;
        }

        //IL EST PAS POSSIBLE DE METTRE LA RECUPERATION DE LA LISTE ICI CAR UNE SESSION EST DEJA STARTED!

        //==================|TROUVER UN COMPTE PAR SON NUM|==================    
        public function findByNum($numero){
            $sql = $this->db->prepare("SELECT * FROM compte_epargne_sx WHERE accountNumber = :numero");

            $sql ->execute(['numero' => $numero]);

            return $sql->fetch();
        }
    }
