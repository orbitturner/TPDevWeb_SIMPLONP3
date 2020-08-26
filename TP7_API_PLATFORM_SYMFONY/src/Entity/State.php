<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * State
 *
 * @ORM\Table(name="state", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_6252FDFF6C6E55B5", columns={"nom"})})
 * @ORM\Entity
 */
class State
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
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Agency", mappedBy="state")
     */
    private $agency;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Compteepsx", mappedBy="state")
     */
    private $compteepsx;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Profile", mappedBy="state")
     */
    private $profile;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="state")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->agency = new \Doctrine\Common\Collections\ArrayCollection();
        $this->compteepsx = new \Doctrine\Common\Collections\ArrayCollection();
        $this->profile = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Agency[]
     */
    public function getAgency(): Collection
    {
        return $this->agency;
    }

    public function addAgency(Agency $agency): self
    {
        if (!$this->agency->contains($agency)) {
            $this->agency[] = $agency;
            $agency->addState($this);
        }

        return $this;
    }

    public function removeAgency(Agency $agency): self
    {
        if ($this->agency->contains($agency)) {
            $this->agency->removeElement($agency);
            $agency->removeState($this);
        }

        return $this;
    }

    /**
     * @return Collection|Compteepsx[]
     */
    public function getCompteepsx(): Collection
    {
        return $this->compteepsx;
    }

    public function addCompteepsx(Compteepsx $compteepsx): self
    {
        if (!$this->compteepsx->contains($compteepsx)) {
            $this->compteepsx[] = $compteepsx;
            $compteepsx->addState($this);
        }

        return $this;
    }

    public function removeCompteepsx(Compteepsx $compteepsx): self
    {
        if ($this->compteepsx->contains($compteepsx)) {
            $this->compteepsx->removeElement($compteepsx);
            $compteepsx->removeState($this);
        }

        return $this;
    }

    /**
     * @return Collection|Profile[]
     */
    public function getProfile(): Collection
    {
        return $this->profile;
    }

    public function addProfile(Profile $profile): self
    {
        if (!$this->profile->contains($profile)) {
            $this->profile[] = $profile;
            $profile->addState($this);
        }

        return $this;
    }

    public function removeProfile(Profile $profile): self
    {
        if ($this->profile->contains($profile)) {
            $this->profile->removeElement($profile);
            $profile->removeState($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->addState($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
            $user->removeState($this);
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
        return $this->nom;
        // to show the id of the Agency in the select
        // return $this->id;
    }
}
