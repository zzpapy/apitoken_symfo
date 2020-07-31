<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
       $user = new User;
       $password = "test";
       $user->setUsername("zzpapy");
       $encoded = $this->encoder->encodePassword($user, $password);
       $user->setPassword($encoded);

        $manager->persist($user);
        $manager->flush();
    }
}
