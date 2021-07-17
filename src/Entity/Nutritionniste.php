<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;


/**
*@ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\NutritionnisteRepository")
 */
class Nutritionniste
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $disponibilite;

    /**
     * @ORM\ManyToMany(targetEntity=SalleDeSport::class, inversedBy="nutritionnistes")
     */
    private $sallesDeSport;

    public function __construct()
    {
        $this->sallesDeSport = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getDisponibilite(): ?string
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(?string $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

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
}
