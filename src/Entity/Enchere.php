<?php

namespace App\Entity;

use App\Repository\EnchereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnchereRepository::class)
 */
class Enchere
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
     * @ORM\Column(type="string", length=255)
     */
    private $heure;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateVente;

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

    public function getHeure(): ?string
    {
        return $this->heure;
    }

    public function setHeure(string $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getDateVente(): ?string
    {
        return $this->dateVente;
    }

    public function setDateVente(string $dateVente): self
    {
        $this->dateVente = $dateVente;

        return $this;
    }

        /**
         * @ORM\ManyToMany(targetEntity=Lieu::class, inversedBy="enchere")
         */
        private $idLieu;

        public function __construct()
            {
                $this->idLieu = new ArrayCollection();
                $this->idAdmin = new ArrayCollection();
                $this->ordreachats = new ArrayCollection();
                $this->idLot = new ArrayCollection();
                $this->lots = new ArrayCollection();


            }


            /**
             * @return Collection|lieu[]
             */
            public function getidLieu(): Collection
            {
                return $this->idLieu;
            }

            public function addidLieu(lieu $idLieu): self
            {
                if (!$this->idLieu->contains($idLieu)) {
                    $this->idLieu[] = $idLieu;
                }

                return $this;
            }

            public function removeIdLieu(lieu $idLieu): self
            {
                $this->idLieu->removeElement($idLieu);

                return $this;
            }


    /**
     * @ORM\ManyToMany(targetEntity=Admin::class, inversedBy="enchere")
     */
    private $idAdmin;

    /**
     * @ORM\OneToMany(targetEntity=Ordreachat::class, mappedBy="idEnchere")
     */
    private $ordreachats;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\ManyToMany(targetEntity=Lot::class, inversedBy="encheres")
     */
    private $idLot;

    /**
     * @ORM\ManyToOne(targetEntity=Lot::class, inversedBy="idEnchere2")
     */
    private $lot;

    /**
     * @ORM\OneToMany(targetEntity=Lot::class, mappedBy="idEncherex")
     */
    private $lots;


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

        public function removeIdAdmin(admin $idAdmin): self
        {
            $this->idAdmin->removeElement($idAdmin);

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
                $ordreachat->setIdEnchere($this);
            }

            return $this;
        }

        public function removeOrdreachat(Ordreachat $ordreachat): self
        {
            if ($this->ordreachats->removeElement($ordreachat)) {
                // set the owning side to null (unless already changed)
                if ($ordreachat->getIdEnchere() === $this) {
                    $ordreachat->setIdEnchere(null);
                }
            }

            return $this;
        }

    public function __toString()
    {
        return (string)($this->getNom());
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * @return Collection|Lot[]
     */
    public function getIdLot(): Collection
    {
        return $this->idLot;
    }

    public function addIdLot(Lot $idLot): self
    {
        if (!$this->idLot->contains($idLot)) {
            $this->idLot[] = $idLot;
        }

        return $this;
    }

    public function removeIdLot(Lot $idLot): self
    {
        $this->idLot->removeElement($idLot);

        return $this;
    }

    public function getLot(): ?Lot
    {
        return $this->lot;
    }

    public function setLot(?Lot $lot): self
    {
        $this->lot = $lot;

        return $this;
    }

    /**
     * @return Collection|Lot[]
     */
    public function getLots(): Collection
    {
        return $this->lots;
    }

    public function addLot(Lot $lot): self
    {
        if (!$this->lots->contains($lot)) {
            $this->lots[] = $lot;
            $lot->setIdEncherex($this);
        }

        return $this;
    }

    public function removeLot(Lot $lot): self
    {
        if ($this->lots->removeElement($lot)) {
            // set the owning side to null (unless already changed)
            if ($lot->getIdEncherex() === $this) {
                $lot->setIdEncherex(null);
            }
        }

        return $this;
    }
}
