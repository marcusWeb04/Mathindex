<?php

namespace App\DataFixtures;

use App\Entity\Classroom;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ClassroomFixtures extends Fixture{
    public const SECONDE_CLASSROOM = "SECONDE_CLASSROOM";
    public const PREMIERE_CLASSROOM = "PREMIERE_CLASSROOM";
    public const TERMINAL_CLASSROOM = "TERMINAL_CLASSROOM";
    public const BTS1_CLASSROOM = "BTS1_CLASSROOM";
    public const BTS2_CLASSROOM = "BTS2_CLASSROOM";
    public const LYCENCE_CLASSROOM = "LYCENCE_CLASSROOM";

    const CLASSROOM_LIST = [
        self::SECONDE_CLASSROOM => [
            "name" => "seconde"
        ],
        self::PREMIERE_CLASSROOM => [
            "name" => "première"
        ],
        self::TERMINAL_CLASSROOM => [
            "name" => "terminale"
        ],
        self::BTS1_CLASSROOM => [
            "name" => "BTS1"
        ],
        self::BTS2_CLASSROOM => [
            "name" => "BTS2"
        ],
        self::LYCENCE_CLASSROOM => [
            "name" => "licence"
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach(self::CLASSROOM_LIST as $reference => $data)
        {
            $classroom = new Classroom();
            $classroom->setName($data['name']);

            $manager->persist($classroom);
            $this->addReference($reference, $classroom);
        }
        
        $manager->flush();
    }
}