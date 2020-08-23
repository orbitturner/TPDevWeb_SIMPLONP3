<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employee
 *
 * @ORM\Table(name="employee", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_A4E917F7450FF010", columns={"telephone"}), @ORM\UniqueConstraint(name="UNIQ_A4E917F77AC033BE", columns={"cni"}), @ORM\UniqueConstraint(name="UNIQ_A4E917F715A2EC63", columns={"numEmployee"}), @ORM\UniqueConstraint(name="UNIQ_A4E917F7E7927C74", columns={"email"})}, indexes={@ORM\Index(name="IDX_A4E917F7BAD79E3A", columns={"agencyhost"}), @ORM\Index(name="IDX_A4E917F7FE6E88D7", columns={"idUser"})})
 * @ORM\Entity
 */
class Employee
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
     * @ORM\Column(name="numEmployee", type="string", length=255, nullable=false)
     */
    private $numemployee;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=false)
     */
    private $telephone;

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
     * @ORM\Column(name="service", type="string", length=255, nullable=false)
     */
    private $service;

    /**
     * @var string
     *
     * @ORM\Column(name="dateNaiss", type="string", length=255, nullable=false)
     */
    private $datenaiss;

    /**
     * @var \Agency
     *
     * @ORM\ManyToOne(targetEntity="Agency", inversedBy="employees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="agencyhost", referencedColumnName="id")
     * })
     */
    private $agencyhost;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $iduser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumemployee(): ?string
    {
        return $this->numemployee;
    }

    public function setNumemployee(string $numemployee): self
    {
        $this->numemployee = $numemployee;

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

    public function getService(): ?string
    {
        return $this->service;
    }

    public function setService(string $service): self
    {
        $this->service = $service;

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

    public function getAgencyhost(): ?Agency
    {
        return $this->agencyhost;
    }

    public function setAgencyhost(?Agency $agencyhost): self
    {
        $this->agencyhost = $agencyhost;

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


}
