<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Produit;
use App\Entity\Type;

class LienProduitTypeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $repType = $manager->getRepository(Produit::class);
        $types = $repType->findAll();
        
        $repProduit = $manager->getRepository(Type::class);
        $produits = $repProduit->findAll();

        foreach ($types as $type){
            $produit = $produits[array_rand($produits)];
            $produit->addProduit($type);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TypeFixtures::class,
            ProduitFixtures::class,
        ];
    }
}
