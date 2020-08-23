<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 *
 * @ORM\Table(name="profile", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_4EEA93936C6E55B5", columns={"nom"})})
 * @ORM\Entity
 */
class Profile
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
     * @ORM\ManyToMany(targetEntity="State", inversedBy="profile")
     * @ORM\JoinTable(name="profile_state",
     *   joinColumns={
     *     @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
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

}
