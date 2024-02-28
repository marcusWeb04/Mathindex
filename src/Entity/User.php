<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User{
    
    // attribut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $role;
    
    #[ORM\Column(type: 'string')]
    private string $email;

    #[ORM\Column(type: 'string')]
    private string $lastName;

    #[ORM\Column(type: 'string')]
    private string $password;

    #[ORM\Column(type: 'string')]
    private string $firstName;

    #[ORM\OneToMany(mappedBy:'classroom', targetEntity: Classroom::Class)]
    private Collection $exercices;
    
    // controller
    public function __construct()
    {
        $this->exercices = new arrayCollection;
    }

    // Getter
    public function getId(): int
    {
        return $this->id;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    // Setter
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName=$lastName;
    }

    public function setPassword(string $password): void
    {
        $this->password=$password;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName=$firstName;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}