<?php
namespace Yoda\EventBundle\DataFixtures\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Yoda\EventBundle\Entity\Event;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


class LoadUserData implements FixtureInterface, OrderedFixtureInterface{
public function load(ObjectManager $manager)
{
    $joxe = $manager->getRepository('UserBundle:User')
        ->findOnebyUserNameOrEmail('darth');
    $event1 = new Event();
    $event1->setName('Fiesta sorpresa de Darth');
    $event1->setLocation('Deathstar');
    $event1->setTime( new \DateTime('1990-05-05'));
    $event1->setDetails('Darth odia las sorpesas!!!!');
    $manager->persist($event1);

    $event2 = new Event();
    $event2->setName('Vuelve por navidad');
    $event2->setLocation('Jauja');
    $event2->setTime( new \DateTime('1990-05-05'));
    $event2->setDetails('El almendro');
    $manager->persist($event2);
    $event1->setOwner($joxe);
    $event2->setOwner($joxe);
    $manager->flush();
}

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
       return 20;
    }
}