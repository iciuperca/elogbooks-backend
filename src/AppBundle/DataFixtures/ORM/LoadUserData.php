<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setName("Joe Bloggs");
        $user1->setEmail("joe.bloggs@foo.com");
        $manager->persist($user1);

        $user2 = new User();
        $user2->setName("John Doe");
        $user2->setEmail("john.doe@bar.com");
        $manager->persist($user2);

        $manager->flush();
    }
}