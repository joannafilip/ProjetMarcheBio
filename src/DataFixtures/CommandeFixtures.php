<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Produit;
use App\Entity\User;
use App\Entity\Commande;
use Faker;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommandeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $users = $manager->getRepository(User::class)->findAll();
        $produits = $manager->getRepository(Produit::class)->findAll();
        $faker = Faker\Factory::create();
        for ($i = 1; $i < 9; $i++)
        {
            $commande = new Commande();
            $commande->setUser($users[$i]);
            $commande->setDateAchat($faker->dateTime);
            $commande->addProduit($produits[$i]);
            $manager->persist($commande);
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
