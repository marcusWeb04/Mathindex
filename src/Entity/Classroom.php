<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ClassroomRepository::class)]
class Classroom{

    // attribut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\OneToMany(mappedBy:'classroom', targetEntity: Classroom::Class)]
    private Collection $exercices;

    // constructeur
    public function __construct()
    {
        $this->exercices = new ArrayCollection();
    }

    // Getter
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    // Setter
    public function setName(string $name): void
    {
        $this->name=$name;
    }
}