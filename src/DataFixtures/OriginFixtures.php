<?php

namespace App\DataFixtures;

use App\Entity\Origin;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class OriginFixtures extends Fixture{
    public const GD_ORIGIN = "GD_ORIGIN";
    public const APEX_ORIGIN = "APEX_ORIGIN";
    public const PCSI_ORIGIN = "PCSI_ORIGIN";
    public const LES_MATHS_POUR_LES_NULS_ORIGIN = "LES_MATHS_POUR_LES_NULS_ORIGIN";
    public const INDICE_MATHS_ORIGIN = "INDICE_MATHS_ORIGIN";

    const ORIGIN_LIST = [
        self::GD_ORIGIN => [
            "name" => "géométire",
        ],
        self::APEX_ORIGIN => [
            "name" => "apex of the math",
        ],
        self::PCSI_ORIGIN => [
            "name" => "résonner",
        ],
        self::LES_MATHS_POUR_LES_NULS_ORIGIN => [
            "name" => "Les maths pour les nuls",
        ],
        self::INDICE_MATHS_ORIGIN => [
            "name" => "Indice maths",
        ]
    ];

    public function load(objectManager $manager): void
    {
        foreach(self::ORIGIN_LIST as $reference => $data)
        {
            $origin = new Origin();
            $origin->setName($data['name']);
            
            $manager->persist($origin);
            
            $this->addReference($reference, $origin);
        }
        $manager->flush();
    }
}