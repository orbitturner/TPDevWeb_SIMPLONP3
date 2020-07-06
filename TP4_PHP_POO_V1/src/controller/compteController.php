<?php
// session_start();
// // require_once '../routes/dir.php';
require_once('../libs/core/Controller.php');
// $model = new Compte();
class CompteController extends Controller
{

    protected $modelName = "Compte";


    public function index()
    {
        // var_dump($this->loader);
        $this->loader->render('CREER UN COMPTE', "createAccount");
    }

    public function add()
    {
        // ===================[ NOUVEAU COMPTE EPARGNE XEEWEUL SIMPLE ]===================
        if (isset($_POST['FormAddAccountVALIDATOR']) && !(empty($_POST['typeAccount'])) && in_array($_POST['typeAccount'], $accountTypesValidate) == true && $_POST['typeAccount'] == 'cesp') {

            extract($_POST);
            // WILL BE AN SESSION
            $idOwnerCompte = 1;
            // CONNECTED EMPLOYEE
            $idConnectedUser = 1;
            $accountCreationFee = 1;
            $numAgency = 'BP-TEST-DK-1010-001';
            $idActualAgency = 1;
            $accountNumber = $model->generateAccNumber($idActualAgency);
            $state = 1;
            $typeClientOwner = 1;
            // var_dump($accountNumber);
            // INSERTING
            $row = $model->persistEPSX($accountNumber, $cleRIB, $idOwnerCompte, $soldeAccount, $state, $idConnectedUser, $numAgency, $accountCreationFee, $nextRemunDate, $typeClientOwner);

            if ($row > 0) {
                // var_dump($row);
                header('location:' . getProjectRoot() . 'newaccountFSS');
            } else {
                // echo "ERROR IN THE FORM";
                header('location:' . getProjectRoot() . 'newaccountFSE');
            }
        } else {
            echo "<h1 align='center'>ERREUR FORMULAIRE! </h1>";
            echo "<h1 align='center'>ACCES REFUSE! </h1>";
            echo "<h2 align='center'>Contactez Votre ADMIN </h2>";
            echo '<script>window.setTimeout("location=(\'http://localhost' . getProjectRoot() . 'home\');",5000);</script>';
            echo '<p align="center">Vous serez redirigé dans 5s...</p>';
        }
    }
}
    
    // TEST
        // var_dump($_POST);
        /*
            array(10) { 
                ["typeAccount"]=> string(4) "cesp" 
                ["ownerCompte"]=> string(1) "1" 
                ["cleRIB"]=> string(8) "10" 
                ["soldeAccount"]=> string(8) "78522.22" 
                ["accountNumber"]=> string(14) "CSB-856-DK-655" 
                ["accountCreationFee"]=> string(7) "5200.00" 
                ["nextRemunDate"]=> string(10) "2020-12-12" 
                ["agios"]=> string(7) "8700.00" 
                ["echeanceDateCptB"]=> string(10) "2005-10-10" }
                ["FormAddAccountVALIDATOR"]=> string(4) "true" }
                $accountTypesValidate = array("cesp", "cc", "cb");*/
