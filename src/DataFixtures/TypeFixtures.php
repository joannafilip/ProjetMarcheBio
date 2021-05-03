<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Length;
use App\Entity\Type;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $data = ['boulangerie', 'cremerie', 'epicerie', 'legumes', 'fruits', 'boissons'];
        for ($i = 0; $i < count($data); $i++)
        {
            $type= new Type([
                'label' => $data[$i],
            ]);
            $manager->persist($type);
        }
        $manager->flush();
    }
}
