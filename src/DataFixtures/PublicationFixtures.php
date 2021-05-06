<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Publication;
use App\Entity\User;
use App\Entity\Produit;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class PublicationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        // $users = $manager->getRepository(User::class)->findBy(['roles'=>'ROLE_PRODUCTEUR']);
        $users = $manager->getRepository(User::class)->findAll();
        $produits = $manager->getRepository(Produit::class)->findAll();
        
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 9; $i++){
            $publication = new Publication();
            $publication->setDatePublication($faker->dateTime);
            $publication->setUser($users[$i]);
            $publication->setProduit($produits[array_rand($produits)]);
            $manager->persist($publication);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            ProduitFixtures::class,
            UserFixtures::class,
            
        ];
    }
}
