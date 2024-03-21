<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Trick;
use Faker\Factory;
use Faker\Generator;
use Monolog\DateTimeImmutable;

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

            $fakeTrick = new Trick();

            // var_dump($product);
            $fakeTrick->setName($this->faker->word(3) . $i);
            $fakeTrick->setDescription($this->faker->sentence(10) . $i);
            $fakeTrick->setAuthorId(1);
            $createdAt = $this->faker->dateTimeBetween('-1 year', 'now');
            $createdAtImmutable = DateTimeImmutable::createFromMutable($createdAt);
            $fakeTrick->setCreatedAt($createdAtImmutable);
            
            $updatedAt = $this->faker->dateTimeBetween('-1 year', 'now');
            $updatedAtImmutable = DateTimeImmutable::createFromMutable($updatedAt);
            $fakeTrick->setUpdatedAt($updatedAtImmutable);

            $manager->persist($fakeTrick);
        }

        $manager->flush();
    }
}
