<?php

namespace App\Entity;

use App\Repository\ComputerListByUserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComputerListByUserRepository::class)]
class ComputerListByUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'favComputer')]
    private ?Computer $computerFav = null;

    #[ORM\ManyToOne(inversedBy: 'userFav')]
    private ?User $userFav = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComputerFav(): ?Computer
    {
        return $this->computerFav;
    }

    public function setComputerFav(?Computer $computerFav): self
    {
        $this->computerFav = $computerFav;

        return $this;
    }

    public function getUserFav(): ?User
    {
        return $this->userFav;
    }

    public function setUserFav(?User $userFav): self
    {
        $this->userFav = $userFav;

        return $this;
    }
}
