<?php 
// session_start();
    require_once '../routes/dir.php';
    require_once('../model/clientModel.php');
        // TEST
        // var_dump($_POST);
        /*array(17) { ["formChooser"]=> string(8) "physique" 
                ["prenomClient"]=> string(5) "MARIE" 
                ["nomClient"]=> string(4) "MAPE" 
                ["email"]=> string(21) "orbitturner@gmail.com" 
                ["dateNaiss"]=> string(10) "2020-06-30" 
                ["sexeClient"]=> string(1) "F" 
                ["cniClient"]=> string(13) "7897545612313" 
                ["telClient"]=> string(9) "778852525" 
                ["adresseClient"]=> string(5) "DAKAR" 
                ["statutPro"]=> string(10) "notWorking" 
                ["salaireClient"]=> string(0) "" 
                ["profession"]=> string(0) "" 
                ["nomEmployeur"]=> string(0) "" 
                ["raisonSocial"]=> string(0) "" 
                ["adresseEmployeur"]=> string(0) "" 
                ["numIdentEmp"]=> string(0) "" 
                ["FormAddClientVALIDATOR"]=> string(0) "" }*/
// ===================[ NOUVEAU CLIENT PHYSIQUE ]===================
// TODO: LEVEL SECURITY AT CONTROL WITH FACV
if (isset($_POST['FormAddClientVALIDATOR']) && !(empty($_POST['formChooser']))) {
    extract($_POST);
    if ($formChooser == "physique") {
        if ($statutPro == "notWorking") {
            $isSalarie = 0;
        }else {
            $isSalarie = 1;
        }
        // CAS D'UN CLIENT PHYSIQUE
        // TODO : WILL BE IMPLEMENTED IN THE FORM
        $features = "1,2,3,4";
        // TODO: WILL BE GENERATED & TAKEN FROM THE FORM
        $numIdCli = clientPhysiqueNumGen();

        $row = persistClientPhysique($numIdCli,strtoupper($nomClient), $prenomClient, $email, $cniClient, $adresseClient, $sexeClient, $dateNaiss, $features, $isSalarie);
        if ($row > 0) {
            // var_dump($row);
            header('location:'.getProjectRoot().'newclientFSS');
        }else {
            // var_dump($row);
            // echo "ERROR IN THE FORM";
            header('location:'.getProjectRoot().'newclientFSE');
        }
    } elseif($formChooser == "moral"){
        // CAS D'UN CLIENT MORAL


    }else {
        header('location:'.getProjectRoot().'newclient?formForced=1');
    }
    
    // persistClient
}




// ===================[ NOUVEAU CLIENT MORAL ]===================