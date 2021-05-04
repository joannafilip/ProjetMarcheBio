<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Publication;
use Faker;

class PublicationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++){
            $publication = new Publication();
            $publication->setDatePublication($faker->dateTime);
            $manager->persist($publication);
        }
        $manager->flush();
    }
}
