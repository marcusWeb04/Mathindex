<?php

namespace App\DataFixtures;

use App\Entity\Exercice;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ExerciceFixtures extends Fixture implements DependentFixtureInterface
{
    public const MATRICE_EXERCICE = "MATRICE_EXERCICE";
    public const GRAPHE_EXERCICE = "GRAPHE_EXERCICE";
    public const EQUATION_EXERCICE = "EQUATION_EXERCICE";
    public const VARIABLE_EXERCICE = "VARIABLE_EXERCICE";
    public const DECRYPTED_EXERCICE = "DECRYPTED_EXERCICE";

    const EXERCICE_FILE = [
        self::MATRICE_EXERCICE => [
            'name' => 'matrice',
            'chapter' => 'chapitre 1',
            'keyword' => 'définition',
            'duration' => 5.30,
            'difficulty' => "facile",
            'originalName' => 'Salut',
            'originalFirstName' => 'Mathias',
            'originalLastName' => 'Favernay',
            'proposeByType' => 'Livre',
            'originInformation' => 'Bienvenue dans le monde de la 3d',
        ],
        self::GRAPHE_EXERCICE => [
            'name' => 'graphe',
            'chapter' => 'chapitre 5',
            'keyword' => 'fractal',
            'duration' => 7,
            'difficulty' => "extreme",
            'originalName' => 'Trash',
            'originalFirstName' => 'Anthony',
            'originalLastName' => 'Ciliani',
            'proposeByType' => 'Site internet',
            'originInformation' => 'La boucle sans fin',
        ],
        self::EQUATION_EXERCICE => [
            'name' => 'equation',
            'chapter' => 'chapitre 2',
            'keyword' => 'equation',
            'duration' => 2.30,
            'difficulty' => "normal",
            'originalName' => 'les mathématique avec pythagore',
            'originalFirstName' => 'Paul',
            'originalLastName' => 'Gervaise',
            'proposeByType' => 'control',
            'originInformation' => 'résoudre les équation',
        ],
        self::VARIABLE_EXERCICE => [
            'name' => 'variable',
            'chapter' => 'chapitre 4',
            'keyword' => 'variable',
            'duration' => 5.30,
            'difficulty' => "normal",
            'originalName' => 'remplacer un monbre par une lettre',
            'originalFirstName' => 'Khelian',
            'originalLastName' => 'Dumon',
            'proposeByType' => 'Livre',
            'originInformation' => 'utiliser les variables',
        ],
        self::DECRYPTED_EXERCICE => [
            'name' => 'décripté',
            'chapter' => 'chapitre 9',
            'keyword' => 'décripté',
            'duration' => 5.30,
            'difficulty' => "trés difficile",
            'originalName' => 'les mathématique',
            'originalFirstName' => 'Evan',
            'originalLastName' => 'Merchez',
            'proposeByType' => 'Livre',
            'originInformation' => 'décrypté les équations',
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::EXERCICE_FILE as $reference => $data) {
            $exercice = new Exercice();
            $exercice->setName($data['name']);
            $exercice->setChapter($data['chapter']);
            $exercice->setKeyword($data['keyword']);
            $exercice->setDuration($data['duration']);
            $exercice->setDifficulty($data['difficulty']);
            $exercice->setOriginName($data['originalName']);
            $exercice->setProposeByType($data['proposeByType']);
            $exercice->setProposeByLastName($data['originalLastName']);
            $exercice->setOriginInformation($data['originInformation']);
            $exercice->setProposeByFirstName($data['originalFirstName']);
            $exercice->setCourse($this->getReference(CoursesFixtures::MATH_COURSE));
            $exercice->setOrigin($this->getReference(OriginFixtures::APEX_ORIGIN));
            $exercice->setUser($this->getReference(UserFixtures::ELEVE_USER));
            $exercice->setClassroom($this->getReference(ClassroomFixtures::TERMINAL_CLASSROOM));
            $exercice->setExerciceFile($this->getReference(FileFixtures::PREMIER_FILE));
            $exercice->setCorrectionFile($this->getReference(FileFixtures::THIRD_FILE));

            $manager->persist($exercice);
            $this->addReference($reference, $exercice);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CoursesFixtures::class,
            OriginFixtures::class,
            UserFixtures::class,
            ClassroomFixtures::class,
            FileFixtures::class,
        ];
    }
}
