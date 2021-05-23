<?php

namespace App\Entity;

use App\Repository\LotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LotRepository::class)
 */
class Lot
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @ORM\ManyToMany(targetEntity=Enchere::class, inversedBy="Lot")
     */
    private $idEnchere;

    /**
     * @ORM\OneToMany(targetEntity=Produit::class, mappedBy="idLot")
     */
    private $produits;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prixEnchere;

    /**
     * @ORM\ManyToMany(targetEntity=Enchere::class, mappedBy="idLot")
     */
    private $encheres;

    /**
     * @ORM\ManyToOne(targetEntity=Enchere::class, inversedBy="lots")
     */
    private $idEncherex;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $acheteur;



    public function __construct()
        {
            $this->idEnchere = new ArrayCollection();
            $this->produits = new ArrayCollection();
            $this->encheres = new ArrayCollection();
            $this->idEnchere2 = new ArrayCollection();
        }


        /**
         * @return Collection|enchere[]
         */
        public function getidEnchere(): Collection
        {
            return $this->idEnchere;
        }

        public function addidEnchere(enchere $idEnchere): self
        {
            if (!$this->idEnchere->contains($idEnchere)) {
                $this->idEnchere[] = $idEnchere;
            }

            return $this;
        }

        public function removeIdEnchere(enchere $idEnchere): self
        {
            $this->idEnchere->removeElement($idEnchere);

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
                $produit->setIdLot($this);
            }

            return $this;
        }

        public function removeProduit(Produit $produit): self
        {
            if ($this->produits->removeElement($produit)) {
                // set the owning side to null (unless already changed)
                if ($produit->getIdLot() === $this) {
                    $produit->setIdLot(null);
                }
            }

            return $this;
        }

    public function __toString()
    {
        return (string)($this->getNom());
    }

    public function getPrixEnchere(): ?int
    {
        return $this->prixEnchere;
    }

    public function setPrixEnchere(?int $prixEnchere): self
    {
        $this->prixEnchere = $prixEnchere;

        return $this;
    }

    /**
     * @return Collection|Enchere[]
     */
    public function getEncheres(): Collection
    {
        return $this->encheres;
    }

    public function addEnchere(Enchere $enchere): self
    {
        if (!$this->encheres->contains($enchere)) {
            $this->encheres[] = $enchere;
            $enchere->addIdLot($this);
        }

        return $this;
    }

    public function removeEnchere(Enchere $enchere): self
    {
        if ($this->encheres->removeElement($enchere)) {
            $enchere->removeIdLot($this);
        }

        return $this;
    }

    public function getIdEncherex(): ?Enchere
    {
        return $this->idEncherex;
    }

    public function setIdEncherex(?Enchere $idEncherex): self
    {
        $this->idEncherex = $idEncherex;

        return $this;
    }

    public function getAcheteur(): ?string
    {
        return $this->acheteur;
    }

    public function setAcheteur(?string $acheteur): self
    {
        $this->acheteur = $acheteur;

        return $this;
    }
}
