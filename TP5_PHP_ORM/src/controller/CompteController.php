<?php
// session_start();
namespace Orbit\src\controller;

use CompteEPSX;
use Orbit\libs\core\Controller;
use Orbit\src\model\Agency;
use Orbit\src\model\Client as ModelClient;
use Orbit\src\model\State;
use Orbit\src\model\OpeningFees as ModelFees;
use Orbit\src\model\User as ModelUser;

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
        $accountTypesValidate = array("cesp", "cc", "cb");
        // ===================[ NOUVEAU COMPTE EPARGNE XEEWEUL SIMPLE ]===================
        if (isset($_POST['FormAddAccountVALIDATOR']) && !(empty($_POST['typeAccount'])) && in_array($_POST['typeAccount'], $accountTypesValidate) == true && $_POST['typeAccount'] == 'cesp') {

            extract($_POST);
            // WILL BE IN AN SESSION
            $ownerCompte = 1;
            $state = 1;
            $idConnectedUser = 1;
            $idCreationFee = 1;
            $idActualAgency = 1;
            // $typeClientOwner = 1;

            // INSTANCE OF OBJECTS FOR FOREIGN KEYS
            $clientOwner = new ModelClient();
            $accountState = new State();
            $userCreator = new ModelUser();
            $creationFees = new ModelFees();
            $actualAgency = new Agency();

            
            
            // FINDING OBJECTS
            $accountState = $accountState->findStateById($state);
            // var_dump($accountState);
            // die();
            $clientOwner = $clientOwner->findPhysiqueById($ownerCompte);
            $creationFees = $creationFees->findOpFeesById($idCreationFee);
            $actualAgency = $actualAgency->findAgencyById($idActualAgency);
            $userCreator = $userCreator->findUserById($idConnectedUser);
            $accountNumber = $this->model->generateAccNumber($idActualAgency);
            

            $dateCreate = Date('Y-m-d'); //2020-07-01
            // var_dump($accountNumber); To Add Client Moral Managing
            

            // INSTANTIATION
            $this->entity = new CompteEPSX();
            $this->entity->setAccountNumber($accountNumber);
            $this->entity->setCleRIB($cleRIB);
            $this->entity->setCliOwner_physique($clientOwner);
            $this->entity->setSolde($soldeAccount);
            $this->entity->setState($accountState);
            $this->entity->setDateCreation($dateCreate);
            $this->entity->setActiveDate($dateCreate);
            $this->entity->setIdUserCreator($userCreator);
            $this->entity->setAgencyNumber($actualAgency);
            $this->entity->setOpeningFees($creationFees);
            $this->entity->setNextRemunDate($nextRemunDate);
            // PERSISTING
            // var_dump($this->entity->getAgencyNumber());
            die();
            $row = $this->model->addEPSX($this->entity);

            if ($row > 0) {
                // var_dump($row);
                header('location:' . getProjectRoot() . 'compte?formState="succeed"');
            } else {
                // echo "ERROR IN THE FORM";
                header('location:' . getProjectRoot() . 'compte?formState="error"');
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
                ["FormAddAccountVALIDATOR"]=> string(4) "true" }*/
                
?>