<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
         $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        for ($i = 1; $i < 6 ; $i++){
            $user = new User();
            $user->setEmail("client" . $i . "@gmail.com");
            $user->setPassword($this->passwordEncoder->encodePassword(
                 $user,
                 'client' . $i
             ));
            $user->setNom($faker->firstName);
            $user->setPrenom($faker->lastname);
            $user->setRue($faker->streetName);
            $user->setVille('Bruxelles');
            $user->setCp($faker->postcode);
            $user->setRoles(['ROLE_CLIENT']);
            $manager->persist($user);
        }
        for ($i = 1; $i < 7 ; $i++){
            $user = new User();
            $user->setEmail("producteur" . $i . "@gmail.com");
            $user->setPassword($this->passwordEncoder->encodePassword(
                 $user,
                 'producteur' . $i
             ));
            $user->setNom($faker->firstName);
            $user->setPrenom($faker->lastname);
            $user->setRue($faker->streetName);
            $user->setVille('Bruxelles');
            $user->setCp($faker->postcode);
            $user->setNumeroProducteur('454545' .$i +10);
            $user->setNomProducteur($faker->company);
            $user->setRoles(['ROLE_PRODUCTEUR']);
            $manager->persist($user);
        }

        $manager->flush();
    }
    
}
