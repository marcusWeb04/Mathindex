<?php 

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: OriginRepository::class)]
class Origin{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\OneToMany(mappedBy:'origin', targetEntity: Exercice::class)]
    private Collection $exercices;

    // construct
    public function __construct()
    {
        $this->exercices = new arrayCollection();
    }

    // getter
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    // setter
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}