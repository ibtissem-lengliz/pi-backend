<?php

namespace App\Entity;

use App\Repository\ActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;


/**
*@ApiResource()
 * @ORM\Entity(repositoryClass=ActiviteRepository::class)
 */
class Activite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=SalleDeSport::class, inversedBy="activites")
     */
    private $sallesDeSport;

    /**
     * @ORM\ManyToMany(targetEntity=Coach::class, mappedBy="activites")
     */
    private $coachs;

    public function __construct()
    {
        $this->sallesDeSport = new ArrayCollection();
        $this->coachs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection|Coach[]
     */
    public function getCoachs(): Collection
    {
        return $this->coachs;
    }

    public function addCoach(Coach $coach): self
    {
        if (!$this->coachs->contains($coach)) {
            $this->coachs[] = $coach;
            $ye->addActivite($this);
        }

        return $this;
    }

    public function removeCoach(Coach $coach): self
    {
        if ($this->coachs->removeElement($coach)) {
            $coach->removeActivite($this);
        }

        return $this;
    }
}
