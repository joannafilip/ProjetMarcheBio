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
        $dataType = ['boissons', 'fruits', 'legumes', 'cremerie', 'boulangerie', 'epicerie', 'legumes', 'legumes', 'cremerie'];
        $dataProduits = ['jus de poire', 'pommes', 'carottes', 'fromage','pain', 'biscuit', 'concombres', 'tomates', 'yaourt'];

        for ($i = 0; $i < count($dataType); $i++)
        {
            $type= new Type([
                'label' => $dataType[$i],
            ]);
            $manager->persist($type);
        }

        
        $manager->flush();
        $types = $manager->getRepository(Type::class)->findAll();
        
        for ($i = 0; $i < count($dataProduits); $i++)
        {
            $produit = new Produit();
            $produit->setNom($dataProduits[$i]);
            $produit->setDescription($dataProduits[$i]. " :Trés bon produit" );
            $produit->setPrix($i + 5);
            $produit->setVendu(false); 
            $manager->persist($produit);
            $produit->setType($types[$i]);
            $manager->persist($produit);
        }
                
        $manager->flush();
        
    }

}
