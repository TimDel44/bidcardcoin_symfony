<?php

namespace App\Entity;

use App\Repository\EstimationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EstimationRepository::class)
 */
class Estimation
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
    private $estimation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateEstimation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstimation(): ?float
    {
        return $this->estimation;
    }

    public function setEstimation(float $estimation): self
    {
        $this->estimation = $estimation;

        return $this;
    }

    public function getDateEstimation(): ?string
    {
        return $this->dateEstimation;
    }

    public function setDateEstimation(string $dateEstimation): self
    {
        $this->dateEstimation = $dateEstimation;

        return $this;
    }

 /**
     * @ORM\ManyToMany(targetEntity=admin::class, inversedBy="estimation")
     */
    private $idAdmin;

    public function __construct()
        {
            $this->idAdmin = new ArrayCollection();
            $this->idProduit = new ArrayCollection();

        }


        /**
         * @return Collection|admin[]
         */
        public function getidAdmin(): Collection
        {
            return $this->idAdmin;
        }

        public function addidAdmin(admin $idAdmin): self
        {
            if (!$this->idAdmin->contains($idAdmin)) {
                $this->idAdmin[] = $idAdmin;
            }

            return $this;
        }

        public function removeIdLieu(admin $idAdmin): self
        {
            $this->idAdmin->removeElement($idAdmin);

            return $this;
        }

    /**
     * @ORM\ManyToMany(targetEntity=Produit::class, inversedBy="estimation")
     */
    private $idProduit;

        /**
         * @return Collection|produit[]
         */
        public function getidProduit(): Collection
        {
            return $this->idProduit;
        }

        public function addidProduit(produit $idProduit): self
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
}
