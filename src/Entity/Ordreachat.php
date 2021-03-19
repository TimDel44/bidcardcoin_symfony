<?php

namespace App\Entity;

use App\Repository\OrdreachatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdreachatRepository::class)
 */
class Ordreachat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $montantMax;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseDepot;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="ordreachats")
     */
    private $idProduit;

    /**
     * @ORM\ManyToOne(targetEntity=Acheteur::class, inversedBy="ordreachats")
     */
    private $idAcheteur;

    /**
     * @ORM\ManyToOne(targetEntity=Enchere::class, inversedBy="ordreachats")
     */
    private $idEnchere;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontantMax(): ?float
    {
        return $this->montantMax;
    }

    public function setMontantMax(float $montantMax): self
    {
        $this->montantMax = $montantMax;

        return $this;
    }

    public function getAdresseDepot(): ?string
    {
        return $this->adresseDepot;
    }

    public function setAdresseDepot(string $adresseDepot): self
    {
        $this->adresseDepot = $adresseDepot;

        return $this;
    }

    public function getIdProduit(): ?produit
    {
        return $this->idProduit;
    }

    public function setIdProduit(?produit $idProduit): self
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    public function getIdAcheteur(): ?acheteur
    {
        return $this->idAcheteur;
    }

    public function setIdAcheteur(?acheteur $idAcheteur): self
    {
        $this->idAcheteur = $idAcheteur;

        return $this;
    }

    public function getIdEnchere(): ?enchere
    {
        return $this->idEnchere;
    }

    public function setIdEnchere(?enchere $idEnchere): self
    {
        $this->idEnchere = $idEnchere;

        return $this;
    }
}
