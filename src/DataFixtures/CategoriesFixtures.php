<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        // Categories de utiles
        $this->createCategory('Nouveautés', '', null, $manager);
        $this->createCategory('Tendances', '', null, $manager);

        // Categories de genre
        $this->createCategory('action et aventure', '', null, $manager);
        $this->createCategory('Comédies', '', null, $manager);
        $this->createCategory('Documentaires', '', null, $manager);
        $this->createCategory('Drames', '', null, $manager);
        $this->createCategory('Horreur', '', null, $manager);
        $this->createCategory('Romance', '', null, $manager);
        $this->createCategory('SF', '', null, $manager);
        $this->createCategory('Fantastique', '', null, $manager);
        $this->createCategory('Sport', '', null, $manager);
        $this->createCategory('Thrillers', '', null, $manager);
        $this->createCategory('Policier', '', null, $manager);

        $films = $this->createCategory('Films', '', null, $manager);
        $this->createCategory('Films de BD et super-héros', '10118',  $films, $manager);
        $this->createCategory('Films de gangsters', '30140',  $films, $manager);
        $this->createCategory('Films de guerre', '3373',  $films, $manager);
        $this->createCategory('Films post-apocalyptiques', '21076',  $films, $manager);
        $this->createCategory('Films westerns', '7700',  $films, $manager);
        $this->createCategory('Films français', '58807',  $films, $manager);
        $this->createCategory('Films d’horreur déjantés', '1155',  $films, $manager);
        $this->createCategory('Films de monstres', '947',  $films, $manager);
        $this->createCategory('Films gore', '615',  $films, $manager);
        $this->createCategory('Films de zombies', '75421',  $films, $manager);
        $this->createCategory('Films de slashers et de tueurs en série', '8646',  $films, $manager);
        $this->createCategory('Films pour ados', '2340',  $films, $manager);
        $this->createCategory('Films jeunesse et famille', '783',  $films, $manager);
        $this->createCategory('Films fantastiques', '9744',  $films, $manager);
        $this->createCategory('Films sur les arts martiaux', '8985',  $films, $manager);
        $this->createCategory('nom', 'slug',  $films, $manager);


        $series = $this->createCategory('Séries', '', null, $manager);
        $this->createCategory('Séries absurdes', '77205',  $series, $manager);
        $this->createCategory('Séries d’action et d’aventure', '10673',  $series, $manager);
        $this->createCategory('Séries aisatiques', '85543',  $series, $manager);
        $this->createCategory('Séries de super-héros', '53717',  $series, $manager);
        $this->createCategory('Séries bonne humeur', '16688',  $series, $manager);
        $this->createCategory('Séries de complots', '27607',  $series, $manager);
        $this->createCategory('Séries dramatiques', '26018',  $series, $manager);
        $this->createCategory('Séries effrayantes', '25989',  $series, $manager);
        $this->createCategory('Séries émotion', '25833',  $series, $manager);
        $this->createCategory('Séries françaises', '62041',  $series, $manager);
        $this->createCategory('Séries judiciaires', '25801',  $series, $manager);
        $this->createCategory('Séries nostalgie', '2008977',  $series, $manager);
        $this->createCategory('Séries pour ados', '60951',  $series, $manager);
        $this->createCategory('Séries psychologiques', '26127',  $series, $manager);
        $this->createCategory('Séries avec voyage dans le temps', '75435',  $series, $manager);


        $animes = $this->createCategory('Animes', '', null, $manager);
        $this->createCategory('Animation inspirée d’un jeu vidéo', '93081',  $animes, $manager);
        $this->createCategory('Animation pour adultes', '11881',  $animes, $manager);
        $this->createCategory('Anime comique', '9302',  $animes, $manager);
        $this->createCategory('Anime d’action', '2653',  $animes, $manager);
        $this->createCategory('Anime dramatique', '452',  $animes, $manager);
        $this->createCategory('Anime fantastique', '11146',  $animes, $manager);
        $this->createCategory('Anime d’horreur', '10695',  $animes, $manager);
        $this->createCategory('Anime SF', '2729',  $animes, $manager);
        $this->createCategory('Séries d’animation japonaise', '6721',  $animes, $manager);
        $this->createCategory('Autres séries d’animation', '7424',  $animes, $manager);

        $manager->flush();
    }

    public function createCategory(string $name, string $slug, Categories $parent = null, ObjectManager $manager)
    {
        $category = new Categories();
        $category->setName($name);

        if ($slug == '') {
            $category->setSlug($this->slugger->slug($category->getName())->lower());
        } else {
            $category->setSlug($slug);
        }

        $category->setParent($parent);
        $manager->persist($category);

        return $category;
    }
}
