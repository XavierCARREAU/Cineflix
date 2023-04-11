<?php

namespace App\DataFixtures;

use App\Entity\Movies;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class MoviesFixtures extends Fixture
{

    public function __construct(private SluggerInterface $slugger) {}

    public function load(ObjectManager $manager): void
    {
        // $faker = Faker\Factory::create('fr_FR');

        // for ($mov = 1; $mov <= 100; $mov++) {
        //     $movie = new Movies();
        //     $movie->setTitle($faker->text(30));
        //     $movie->setDescription($faker->text());
        //     $movie->setPoster($faker->imageUrl());
        //     $movie->setReleaseDate($faker->dateTimeThisDecade()); // $faker->year()
        //     $movie->setDirector($faker->firstName() . ' ' . $faker->lastName());
        //     $movie->setProductor($faker->firstName() . ' ' . $faker->lastName());
        //     $movie->setSlug($this->$slugger->slug($movie->getTitle())->lower());
        //     $movie->setCategories($categories);

        //     $manager->persist($movie);
        // }

        // $manager->flush();

        // $manager->flush();
    }
}
