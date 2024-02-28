<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixtures extends Fixture{
    public const ADMIN_USER = "ADMIN_USER";
    public const PROF_USER = "PROF_USER";
    public const PROF2_USER = "PROF2_USER";
    public const ELEVE_USER = "ELEVE_USER";
    public const ELEVE2_USER = "ELEVE2_USER";

    const USER_LIST = [
        self::ADMIN_USER => [
            "role" => "Administrateur",
            "email" => "admin@st-vincent.fr",
            "password"=> "admin123",
            "lastName" => "Nalek",
            "firstName" => "Remi"
        ],
        self::PROF_USER => [
            "role" => "contributeurs",
            "password"=> "prof123",
            "email" => "prof1@st-vincent.fr",
            "lastName" => "Ryumen",
            "firstName" => "Sukuna"
        ],
        self::PROF2_USER => [
            "role" => "contributeurs",
            "password"=> "prof234",
            "email" => "prof2@st-vincent.fr",
            "lastName" => "Satoru",
            "firstName" => "Gojo"
        ],
        self::ELEVE_USER => [
            "role" => "contributeurs",
            "password"=> "eleve123",
            "email" => "itadoti@st-vincent.fr",
            "lastName" => "Itadoti",
            "firstName" => "Yuji"
        ],
        self::ELEVE2_USER => [
            "role" => "contributeurs",
            "password"=> "eleve234",
            "email" => "raphael@st-vincent.fr",
            "lastName" => "Toursel",
            "firstName" => "Raphael"
        ]
    ];

    public function load(objectManager $manager): void
    {
        foreach(self::USER_LIST as $reference => $data)
        {
            $user = new User();
            $user->setRole($data['role']);
            $user->setEmail($data['email']);
            $user->setLastName($data['lastName']);
            $user->setPassword($data['password']);
            $user->setFirstName($data['firstName']);

            // dd($user);
            $manager->persist($user);
            $this->addReference($reference, $user);
        }
        $manager->flush();
    }
}