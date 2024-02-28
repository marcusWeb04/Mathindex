<?php

namespace App\DataFixtures;

use App\Entity\Thematic;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ThematicFixtures extends Fixture implements DependentFixtureInterface{
    public const ARITHMETIC_THEMATIC = "ARITHMETIC_THEMATIC";
    public const PERCENTAGE_THEMATIC = "PERCENTAGE_THEMATIC";
    public const STATISTICAL_THEMATIC = "STATISTICAL_THEMATIC";
    public const LOGIC_THEMATIC = "LOGIC_THEMATIC";
    public const MODEL_THEMATIC = "MODEL_THEMATIC";

    const THEMATIC_FILE =[
        self::ARITHMETIC_THEMATIC => [
            'name' => 'mathématique',
        ],
        self::PERCENTAGE_THEMATIC => [
            'name' => 'français'
        ],
        self::STATISTICAL_THEMATIC => [
            'name' => 'histoire'
        ],
        self::LOGIC_THEMATIC => [
            'name' => 'php'
        ],
        self::MODEL_THEMATIC => [
            'name' => 'intégration'
        ]
    ];

    public function load(objectManager $manager): void
    {
        foreach(self::THEMATIC_FILE as $reference => $data)
        {
            $thematic = new Thematic();
            $thematic->setName($data['name']);
            $thematic->setCourse($this->getReference(CoursesFixtures::MATH_COURSE));

            $manager->persist($thematic);
            $this->addReference($reference, $thematic);
        }
        $manager->flush();
    }
    
    public function getDependencies(): array
    {
        return [
            CoursesFixtures::class
        ];
    }
}