<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Annotation as ORM;

/**
 * @Entity @Table(name="User")
 **/
class User{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $nom;
    /** @Column(type="string") **/
    private $prenom;
    /** @Column(type="string", unique=true) **/
    private $login;
    /** @Column(type="string") **/
    private $password;
    /**
     * @ManyToOne(targetEntity="Profile", inversedBy="users")
     * @JoinColumn(name="idProfil", referencedColumnName="id")
     */
    private $profil;
    /**
     * @ManyToMany(targetEntity="State", inversedBy="users")
     * @JoinTable(name="user_state")
     */
    private $state;
    /** @Column(type="string") **/
    private $dateCreation;
    /**
     * @OneToMany(targetEntity="CompteEPSX", mappedBy="idUserCreator")
     **/
    private $accounts;
    /**
     * @OneToMany(targetEntity="Employee", mappedBy="userAccount")
     **/
    private $employees;

    /*======================================
    # 🚀🧱🧰 CONSTRUCTOR 🧰🧱🚀
    ======================================*/
    public function __construct()
    {
        $this->accounts = new ArrayCollection();
        $this->employees = new ArrayCollection();
        $this->state = new ArrayCollection();
    }
    


    /*======================================
    # 🧿📥 GETTERS & SETTERS 📥🧿
    ======================================*/
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
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of profil
     */ 
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set the value of profil
     *
     * @return  self
     */ 
    public function setProfil($profil)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of dateCreation
     */ 
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set the value of dateCreation
     *
     * @return  self
     */ 
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get the value of accounts
     */ 
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * Set the value of accounts
     *
     * @return  self
     */ 
    public function setAccounts($accounts)
    {
        $this->accounts = $accounts;

        return $this;
    }

    /**
     * Get the value of employees
     */ 
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * Set the value of employees
     *
     * @return  self
     */ 
    public function setEmployees($employees)
    {
        $this->employees = $employees;

        return $this;
    }
}