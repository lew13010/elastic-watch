<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10000; $i++) {
            $post = (new Post())
                ->setTitle($faker->sentence(3))
                ->setDescription($faker->paragraph());

            $manager->persist($post);
        }

        $manager->flush();
    }
}
