<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
     * @ORM\ManyToMany(targetEntity=Produitcategorie::class, mappedBy="idCategorie")
     */
    private $produitcategories;

    public function __construct()
    {
        $this->produitcategories = new ArrayCollection();
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

    /**
     * @return Collection|Produitcategorie[]
     */
    public function getProduitcategories(): Collection
    {
        return $this->produitcategories;
    }

    public function addProduitcategory(Produitcategorie $produitcategory): self
    {
        if (!$this->produitcategories->contains($produitcategory)) {
            $this->produitcategories[] = $produitcategory;
            $produitcategory->addIdCategorie($this);
        }

        return $this;
    }

    public function removeProduitcategory(Produitcategorie $produitcategory): self
    {
        if ($this->produitcategories->removeElement($produitcategory)) {
            $produitcategory->removeIdCategorie($this);
        }

        return $this;
    }
}
