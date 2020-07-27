<?php
use Doctrine\ORM\Annotation as ORM;

/**
 * @Entity @Table(name="CompteEPSX")
 **/
class CompteEPSX{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string", length=100, unique=true) **/
    private $accountNumber;
    /** @Column(type="integer") **/
    private $cleRIB;
    /**
     * Many CompteEPSX have one ClientPhysique. This is the owning side.
     * @ManyToOne(targetEntity="ClientPhysique", inversedBy="accounts",cascade={"persist"}, nullable=true)
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $idCliOwner_physique;
    /** @Column(type="decimal") **/
    private $solde;
    /**
     * @ManyToOne(targetEntity="State", inversedBy="accounts", nullable=true)
     * @JoinColumn(name="idState", referencedColumnName="id")
     */
    private $state;
    /** @Column(type="string") **/
    private $dateCreation;
    /** @Column(type="string", nullable=true) **/
    private $activeDate;
     /**
     * @ManyToOne(targetEntity="User", inversedBy="accounts", nullable=true)
     * @JoinColumn(name="idState", referencedColumnName="id")
     */
    private $idUserCreator;
    /** @Column(type="string") **/
    private $agencyNumber;
    /** @Column(type="string") **/
    private $openingFees;
    /** @Column(type="string") **/
    private $nextRemunDate;
    /** @Column(type="string", nullable=true) **/
    private $closeDate;

    

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
     * Get the value of accountNumber
     */ 
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * Set the value of accountNumber
     *
     * @return  self
     */ 
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    /**
     * Get the value of cleRIB
     */ 
    public function getCleRIB()
    {
        return $this->cleRIB;
    }

    /**
     * Set the value of cleRIB
     *
     * @return  self
     */ 
    public function setCleRIB($cleRIB)
    {
        $this->cleRIB = $cleRIB;

        return $this;
    }

    /**
     * Get the value of idCliOwner_physique
     */ 
    public function getIdCliOwner_physique()
    {
        return $this->idCliOwner_physique;
    }

    /**
     * Set the value of idCliOwner_physique
     *
     * @return  self
     */ 
    public function setIdCliOwner_physique($idCliOwner_physique)
    {
        $this->idCliOwner_physique = $idCliOwner_physique;

        return $this;
    }

    /**
     * Get the value of idCliOwner_moral
     */ 
    public function getIdCliOwner_moral()
    {
        return $this->idCliOwner_moral;
    }

    /**
     * Set the value of idCliOwner_moral
     *
     * @return  self
     */ 
    public function setIdCliOwner_moral($idCliOwner_moral)
    {
        $this->idCliOwner_moral = $idCliOwner_moral;

        return $this;
    }

    /**
     * Get the value of solde
     */ 
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * Set the value of solde
     *
     * @return  self
     */ 
    public function setSolde($solde)
    {
        $this->solde = $solde;

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
     * Get the value of activeDate
     */ 
    public function getActiveDate()
    {
        return $this->activeDate;
    }

    /**
     * Set the value of activeDate
     *
     * @return  self
     */ 
    public function setActiveDate($activeDate)
    {
        $this->activeDate = $activeDate;

        return $this;
    }

    /**
     * Get the value of idUserCreator
     */ 
    public function getIdUserCreator()
    {
        return $this->idUserCreator;
    }

    /**
     * Set the value of idUserCreator
     *
     * @return  self
     */ 
    public function setIdUserCreator($idUserCreator)
    {
        $this->idUserCreator = $idUserCreator;

        return $this;
    }

    /**
     * Get the value of agencyNumber
     */ 
    public function getAgencyNumber()
    {
        return $this->agencyNumber;
    }

    /**
     * Set the value of agencyNumber
     *
     * @return  self
     */ 
    public function setAgencyNumber($agencyNumber)
    {
        $this->agencyNumber = $agencyNumber;

        return $this;
    }

    /**
     * Get the value of openingFees
     */ 
    public function getOpeningFees()
    {
        return $this->openingFees;
    }

    /**
     * Set the value of openingFees
     *
     * @return  self
     */ 
    public function setOpeningFees($openingFees)
    {
        $this->openingFees = $openingFees;

        return $this;
    }

    /**
     * Get the value of nextRemunDate
     */ 
    public function getNextRemunDate()
    {
        return $this->nextRemunDate;
    }

    /**
     * Set the value of nextRemunDate
     *
     * @return  self
     */ 
    public function setNextRemunDate($nextRemunDate)
    {
        $this->nextRemunDate = $nextRemunDate;

        return $this;
    }

    /**
     * Get the value of closeDate
     */ 
    public function getCloseDate()
    {
        return $this->closeDate;
    }

    /**
     * Set the value of closeDate
     *
     * @return  self
     */ 
    public function setCloseDate($closeDate)
    {
        $this->closeDate = $closeDate;

        return $this;
    }
}
?>