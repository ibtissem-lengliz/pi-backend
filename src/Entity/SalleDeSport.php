<?php

namespace App\Entity;

use App\Repository\SalleDeSportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;


/**
 *@ApiResource()
 * @ORM\Entity(repositoryClass=SalleDeSportRepository::class)
 */
class SalleDeSport
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idSalleDeSport;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addresse;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Evenement::class, mappedBy="salleDeSport")
     */
    private $evenements;

    /**
     * @ORM\ManyToMany(targetEntity=Nutritionniste::class, mappedBy="sallesDeSport")
     */
    private $nutritionnistes;

    /**
     * @ORM\ManyToMany(targetEntity=Abonnement::class, mappedBy="sallesDeSport")
     */
    private $abonnements;

    /**
     * @ORM\ManyToMany(targetEntity=Activite::class, mappedBy="sallesDeSport")
     */
    private $activites;

    public function __construct()
    {
        $this->evenements = new ArrayCollection();
        $this->nutritionnistes = new ArrayCollection();
        $this->abonnements = new ArrayCollection();
        $this->activites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSalleDeSport(): ?int
    {
        return $this->idSalleDeSport;
    }

    public function setIdSalleDeSport(int $idSalleDeSport): self
    {
        $this->idSalleDeSport = $idSalleDeSport;

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

    public function getAddresse(): ?string
    {
        return $this->addresse;
    }

    public function setAddresse(?string $addresse): self
    {
        $this->addresse = $addresse;

        return $this;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Evenement[]
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenement $evenement): self
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements[] = $evenement;
            $evenement->setSalleDeSport($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->evenements->removeElement($evenement)) {
            // set the owning side to null (unless already changed)
            if ($evenement->getSalleDeSport() === $this) {
                $evenement->setSalleDeSport(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Nutritionniste[]
     */
    public function getNutritionnistes(): Collection
    {
        return $this->nutritionnistes;
    }

    public function addNutritionniste(Nutritionniste $nutritionniste): self
    {
        if (!$this->nutritionnistes->contains($nutritionniste)) {
            $this->nutritionnistes[] = $nutritionniste;
            $nutritionniste->addSallesDeSport($this);
        }

        return $this;
    }

    public function removeNutritionniste(Nutritionniste $nutritionniste): self
    {
        if ($this->nutritionnistes->removeElement($nutritionniste)) {
            $nutritionniste->removeSallesDeSport($this);
        }

        return $this;
    }

    /**
     * @return Collection|Abonnement[]
     */
    public function getAbonnements(): Collection
    {
        return $this->abonnements;
    }

    public function addAbonnement(Abonnement $abonnement): self
    {
        if (!$this->abonnements->contains($abonnement)) {
            $this->abonnements[] = $abonnement;
            $abonnement->addSallesDeSport($this);
        }

        return $this;
    }

    public function removeAbonnement(Abonnement $abonnement): self
    {
        if ($this->abonnements->removeElement($abonnement)) {
            $abonnement->removeSallesDeSport($this);
        }

        return $this;
    }

    /**
     * @return Collection|activite[]
     */
    public function getActivites(): Collection
    {
        return $this->activites;
    }

    public function addActivite(Activite $activite): self
    {
        if (!$this->activites->contains($activite)) {
            $this->activites[] = $activite;
            $activite->addSallesDeSport($this);
        }

        return $this;
    }

    public function removeActivite(Activite $activite): self
    {
        if ($this->activites->removeElement($activite)) {
            $activite->removeSallesDeSport($this);
        }

        return $this;
    }
}
