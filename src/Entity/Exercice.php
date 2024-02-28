<?php 

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ExerciceRepository::class)]
class Exercice{

    // attribut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\ManyToOne(targetEntity: Origin::class, inversedBy: 'exercices')]
    private Origin $origin;

    #[ORM\ManyToOne(targetEntity: Course::class, inversedBy: 'exercices')]
    private Course $course;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'exercices')]
    private User $createBy;

    #[ORM\Column(type: 'string')]
    private string $chapter;

    #[ORM\Column(type: 'string')]
    private string $keyword;

    #[ORM\Column(type: 'float')]
    private float $duration;

    #[ORM\ManyToOne(targetEntity: Thematic::class, inversedBy: 'exercices')]
    private Thematic $thematic;

    #[ORM\Column(type: 'string')]
    private string $difficulty;

    #[ORM\Column(type: 'string')]
    private string $originName;

    #[ORM\ManyToOne(targetEntity: Classroom::class, inversedBy: 'exercices')]
    private Classroom $classroom;

    #[ORM\Column(type: 'string')]
    private ?string $proposeByType;

    #[ORM\ManyToOne(targetEntity: File::class, inversedBy: 'exercices')]
    private File $exerciceFile;

    #[ORM\ManyToOne(targetEntity: File::class, inversedBy: 'exercices')]
    private File $correctionFile;

    #[ORM\Column(type: 'string')]
    private ?string $originInformation;

    #[ORM\Column(type: 'string')]
    private ?string $proposeByLastName;

    #[ORM\Column(type: 'string')]
    private ?string $proposeByFirstName;

    #[ORM\ManyToMany(targetEntity: Skill::class, inversedBy: 'exercices')]
    private Collection $skills;

    // Getter
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->naùe;
    }

    public function getOrigin(): Origin
    {
        return $this->origin;
    }

    public function getCourse(): Course
    {
        return $this->course;
    }

    public function getUser(): User
    {
        return $this->$createBy;
    }

    public function getChapter(): string
    {
        return $this->chapter;
    }

    public function getKeyword(): string
    {
        return $this->keyword;
    }

    public function getDuration(): float
    {
        return $this->duration;
    }

    public function getThematic(): Thematic
    {
        return $this->thematic;
    }

    public function getDifficulty(): string
    {
        return $this->difficulty;
    }

    public function getOriginName(): string
    {
        return $this->originName;
    }

    public function getClassroom(): Classroom
    {
        return $this->classroom;
    }

    public function getProposeByType(): string
    {
        return $this->proposeByType;
    }

    public function getExerciceFile(): File
    {
        return $this->exerciceFile;
    }

    public function getCorrectionFile(): File
    {
        return $this->correctionFile;
    }

    public function getOriginInformation(): string
    {
        return $this->originInformation;
    }

    public function getProposeByLastName(): string
    {
        return $this->proposeByLastName;
    }

    public function getProposeByFirstName(): string
    {
        return $this->proposeByFirstName;
    }

    // Setter
    public function setName(string $name): void
    {
        $this->name=$name;
    }

    public function setOrigin(Origin $origin): void
    {
        $this->origin = $origin;
    }

    public function setCourse(Course $course): void
    {
        $this->course = $course;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function setChapter(String $chapter): void
    {
        $this->chapter = $chapter;
    }

    public function setKeyword(string $keyword): void
    {
        $this->keyword = $keyword;
    }

    public function setDuration(float $duration): void
    {
        $this->duration = $duration;
    }

    public function setThematic(Thematic $thematic): void
    {
        $this->thematic = $thematic;
    }

    public function setDifficulty(string $difficulty): void
    {
        $this->difficulty = $difficulty;
    }

    public function setOriginName(string $originName): void
    {
        $this->originName = $originName;
    }

    public function setClassroom(Classroom $classroom): void
    {
        $this->classroom = $classroom;
    }

    public function setProposeByType(string $proposeByType): void
    {
        $this->proposeByType = $proposeByType;
    }

    public function setExerciceFile(File $exerciceFile): void
    {
        $this->exerciceFile = $exerciceFile;
    }

    public function setCorrectionFile(File $correctionFile): void
    {
        $this->correctionFile=$correctionFile;
    }

    public function setOriginInformation(string $originInformation): void
    {
        $this->originInformation = $originInformation;
    }

    public function setProposeByFirstName(string $proposeByFisrtName): void
    {
        $this->proposeByFirstName = $proposeByFisrtName;
    }

    public function setProposeByLastName(string $proposeByLastName): void
    {
        $this->proposeByLastName = $proposeByLastName; 
    }
}