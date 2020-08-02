<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="ClientPhysique")
 **/
class ClientPhysique{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $numId;
    /** @Column(type="string", unique=true) **/
    private $nom;
    /** @Column(type="string") **/
    private $prenom;
    /** @Column(type="string") **/
    private $email;
    /** @Column(type="string", unique=true) **/
    private $cni;
    /** @Column(type="string", unique=true) **/
    private $telephone;
    /** @Column(type="string") **/
    private $adresse;
    /** @Column(type="string") **/
    private $sexe;
    /** @Column(type="string") **/
    private $dateNaiss;
    /** @Column(type="string") **/
    private $dateCreation;
    /** @Column(type="string") **/
    private $features;
    /** @Column(type="string") **/
    private $isSalarie;
    /**
     * @OneToMany(targetEntity="CompteEPSX", mappedBy="CliOwner_physique")
     **/
    private $accounts;

    /*======================================
    # 🚀🧱🧰 CONSTRUCTOR 🧰🧱🚀
    ======================================*/
    public function __construct()
    {
        $this->accounts = new ArrayCollection();
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
     * Get the value of numId
     */ 
    public function getNumId()
    {
        return $this->numId;
    }

    /**
     * Set the value of numId
     *
     * @return  self
     */ 
    public function setNumId($numId)
    {
        $this->numId = $numId;

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
     * Get the value of features
     */ 
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * Set the value of features
     *
     * @return  self
     */ 
    public function setFeatures($features)
    {
        $this->features = $features;

        return $this;
    }

    /**
     * Get the value of isSalarie
     */ 
    public function getIsSalarie()
    {
        return $this->isSalarie;
    }

    /**
     * Set the value of isSalarie
     *
     * @return  self
     */ 
    public function setIsSalarie($isSalarie)
    {
        $this->isSalarie = $isSalarie;

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
    // ❌❌❌❌❌❌❌❌❌❌❌❌❌❌❌❌❌❌❌❌❌❌
}
?>
