<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager){

        $users = [];

        $user1 = new User();
        $user2 = new User();

        $hash1 = $this->encoder->encodePassword($user1, 'password');
        $hash2 = $this->encoder->encodePassword($user2, 'melodie-1988@hotmail.fr');

        $user1->setEmail("lorydim44@gmail.com")
             ->setFirstName("Dimitri")
             ->setLastName("LORY")
             ->setStatus("Admin")
             ->setHash($hash1);

        $user2->setEmail("melodie-1988@hotmail.fr")
            ->setHash($hash2);

        $manager->persist($user1);
        $manager->persist($user2);
        $users[] = $user1;
        $users[] = $user2;

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
