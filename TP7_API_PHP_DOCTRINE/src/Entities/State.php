<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Annotation as ORM;

/**
 * @Entity @Table(name="State")
 **/
class State{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string", unique=true) **/
    private $nom;
    /** @Column(type="string") **/
    private $description;
    /**
     * @ManyToMany(targetEntity="CompteEPSX", mappedBy="state")
     **/
    private $accounts;
    /**
     * @ManyToMany(targetEntity="Agency", mappedBy="state")
     **/
    private $agencies;
    /**
     * @ManyToMany(targetEntity="Profile", mappedBy="state")
     **/
    private $profiles;
    /**
     * @ManyToMany(targetEntity="User", mappedBy="state")
     **/
    private $users;

    /*======================================
    # 🚀🧱🧰 CONSTRUCTOR 🧰🧱🚀
    ======================================*/
    public function __construct()
    {
        // $this->accounts = new ArrayCollection();
        $this->agencies = new ArrayCollection();
        $this->profiles = new ArrayCollection();
        $this->users = new ArrayCollection();
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
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
    // ❌❌❌❌❌❌❌❌❌❌❌❌❌❌❌❌❌❌❌❌❌❌


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
        $this->accounts[] = $accounts;

        return $this;
    }

    /**
     * Get the value of agencies
     */ 
    public function getAgencies()
    {
        return $this->agencies;
    }

    /**
     * Set the value of agencies
     *
     * @return  self
     */ 
    public function setAgencies($agencies)
    {
        $this->agencies = $agencies;

        return $this;
    }

    /**
     * Get the value of profiles
     */ 
    public function getProfiles()
    {
        return $this->profiles;
    }

    /**
     * Set the value of profiles
     *
     * @return  self
     */ 
    public function setProfiles($profiles)
    {
        $this->profiles = $profiles;

        return $this;
    }

    /**
     * Get the value of users
     */ 
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set the value of users
     *
     * @return  self
     */ 
    public function setUsers($users)
    {
        $this->users = $users;

        return $this;
    }
}