<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
class Course{
    
    // attibut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\OneToMany(mappedBy:'course', targetEntity: Exercice::Class)]
    private Collection $exercices;

    #[ORM\OneToMany(mappedBy:'course', targetEntity: Thematic::Class)]
    private Collection $thematics;

    #[ORM\OneToMany(mappedBy:'course', targetEntity: Skill::Class)]
    private Collection $skills;

    // constructeur
    public function __construct()
    {
        $this->skills = new ArrayCollection();
        $this->exercices = new ArrayCollection();
        $this->thematics = new ArrayCollection();
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