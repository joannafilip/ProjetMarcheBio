<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\User;
use App\Entity\Publication;
use App\Entity\Produit;

class LienProduitPublicationUser extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $repUser = $manager->getRepository(User::class);
        $users= $repUser->findAll();
        
        $repPublication = $manager->getRepository(Publication::class);
        $publications = $repPublication->findAll();

        $repProduit = $manager->getRepository(Produit::class);
        $produits = $repProduit->findAll();
        

        foreach ($publications as $publication){
            $user = $users[array_rand($users)];
            $user->addPublication($publication);
        }
        foreach ($publications as $publication){
            $produit = $produits[array_rand($produits)];
            $produit->addPublication($publication);
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
