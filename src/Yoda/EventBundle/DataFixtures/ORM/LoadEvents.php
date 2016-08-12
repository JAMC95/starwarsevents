<?php
namespace Yoda\EventBundle\DataFixtures\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Yoda\EventBundle\Entity\Event;


class LoadUserData implements FixtureInterface
{
public function load(ObjectManager $manager)
{
    $event1 = new Event();
    $event1->setName('Darth\'s Birthday Party');
    $event1->setLocation('Deathstar');
    $event1->setTime( new \DateTime('1990-05-05'));
    $event1->setDetails('Ha! Darth HATES surprises!!!!');
    $manager->persist($event1);

    $event2 = new Event();
    $event2->setName('Vuelve por navidad');
    $event2->setLocation('Jauja');
    $event2->setTime( new \DateTime('1990-05-05'));
    $event2->setDetails('El almendro');
    $manager->persist($event2);
    $manager->flush();
}
}