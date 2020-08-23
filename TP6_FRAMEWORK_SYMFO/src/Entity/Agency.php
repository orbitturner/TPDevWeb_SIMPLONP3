<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Agency
 *
 * @ORM\Table(name="agency", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_776CC3D0BAD79E3A", columns={"numAgency"})})
 * @ORM\Entity
 */
class Agency
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
     * @ORM\Column(name="creationDate", type="string", length=255, nullable=false)
     */
    private $creationdate;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255, nullable=false)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="numAgency", type="string", length=255, nullable=false)
     */
    private $numagency;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="State", inversedBy="agency")
     * @ORM\JoinTable(name="agency_state",
     *   joinColumns={
     *     @ORM\JoinColumn(name="agency_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     *   }
     * )
     */
    private $state;
    
    /**
     * @ORM\OneToMany(targetEntity="Compteepsx", mappedBy="hostagency")
     **/
    private $accounts;
    
    /**
     * @ORM\OneToMany(targetEntity="Employee", mappedBy="agencyhost")
     **/
    private $employees;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->state = new \Doctrine\Common\Collections\ArrayCollection();
        $this->accounts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->employees = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getCreationdate(): ?string
    {
        return $this->creationdate;
    }

    public function setCreationdate(string $creationdate): self
    {
        $this->creationdate = $creationdate;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getNumagency(): ?string
    {
        return $this->numagency;
    }

    public function setNumagency(string $numagency): self
    {
        $this->numagency = $numagency;

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
     * @return Collection|CompteEPSX[]
     */
    public function getAccounts(): Collection
    {
        return $this->accounts;
    }

    public function addAccount(CompteEPSX $account): self
    {
        if (!$this->accounts->contains($account)) {
            $this->accounts[] = $account;
            $account->setHostagency($this);
        }

        return $this;
    }

    public function removeAccount(CompteEPSX $account): self
    {
        if ($this->accounts->contains($account)) {
            $this->accounts->removeElement($account);
            // set the owning side to null (unless already changed)
            if ($account->getHostagency() === $this) {
                $account->setHostagency(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Employee[]
     */
    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    public function addEmployee(Employee $employee): self
    {
        if (!$this->employees->contains($employee)) {
            $this->employees[] = $employee;
            $employee->setAgencyhost($this);
        }

        return $this;
    }

    public function removeEmployee(Employee $employee): self
    {
        if ($this->employees->contains($employee)) {
            $this->employees->removeElement($employee);
            // set the owning side to null (unless already changed)
            if ($employee->getAgencyhost() === $this) {
                $employee->setAgencyhost(null);
            }
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
