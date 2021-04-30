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
                 'joanna'.$i // lepassword1, lepassword2, etc...
             ));
            $user->setNom("Filip".$i);
            $user->setPrenom("Joanna".$i);
            $user->setRue("Avenue Charles".$i);
            $user->setVille("Bruxelles".$i);
            $user->setCp("1000".$i);
            $user->setRoles(['ROLE_CLIENT']);
            $manager->persist ($user);
        }
        // for ($i = 0; $i < 5 ; $i++){
        //     $user = new User();
        //     $user->setEmail ("autreuser".$i."@lala.com"); // user1@lala.com, user2@lala.com etc....
        //     $user->setPassword($this->passwordEncoder->encodePassword(
        //          $user,
        //          'lePassword'.$i // lepassword1, lepassword2, etc...
        //      ));
        //     $user->setNom("nom".$i);
        //     $user->setRoles(['ROLE_CLIENT','ROLE_GESTIONNAIRE']);
        //     $manager->persist ($user);
        // }
        $manager->flush();
    }
}
