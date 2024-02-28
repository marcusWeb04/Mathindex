<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: SkillRepository::class)]
class Skill{

    // attribut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;
    
    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\ManyToMany(targetEntity: Exercice::class, mappedBy: 'skills')]
    private Collection $exercices;

    #[ORM\ManyToOne(targetEntity: Course::class, inversedBy:'skills')]
    private Course $course;

    // getter
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCourse(): Course
    {
        return $this->course;
    }

    // setter
    public function setName(string $name): void
    {
        $this->name=$name;
    }

    public function setCourse(Course $course): void
    {
        $this->course=$course;
    }
}