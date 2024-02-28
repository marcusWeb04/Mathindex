<?php

namespace App\DataFixtures;

use App\Entity\File;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class FileFixtures extends Fixture{
    public const PREMIER_FILE = "PREMIER_FILE";
    public const SECONDE_FILE = "SECONDE_FILE";
    public const THIRD_FILE = "THIRD_FILE";
    public const FOURTH_FILE = "FOURTH_FILE";
    public const FIVE_FILE = "FIVE_FILE";

    const FILE_LIST = [
        self::PREMIER_FILE => [
            "name" => "Lesson numéro 1",
            "originalName" => "Silent Clubsteb",
            "extention" => ".png",
            "size" => "1.27"
        ],
        self::SECONDE_FILE => [
            "name" => "LESSON 2",
            "originalName" => "Firework",
            "extention" => ".png",
            "size" => "2.15"
        ],
        self::THIRD_FILE => [
            "name" => "Exercice 1",
            "originalName" => "Abyss of Darkness",
            "extention" => ".png",
            "size" => "2.03"
        ],
        self::FOURTH_FILE => [
            "name" => "Exercice numéro 4",
            "originalName" => "acheron",
            "extention" => ".png",
            "size" => "1.55"
        ],
        self::FIVE_FILE => [
            "name" => "DM de mathédatique",
            "originalName" => "Avernus",
            "extention" => ".pdf",
            "size" => "1.20"
        ]
    ];

    public function load(objectManager $manager): void
    {
        foreach(self::FILE_LIST as $reference => $data)
        {
            $file = new File();
            $file->setName($data['name']);
            $file->setOriginName($data['originalName']);
            $file->setExtention($data['extention']);
            $file->setSize($data['size']);

            $manager->persist($file);
            
            $this->addReference($reference, $file);
        }
        $manager->flush();
    }
}