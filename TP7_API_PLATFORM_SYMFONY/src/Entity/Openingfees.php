<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Openingfees
 *
 * @ORM\Table(name="openingfees", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_2DCCD230A4D60759", columns={"libelle"})})
 * @ORM\Entity
 */
class Openingfees
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
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="montant", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $montant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Generates the magic method To String Function
     *
     * @return string
     */
    public function __toString(){
        // to show the name of the Agency in the select
        return $this->libelle;
        // to show the id of the Agency in the select
        // return $this->id;
    }
}
