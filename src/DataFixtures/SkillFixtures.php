<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SkillFixtures extends Fixture{
    public const SEARCH_SKILL = "SEARCH_SKILL";
    public const CALCULATE_SKILL = "CALCULATE_SKILL";
    public const REASON_SKILL = "REASON_SKILL";
    public const COMMUNICATE_SKILL = "COMMUNICATE_SKILL";
    public const REPRESENT_SKILL = "REPRESENT_SKILL";

    const SKILL_LIST = [
        self::SEARCH_SKILL => [
            "name" => "chercher",
        ],
        self::CALCULATE_SKILL => [
            "name" => "calculer",
        ],
        self::REASON_SKILL => [
            "name" => "résonner",
        ],
        self::COMMUNICATE_SKILL => [
            "name" => "communiquer",
        ],
        self::REPRESENT_SKILL => [
            "name" => "représenter",
        ]
    ];

    public function load(objectManager $manager): void
    {
        foreach(self::SKILL_LIST as $reference=>$data)
        {
            $skill = new Skill();
            $skill->setName($data['name']);
            $skill->setCourse($this->getReference(CoursesFixtures::MATH_COURSE));

            $manager->persist($skill);
            
            $this->addReference($reference, $skill);
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