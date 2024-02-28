<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: FileRepository::class)]
class File{
    
    // attribut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\Column(type: 'string')]
    private string $originName;

    #[ORM\Column(type: 'string')]
    private string $extention;

    #[ORM\Column(type: 'integer')]
    private int $size;

    #[ORM\OneToMany(mappedBy:'classroom', targetEntity: Classroom::Class)]
    private Collection $exercices;

    // constructeur
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

    public function getOriginName(): string
    {
        return $this->originName;
    }

    public function getExtention(): string
    {
        return $this->extention;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    // setter
    public function setName(string $name): void
    {
        $this->name=$name;
    }

    public function setOriginName(string $originName): void
    {
        $this->originName = $originName;
    }

    public function setExtention(string $extention): void
    {
        $this->extention=$extention;
    }

    public function setSize(int $size): void
    {
        $this->size=$size;
    }
}