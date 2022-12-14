<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BrandRepository::class)]
class Brand
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'marque', targetEntity: Computer::class)]
    private Collection $computers;

    public function __construct()
    {
        $this->computers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->nom;
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
     * @return Collection<int, Computer>
     */
    public function getComputers(): Collection
    {
        return $this->computers;
    }

    public function addComputer(Computer $computer): self
    {
        if (!$this->computers->contains($computer)) {
            $this->computers->add($computer);
            $computer->setMarque($this);
        }

        return $this;
    }

    public function removeComputer(Computer $computer): self
    {
        if ($this->computers->removeElement($computer)) {
            // set the owning side to null (unless already changed)
            if ($computer->getMarque() === $this) {
                $computer->setMarque(null);
            }
        }

        return $this;
    }
}
