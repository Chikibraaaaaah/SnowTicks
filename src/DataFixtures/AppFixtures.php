<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;
use Faker\Factory;
use Faker\Generator;

class AppFixtures extends Fixture
{

    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {

        for($i = 1; $i < 20; $i++){

            $product = new Article();

            var_dump($product);
            $product->setTitle($this->faker->word(3) . $i);
            $product->setContent($this->faker->sentence(10) . $i);
            $product->setAuthorId(1);

            $manager->persist($product);
        }

        $manager->flush();
    }
}
