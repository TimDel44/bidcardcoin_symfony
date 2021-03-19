<?php

namespace App\Entity;

use App\Repository\ProduitcategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitcategorieRepository::class)
 */
class Produitcategorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Produit::class, inversedBy="produitcategories")
     */
    private $idProduit;

    /**
     * @ORM\ManyToMany(targetEntity=Categorie::class, inversedBy="produitcategories")
     */
    private $idCategorie;

    public function __construct()
    {
        $this->idProduit = new ArrayCollection();
        $this->idCategorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|produit[]
     */
    public function getIdProduit(): Collection
    {
        return $this->idProduit;
    }

    public function addIdProduit(produit $idProduit): self
    {
        if (!$this->idProduit->contains($idProduit)) {
            $this->idProduit[] = $idProduit;
        }

        return $this;
    }

    public function removeIdProduit(produit $idProduit): self
    {
        $this->idProduit->removeElement($idProduit);

        return $this;
    }

    /**
     * @return Collection|categorie[]
     */
    public function getIdCategorie(): Collection
    {
        return $this->idCategorie;
    }

    public function addIdCategorie(categorie $idCategorie): self
    {
        if (!$this->idCategorie->contains($idCategorie)) {
            $this->idCategorie[] = $idCategorie;
        }

        return $this;
    }

    public function removeIdCategorie(categorie $idCategorie): self
    {
        $this->idCategorie->removeElement($idCategorie);

        return $this;
    }
}
