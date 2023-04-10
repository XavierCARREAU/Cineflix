<?php

namespace App\DataFixtures;

use App\Entity\Actors;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ActorsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('us_US');

        for($act = 1; $act <= 50; $act++){
            $actor = new Actors();
            $actor->setName($faker->firstName() . ' ' .$faker->lastName());
            $manager->persist($actor);
        }

        $manager->flush();
    }
}
