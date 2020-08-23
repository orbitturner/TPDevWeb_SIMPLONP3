<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Compteepsx
 *
 * @ORM\Table(name="compteepsx", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_476A19E52D8B2F8F", columns={"accountNumber"})}, indexes={@ORM\Index(name="IDX_476A19E5FE6E88D7", columns={"idUser"}), @ORM\Index(name="IDX_476A19E57E3C61F9", columns={"owner_id"}), @ORM\Index(name="IDX_476A19E5EB0DA29F", columns={"idOpeningFees"}), @ORM\Index(name="IDX_476A19E515C879D0", columns={"hostAgency"})})
 * @ORM\Entity(repositoryClass="App\Repository\CompteepsxRepository")
 */
class Compteepsx
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
     * @ORM\Column(name="accountNumber", type="string", length=100, nullable=false)
     */
    private $accountnumber;

    /**
     * @var int
     *
     * @ORM\Column(name="cleRIB", type="integer", nullable=false)
     */
    private $clerib;

    /**
     * @var string
     *
     * @ORM\Column(name="solde", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $solde;

    /**
     * @var string
     *
     * @ORM\Column(name="dateCreation", type="string", length=255, nullable=false)
     */
    private $datecreation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="activeDate", type="string", length=255, nullable=true)
     */
    private $activedate;

    /**
     * @var string
     *
     * @ORM\Column(name="nextRemunDate", type="string", length=255, nullable=false)
     */
    private $nextremundate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="closeDate", type="string", length=255, nullable=true)
     */
    private $closedate;

    /**
     * @var \Agency
     *
     * @ORM\ManyToOne(targetEntity="Agency", inversedBy="accounts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hostAgency", referencedColumnName="id")
     * })
     */
    private $hostagency;

    /**
     * @var \Clientphysique
     *
     * @ORM\ManyToOne(targetEntity="Clientphysique")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     * })
     */
    private $owner;

    /**
     * @var \Openingfees
     *
     * @ORM\ManyToOne(targetEntity="Openingfees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOpeningFees", referencedColumnName="id")
     * })
     */
    private $idopeningfees;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $iduser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="State", inversedBy="compteepsx")
     * @ORM\JoinTable(name="compteepsx_etats",
     *   joinColumns={
     *     @ORM\JoinColumn(name="compteepsx_id", referencedColumnName="id")
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

    public function getAccountnumber(): ?string
    {
        return $this->accountnumber;
    }

    public function setAccountnumber(string $accountnumber): self
    {
        $this->accountnumber = $accountnumber;

        return $this;
    }

    public function getClerib(): ?int
    {
        return $this->clerib;
    }

    public function setClerib(int $clerib): self
    {
        $this->clerib = $clerib;

        return $this;
    }

    public function getSolde(): ?string
    {
        return $this->solde;
    }

    public function setSolde(string $solde): self
    {
        $this->solde = $solde;

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

    public function getActivedate(): ?string
    {
        return $this->activedate;
    }

    public function setActivedate(?string $activedate): self
    {
        $this->activedate = $activedate;

        return $this;
    }

    public function getNextremundate(): ?string
    {
        return $this->nextremundate;
    }

    public function setNextremundate(string $nextremundate): self
    {
        $this->nextremundate = $nextremundate;

        return $this;
    }

    public function getClosedate(): ?string
    {
        return $this->closedate;
    }

    public function setClosedate(?string $closedate): self
    {
        $this->closedate = $closedate;

        return $this;
    }

    public function getHostagency(): ?Agency
    {
        return $this->hostagency;
    }

    public function setHostagency(?Agency $hostagency): self
    {
        $this->hostagency = $hostagency;

        return $this;
    }

    public function getOwner(): ?Clientphysique
    {
        return $this->owner;
    }

    public function setOwner(?Clientphysique $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getIdopeningfees(): ?Openingfees
    {
        return $this->idopeningfees;
    }

    public function setIdopeningfees(?Openingfees $idopeningfees): self
    {
        $this->idopeningfees = $idopeningfees;

        return $this;
    }

    public function getIduser(): ?User
    {
        return $this->iduser;
    }

    public function setIduser(?User $iduser): self
    {
        $this->iduser = $iduser;

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
