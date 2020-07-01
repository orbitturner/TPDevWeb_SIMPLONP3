<?php
    require_once('db.php');
    $db = dbConnector();
    /*null,$accountNumber,$cleRIB,$ownerCompte, $soldeAccount, $state, null,$idConnectedUser,$numAgency, $accountCreationFee, $nextRemunDate*/
    //==================| CREATION D'UN EPARGNE XEEWEUL SIMPLE |==================    
    function persistCompteEPSX($accountNumber,$cleRIB,$idOwnerCompte, $soldeAccount, $state, $idConnectedUser,$numAgency, $accountCreationFee, $nextRemunDate,$typeClientOwner){
        
        global $db;
        $date = Date('Y-m-d'); //2020-07-01

        // PREPARED QUERY
        $req = "INSERT into compte_epargne_sx VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
                
        // SQL INJECTION PREVENT
        if($typeClientOwner == 1) {
            $db->prepare($req)->execute(array(null,$accountNumber,$cleRIB,$idOwnerCompte,null, $soldeAccount, $state, $date, null,$idConnectedUser,$numAgency, $accountCreationFee, $nextRemunDate,null));
        }else {
            $db->prepare($req)->execute(array(null,$accountNumber,$cleRIB,null, $idOwnerCompte,$soldeAccount, $state, $date, null,$idConnectedUser,$numAgency, $accountCreationFee, $nextRemunDate,null));
        }


        return $idCompte = $db->lastInsertId();

        //test if the request has been executed 
        // if ($idCompte > 0) {
        //    return depot($soldeAccount, 'DEPOT',$idCompte, $idUser);
        // }
        /*null,$accountNumber,$cleRIB,$ownerCompte, $soldeAccount, $state, null,$idConnectedUser,$numAgency, $accountCreationFee, $nextRemunDate*/
    } 


//==================|GENERATION NUMERO COMPTE|==================    
    function accountNumGen ($idActualAgency){

        global $db;
        $date = Date('Ymd'); //2020-07-01
        $req = $db ->query ('SELECT max(id_compte_ep) FROM compte_epargne_sx')->fetchColumn();

        //Generate an AccountNumber as "TDTSB-MoisAnnee-lastIdCompte[select max(id) from compte]+1"
        $codeAccount = sprintf("BP-SN-%s-%d-%d", $date, $req+1, $idActualAgency);
        return $codeAccount;
    }

    //IL EST PAS POSSIBLE DE METTRE LA RECUPERATION DE LA LISTE ICI CAR UNE SESSION EST DEJA STARTED!

    //==================|TROUVER UN COMPTE PAR SON NUM|==================    
    function findAccountByNum($numero){
        $sql = "SELECT * FROM compte_epargne_sx WHERE accountNumber='$numero'";
        
        global $db;

        return $db->query($sql)->fetch();
    }