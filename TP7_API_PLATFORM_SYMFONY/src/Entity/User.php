<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_2DA17977AA08CB10", columns={"login"})}, indexes={@ORM\Index(name="IDX_2DA1797785C71A0D", columns={"idProfil"})})
 * @ORM\Entity
 */
class User
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
     * @ORM\Column(name="login", type="string", length=255, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="dateCreation", type="string", length=255, nullable=false)
     */
    private $datecreation;

    /**
     * @var \Profile
     *
     * @ORM\ManyToOne(targetEntity="Profile")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProfil", referencedColumnName="id")
     * })
     */
    private $idprofil;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="State", inversedBy="user")
     * @ORM\JoinTable(name="user_state",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     *   }
     * )
     */
    private $state;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->state = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function getIdprofil(): ?Profile
    {
        return $this->idprofil;
    }

    public function setIdprofil(?Profile $idprofil): self
    {
        $this->idprofil = $idprofil;

        return $this;
    }

    /**
     * @return Collection|State[]
     */
    public function getState(): Collection
    {
        return $this->state;
    }

    public function addState(State $state): self
    {
        if (!$this->state->contains($state)) {
            $this->state[] = $state;
        }

        return $this;
    }

    public function removeState(State $state): self
    {
        if ($this->state->contains($state)) {
            $this->state->removeElement($state);
        }

        return $this;
    }

    /**
     * Generates the magic method To String Function
     *
     * @return string
     */
    public function __toString(){
        // to show the name of the Agency in the select
        return $this->login;
        // to show the id of the Agency in the select
        // return $this->id;
    }
}
