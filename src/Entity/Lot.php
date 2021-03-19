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
     * @ORM\ManyToMany(targetEntity=Enchere::class, inversedBy="lot")
     */
    private $idEnchere;

    /**
     * @ORM\OneToMany(targetEntity=Produit::class, mappedBy="idLot")
     */
    private $produits;

    public function __construct()
        {
            $this->idEnchere = new ArrayCollection();
            $this->produits = new ArrayCollection();
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
}
