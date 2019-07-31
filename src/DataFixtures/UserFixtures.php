<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;



 class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $user = new User();
        $user->setUsername('mayajolie');
        $user->setPassword('mayajolie');
        $user->setRoles(['ROLE_SUPER_ADMIN']);
        $user->setNom('ngom');
        $user->setPrenom('mariama');
        $user->setAdresse('parcelle');
        $user->setTelephone(772918604);
        $user->setEmail('maya@gmail.com');
        $user->setEtat('');
        
        //$user->setIdPartenaire();

        
        $manager->persist($user);
        $manager->flush();
    }
}
