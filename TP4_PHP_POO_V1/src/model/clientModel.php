<?php
    require_once('db.php');
    $db = dbConnector();
    //==================|CREATION D'UN CLIENT PHYSIQUE|==================    
    function persistClientPhysique($numIdCli,$nomClient, $prenomClient, $email, $cniClient, $adresseClient, $sexeClient, $dateNaiss, $features, $isSalarie){
        global $db;
        $date = Date('Y-m-d'); //2020-07-01
        
        // PREPARED QUERY
        $request = "INSERT INTO client_physique Values (?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?)";
        
        // SQL INJECTION PREVENT
        $db->prepare($request)->execute(array(null, $numIdCli, $nomClient, $prenomClient, $email, $cniClient, $adresseClient, $sexeClient, $dateNaiss,$date, $features, $isSalarie));
        
        // OLD TESTING : $db->exec($request);
        //Exec renvoi le nombre de ligne inseré
        return $db->lastInsertId();
        //Renvoi le dernier Identifiant Insérer au niveau de la table specifie
    }

     //==================|GENERATION NUMERO CLIENT PHYSIQUE|==================    
     function clientPhysiqueNumGen(){

        global $db;
        $date = Date('Ymd'); //2020-07-01
        $req = $db ->query ('SELECT max(id_client) FROM client_physique')->fetchColumn();

        //Generate an Client Number as "TDTSB-MoisAnnee-lastIdCompte[select max(id) from compte]+1"
        $numIdClient = sprintf("BP-CP-%s-%d", $date, $req+1);
        return $numIdClient;
    }

    //IL EST PAS POSSIBLE DE METTRE LA RECUPERATION DE LA LISTE ICI CAR UNE SESSION EST DEJA STARTED!

    //==================|TROUVER UN CLIENT PAR SON NUM|==================    
    function findClientByNum($numero){
        $sql = "SELECT * FROM client_physique WHERE numIdentification='$numero'";
        
        global $db;

        return $db->query($sql)->fetch();
    }