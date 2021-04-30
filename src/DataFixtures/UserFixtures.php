<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
         $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5 ; $i++){
            $user = new User();
            $user->setEmail ("joanna".$i."@gmail.com");
            $user->setPassword($this->passwordEncoder->encodePassword(
                 $user,
                 'joanna'.$i
             ));
            $user->setNom("Filip".$i);
            $user->setPrenom("Joanna".$i);
            $user->setRue("Avenue Charles".$i);
            $user->setVille("Bruxelles".$i);
            $user->setCp("1000".$i);
            $user->setRoles(['ROLE_CLIENT']);
            $manager->persist ($user);
        }
            $user = new User();
            $user->setEmail ("anna@gmail.com");
            $user->setPassword($this->passwordEncoder->encodePassword(
                 $user,
                 'joanna'
             ));
            $user->setNom("Filip");
            $user->setPrenom("Anna");
            $user->setRue("rue de la pomme");
            $user->setVille("Bruxelles");
            $user->setCp("1000");
            $user->setRoles(['ROLE_PRODUCTEUR']);
            $manager->persist ($user);

        $manager->flush();
    }
}
