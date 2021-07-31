<?php

namespace App\Entity;


use App\Repository\AbonnementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
*@ApiResource()
 * @ORM\Entity(repositoryClass=AbonnementRepository::class)
 */
class Abonnement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numAbonnement;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $duree;

    /**
     * @ORM\ManyToMany(targetEntity=SalleDeSport::class, inversedBy="abonnements")
     */
    private $sallesDeSport;

    /**
     * @ORM\OneToMany(targetEntity=Membre::class, mappedBy="abonnement")
     */
    private $membre;

    public function __construct()
    {
        $this->sallesDeSport = new ArrayCollection();
        $this->membre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNumAbonnement(): ?string
    {
        return $this->numAbonnement;
    }

    public function setNumAbonnement(?string $numAbonnement): self
    {
        $this->numAbonnement = $numAbonnement;

        return $this;
    }

    public function getDuree(): ?float
    {
        return $this->duree;
    }

    public function setDuree(?float $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * @return Collection|SalleDeSport[]
     */
    public function getSallesDeSport(): Collection
    {
        return $this->sallesDeSport;
    }

    public function addSallesDeSport(SalleDeSport $sallesDeSport): self
    {
        if (!$this->sallesDeSport->contains($sallesDeSport)) {
            $this->sallesDeSport[] = $sallesDeSport;
        }

        return $this;
    }

    public function removeSallesDeSport(SalleDeSport $sallesDeSport): self
    {
        $this->sallesDeSport->removeElement($sallesDeSport);

        return $this;
    }

    /**
     * @return Collection|Membre[]
     */
    public function getMembre(): Collection
    {
        return $this->membre;
    }

    public function addMembre(Membre $membre): self
    {
        if (!$this->membre->contains($membre)) {
            $this->Membre[] = $membre;
            $membre->setAbonnement($this);
        }

        return $this;
    }

    public function removeMembre(Membre $membre): self
    {
        if ($this->membre->removeElement($membre)) {
            // set the owning side to null (unless already changed)
            if ($membre->getAbonnement() === $this) {
                $membre->setAbonnement(null);
            }
        }

        return $this;
    }
}
