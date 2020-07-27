<?php
use Doctrine\ORM\Annotation as ORM;

/**
 * @Entity @Table(name="Agency")
 **/
class Agency{
    
    private $id;

    private $nom;

    private $creationDate;

    private $lieu;

    private $state;

    private $numAgency;



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
}

?>
