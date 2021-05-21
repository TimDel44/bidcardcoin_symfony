<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
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
    private $estimationActuelle;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixVente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $artiste;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $style;


    /**
     * @ORM\OneToMany(targetEntity=Ordreachat::class, mappedBy="idProduit")
     */
    private $ordreachats;

    /**
     * @ORM\ManyToOne(targetEntity=Lot::class, inversedBy="produits")
     */
    private $idLot;

    /**
     * @ORM\OneToMany(targetEntity=Photo::class, mappedBy="produit")
     */
    private $idPhoto;

    /**
     * @ORM\ManyToOne(targetEntity=Acheteur::class, inversedBy="produits")
     */
    private $idAcheteur;

    /**
     * @ORM\ManyToOne(targetEntity=Vendeur::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idVendeur;

    /**
     * @ORM\ManyToMany(targetEntity=Categorie::class, mappedBy="produits")
     */
    private $categories;

    public function __construct()
    {
        $this->ordreachats = new ArrayCollection();
        $this->idPhoto = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstimationActuelle(): ?float
    {
        return $this->estimationActuelle;
    }

    public function setEstimationActuelle(float $estimationActuelle): self
    {
        $this->estimationActuelle = $estimationActuelle;

        return $this;
    }

    public function getPrixVente(): ?float
    {
        return $this->prixVente;
    }

    public function setPrixVente(?float $prixVente): self
    {
        $this->prixVente = $prixVente;

        return $this;
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

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getArtiste(): ?string
    {
        return $this->artiste;
    }

    public function setArtiste(?string $artiste): self
    {
        $this->artiste = $artiste;

        return $this;
    }

    public function getStyle(): ?string
    {
        return $this->style;
    }

    public function setStyle(?string $style): self
    {
        $this->style = $style;

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
            $ordreachat->setIdProduit($this);
        }

        return $this;
    }

    public function removeOrdreachat(Ordreachat $ordreachat): self
    {
        if ($this->ordreachats->removeElement($ordreachat)) {
            // set the owning side to null (unless already changed)
            if ($ordreachat->getIdProduit() === $this) {
                $ordreachat->setIdProduit(null);
            }
        }

        return $this;
    }

    public function getIdLot(): ?lot
    {
        return $this->idLot;
    }

    public function setIdLot(?lot $idLot): self
    {
        $this->idLot = $idLot;

        return $this;
    }

    /**
     * @return Collection|photo[]
     */
    public function getIdPhoto(): Collection
    {
        return $this->idPhoto;
    }

    public function addIdPhoto(photo $idPhoto): self
    {
        if (!$this->idPhoto->contains($idPhoto)) {
            $this->idPhoto[] = $idPhoto;
            $idPhoto->setProduit($this);
        }

        return $this;
    }

    public function removeIdPhoto(photo $idPhoto): self
    {
        if ($this->idPhoto->removeElement($idPhoto)) {
            // set the owning side to null (unless already changed)
            if ($idPhoto->getProduit() === $this) {
                $idPhoto->setProduit(null);
            }
        }

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

    public function getIdVendeur(): ?vendeur
    {
        return $this->idVendeur;
    }

    public function setIdVendeur(?vendeur $idVendeur): self
    {
        $this->idVendeur = $idVendeur;

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addProduit($this);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): self
    {
        if ($this->categories->removeElement($category)) {
            $category->removeProduit($this);
        }

        return $this;
    }

    public function __toString()
    {
        return (string)($this->getNom());
    }


}
