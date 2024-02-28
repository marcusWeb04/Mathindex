<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ThematicRepository::class)]
class Thematic{

    // attribut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\ManyToOne(targetEntity: Course::Class, inversedBy:"thematics")]
    private Course $course;

    #[ORM\OneToMany(mappedBy:'classroom', targetEntity: Classroom::Class)]
    private Collection $exercices;

    // contructeur
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