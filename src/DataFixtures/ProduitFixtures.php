<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Produit;
use App\Entity\Type;


class ProduitFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {
        $data = ['jus de poire', 'pommes', 'carottes', 'fromage','pain', 'biscuit'];
        for ($i = 0; $i < count($data); $i++){
            $produit = new Produit();
            $produit->setNom($data[$i]);
            $produit->setDescription($data[$i]. " :Trés bon produit" );
            $produit->setPrix($i + 5);
            $produit->setVendu(false);
            $manager->persist($produit);
        }

        $manager->flush();
    }
    
}
