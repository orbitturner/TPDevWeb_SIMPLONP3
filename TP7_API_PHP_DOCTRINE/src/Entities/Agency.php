<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="Agency")
 **/
class Agency{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $nom;
    /** @Column(type="string") **/
    private $creationDate;    
    /** @Column(type="string") **/
    private $lieu;
    /**
     * @ManyToMany(targetEntity="State", inversedBy="agency")
     * @JoinTable(name="agency_state")
     */
    private $state;
    /** @Column(type="string", unique=true) **/
    private $numAgency;
    /**
     * @OneToMany(targetEntity="CompteEPSX", mappedBy="agencyNumber")
     **/
    private $accounts;
    /**
     * @OneToMany(targetEntity="Employee", mappedBy="agencyNumber")
     **/
    private $employees;

    /*======================================
    # 🚀🧱🧰 CONSTRUCTOR 🧰🧱🚀
    ======================================*/
    public function __construct()
    {
        $this->accounts = new ArrayCollection();
        $this->employees = new ArrayCollection();
        // $this->state = new ArrayCollection();
    }

    /*======================================
    # 🧿📥 GETTERS & SETTERS 📥🧿
    ======================================*/
    /**
     * Get the value of numAgency
     */ 
    public function getNumAgency()
    {
        return $this->numAgency;
    }

    /**
     * Set the value of numAgency
     *
     * @return  self
     */ 
    public function setNumAgency($numAgency)
    {
        $this->numAgency = $numAgency;

        return $this;
    }

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
     * Get the value of creationDate
     */ 
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set the value of creationDate
     *
     * @return  self
     */ 
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get the value of lieu
     */ 
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set the value of lieu
     *
     * @return  self
     */ 
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

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

?>
