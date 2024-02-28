<?php

namespace App\DataFixtures;

use App\Entity\Course;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CoursesFixtures extends Fixture
{
    public const MATH_COURSE = "MATH_COURSE";
    public const FRENCH_COURSE = "FRENCH_COURSE";
    public const HISTORY_COURSE = "HISTORY_COURSE";
    public const PHP_COURSE = "PHP_COURSE";
    public const INTEGRATION_COURSE = "INTEGRATION_COURSE";

    const COURSE_FILE = [
        self::MATH_COURSE => [
            'name' => 'mathématique',
        ],
        self::FRENCH_COURSE => [
            'name' => 'français'
        ],
        self::HISTORY_COURSE => [
            'name' => 'histoire'
        ],
        self::PHP_COURSE => [
            'name' => 'php'
        ],
        self::INTEGRATION_COURSE => [
            'name' => 'intégration'
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::COURSE_FILE as $reference => $data) {
            $course = new Course();
            $course->setName($data['name']);

            $manager->persist($course);
            $this->addReference($reference, $course);
        }

        $manager->flush();
    }
}
