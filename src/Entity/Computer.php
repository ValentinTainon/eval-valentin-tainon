<?php

namespace App\Entity;

use App\Repository\ComputerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComputerRepository::class)]
class Computer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $modele = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?int $annee = null;

    #[ORM\Column(length: 255)]
    private ?string $numSerie = null;

    #[ORM\Column(length: 255)]
    private ?string $img = null;
    
    #[ORM\Column]
    private ?bool $isVisible = null;

    #[ORM\ManyToOne(inversedBy: 'OneToMany')]
    private ?Brand $marque = null;

    #[ORM\ManyToOne(inversedBy: 'computers')]
    private ?User $auteur = null;

    #[ORM\OneToMany(mappedBy: 'computerFav', targetEntity: ComputerListByUser::class)]
    private Collection $favComputer;

    public function __construct()
    {
        $this->favComputer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getNumSerie(): ?string
    {
        return $this->numSerie;
    }

    public function setNumSerie(string $numSerie): self
    {
        $this->numSerie = $numSerie;

        return $this;
    }

    public function getAuteur(): ?User
    {
        return $this->auteur;
    }

    public function setAuteur(?User $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getMarque(): ?Brand
    {
        return $this->marque;
    }

    public function setMarque(?Brand $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function isIsVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setIsVisible(bool $isVisible): self
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    /**
     * @return Collection<int, ComputerListByUser>
     */
    public function getFavComputer(): Collection
    {
        return $this->favComputer;
    }

    public function addFavComputer(ComputerListByUser $favComputer): self
    {
        if (!$this->favComputer->contains($favComputer)) {
            $this->favComputer->add($favComputer);
            $favComputer->setComputerFav($this);
        }

        return $this;
    }

    public function removeFavComputer(ComputerListByUser $favComputer): self
    {
        if ($this->favComputer->removeElement($favComputer)) {
            // set the owning side to null (unless already changed)
            if ($favComputer->getComputerFav() === $this) {
                $favComputer->setComputerFav(null);
            }
        }

        return $this;
    }

    public function getAuthorId(): ?User
    {
        return $this->author_id;
    }

    public function setAuthorId(?User $author_id): self
    {
        $this->author_id = $author_id;

        return $this;
    }
}
