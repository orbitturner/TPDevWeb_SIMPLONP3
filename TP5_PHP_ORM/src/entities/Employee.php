<?php
use Doctrine\ORM\Annotation as ORM;

/**
 * @Entity @Table(name="Employee")
 **/
class Employee{

    private $id;

    private $numEmployee;

    private $userAccount;

    private $telephone;

    private $email;

    private $cni;

    private $adresse;

    private $sexe;

    private $service;

    private $agence;

    private $dateNaiss;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of numEmployee
     */ 
    public function getNumEmployee()
    {
        return $this->numEmployee;
    }

    /**
     * Set the value of numEmployee
     *
     * @return  self
     */ 
    public function setNumEmployee($numEmployee)
    {
        $this->numEmployee = $numEmployee;

        return $this;
    }

    /**
     * Get the value of userAccount
     */ 
    public function getUserAccount()
    {
        return $this->userAccount;
    }

    /**
     * Set the value of userAccount
     *
     * @return  self
     */ 
    public function setUserAccount($userAccount)
    {
        $this->userAccount = $userAccount;

        return $this;
    }

    /**
     * Get the value of telephone
     */ 
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */ 
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of cni
     */ 
    public function getCni()
    {
        return $this->cni;
    }

    /**
     * Set the value of cni
     *
     * @return  self
     */ 
    public function setCni($cni)
    {
        $this->cni = $cni;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of sexe
     */ 
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set the value of sexe
     *
     * @return  self
     */ 
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get the value of service
     */ 
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set the value of service
     *
     * @return  self
     */ 
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get the value of agence
     */ 
    public function getAgence()
    {
        return $this->agence;
    }

    /**
     * Set the value of agence
     *
     * @return  self
     */ 
    public function setAgence($agence)
    {
        $this->agence = $agence;

        return $this;
    }

    /**
     * Get the value of dateNaiss
     */ 
    public function getDateNaiss()
    {
        return $this->dateNaiss;
    }

    /**
     * Set the value of dateNaiss
     *
     * @return  self
     */ 
    public function setDateNaiss($dateNaiss)
    {
        $this->dateNaiss = $dateNaiss;

        return $this;
    }
}