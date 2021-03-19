<?php

namespace App\Entity;

use App\Repository\AcheteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AcheteurRepository::class)
 */
class Acheteur
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
    private $solde;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $isSolvable;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $identite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $moyenPaiement;

    /**
     * @ORM\ManyToMany(targetEntity=Personne::class, inversedBy="acheteur")
     */
    private $idPersonne;

    /**
     * @ORM\OneToMany(targetEntity=Ordreachat::class, mappedBy="idAcheteur")
     */
    private $ordreachats;

    /**
     * @ORM\OneToMany(targetEntity=Produit::class, mappedBy="idAcheteur")
     */
    private $produits;

    public function __construct()
        {
            $this->idPersonne = new ArrayCollection();
            $this->ordreachats = new ArrayCollection();
            $this->produits = new ArrayCollection();
        }

    public function getId(): ?int
    {
        return $this->id;
    }

        /**
         * @return Collection|personne[]
         */
        public function getIdPersonne(): Collection
        {
            return $this->idPersonne;
        }

        public function addidPersonne(personne $idPersonne): self
        {
            if (!$this->idPersonne->contains($idPersonne)) {
                $this->idPersonne[] = $idPersonne;
            }

            return $this;
        }

        public function removeIdPersonne(personne $idPersonne): self
        {
            $this->idPersonne->removeElement($idPersonne);

            return $this;
        }



    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getIsSolvable(): ?string
    {
        return $this->isSolvable;
    }

    public function setIsSolvable(string $isSolvable): self
    {
        $this->isSolvable = $isSolvable;

        return $this;
    }

    public function getIdentite(): ?string
    {
        return $this->identite;
    }

    public function setIdentite(string $identite): self
    {
        $this->identite = $identite;

        return $this;
    }

    public function getMoyenPaiement(): ?string
    {
        return $this->moyenPaiement;
    }

    public function setMoyenPaiement(string $moyenPaiement): self
    {
        $this->moyenPaiement = $moyenPaiement;

        return $this;
    }

    /**
     * @return Collection|Ordreachat[]
     */
    public function getOrdreachats(): Collection
    {
        return $this->ordreachats;
    }

    public function addOrdreachat(Ordreachat $ordreachat): self
    {
        if (!$this->ordreachats->contains($ordreachat)) {
            $this->ordreachats[] = $ordreachat;
            $ordreachat->setIdAcheteur($this);
        }

        return $this;
    }

    public function removeOrdreachat(Ordreachat $ordreachat): self
    {
        if ($this->ordreachats->removeElement($ordreachat)) {
            // set the owning side to null (unless already changed)
            if ($ordreachat->getIdAcheteur() === $this) {
                $ordreachat->setIdAcheteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setIdAcheteur($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getIdAcheteur() === $this) {
                $produit->setIdAcheteur(null);
            }
        }

        return $this;
    }
}
