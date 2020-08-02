<?php
// session_start();
namespace Orbit\src\controller;

use ClientPhysique;
use Orbit\libs\core\Controller;

class ClientController extends Controller
{
    protected $modelName = "Client";

    
    
    public function index()
    {
        // var_dump($this->loader);
        // var_dump($this->entity);
        $this->loader->render('CREER UN CLIENT',"createClient");
    }

    public function addPhysique()
    {
        // ===================[ NOUVEAU CLIENT PHYSIQUE ]===================
        // TODO: LEVEL SECURITY AT CONTROL WITH FACV
        if (isset($_POST['FormAddClientVALIDATOR']) && !(empty($_POST['formChooser']))) {
            extract($_POST);
            if ($formChooser == "physique") {
                if ($statutPro == "notWorking") {
                    $isSalarie = 0;
                } else {
                    $isSalarie = 1;
                }
                // $this->entity->
                // CAS D'UN CLIENT PHYSIQUE
                // TODO : WILL BE IMPLEMENTED IN THE FORM
                $features = "1,2,3,4";
                // TODO: WILL BE GENERATED & TAKEN FROM THE FORM
                $numIdCli = $this->model->physiqueNumGen();
                $dateCreate = Date('Ymd');
                // $this->entity = new ClientPhysique();
                $this->entity = new ClientPhysique();

                $this->entity->setNumId($numIdCli);
                $this->entity->setNom(strtoupper($nomClient));
                $this->entity->setPrenom($prenomClient);
                $this->entity->setEmail($email);
                $this->entity->setCni($cniClient);
                $this->entity->setTelephone($telClient);
                $this->entity->setAdresse($adresseClient);
                $this->entity->setSexe($sexeClient);
                $this->entity->setDateNaiss($dateNaiss);
                $this->entity->setDateCreation($dateCreate);
                $this->entity->setFeatures($features);
                $this->entity->setIsSalarie($isSalarie);

                // $row = $this->model->addPhysique($numIdCli, strtoupper($nomClient), $prenomClient, $email, $cniClient, $adresseClient, $sexeClient, $dateNaiss, $features, $isSalarie);
                $row = $this->model->addPhysique($this->entity);
                if ($row > 0) {
                    header('location:' . getProjectRoot() . 'client?formState="succeed"');
                } else {
                    header('location:' . getProjectRoot() . 'client?formState="error"');
                }
            } elseif ($formChooser == "moral") {
                // CAS D'UN CLIENT MORAL


            } else {
                header('location:' . getProjectRoot() . 'client?formForced=1');
            }

            // persistClient
        }
    }

    public function addMoral($a){
        // ===================[ NOUVEAU CLIENT MORAL ]===================
        echo "NOT DONE";
    }
}
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



