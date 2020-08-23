<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clientphysique
 *
 * @ORM\Table(name="clientphysique", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8D9E97697AC033BE", columns={"cni"}), @ORM\UniqueConstraint(name="UNIQ_8D9E97696C6E55B5", columns={"nom"}), @ORM\UniqueConstraint(name="UNIQ_8D9E9769450FF010", columns={"telephone"})})
 * @ORM\Entity(repositoryClass="App\Repository\ClientphysiqueRepository")
 */
class Clientphysique
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="numId", type="string", length=255, nullable=false)
     */
    private $numid;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="cni", type="string", length=255, nullable=false)
     */
    private $cni;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=false)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=255, nullable=false)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="dateNaiss", type="string", length=255, nullable=false)
     */
    private $datenaiss;

    /**
     * @var string
     *
     * @ORM\Column(name="dateCreation", type="string", length=255, nullable=false)
     */
    private $datecreation;

    /**
     * @var string
     *
     * @ORM\Column(name="features", type="string", length=255, nullable=false)
     */
    private $features;

    /**
     * @var string
     *
     * @ORM\Column(name="isSalarie", type="string", length=255, nullable=false)
     */
    private $issalarie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumid(): ?string
    {
        return $this->numid;
    }

    public function setNumid(string $numid): self
    {
        $this->numid = $numid;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCni(): ?string
    {
        return $this->cni;
    }

    public function setCni(string $cni): self
    {
        $this->cni = $cni;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDatenaiss(): ?string
    {
        return $this->datenaiss;
    }

    public function setDatenaiss(string $datenaiss): self
    {
        $this->datenaiss = $datenaiss;

        return $this;
    }

    public function getDatecreation(): ?string
    {
        return $this->datecreation;
    }

    public function setDatecreation(string $datecreation): self
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getFeatures(): ?string
    {
        return $this->features;
    }

    public function setFeatures(array $features): self
    {
        // Converts the array to String beacause it comes from the form as Array
        $this->features = implode("|",$features);

        return $this;
    }

    public function getIssalarie(): ?string
    {
        return $this->issalarie;
    }

    public function setIssalarie(string $issalarie): self
    {
        $this->issalarie = $issalarie;

        return $this;
    }
    
    /**
     * Generates the magic method To String Function
     *
     * @return string
     */
    public function __toString(){
        // to show the name of the Agency in the select
        return $this->nom;
        // to show the id of the Agency in the select
        // return $this->id;
    }

}
