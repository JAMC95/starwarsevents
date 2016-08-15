<?php
namespace Yoda\EventBundle\DataFixtures\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Yoda\UserBundle\Entity\User;
use Yoda\UserBundle\UserBundle;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;


class LoadUsers implements FixtureInterface, ContainerAwareInterface
{

    /*
     * @var ContainerInterface
     */
    private $container;
    /*
     * {@inheritDoc}
     *
     */
public function load(ObjectManager $manager)
{
    $user= new User();
    $user->setUsername('darth');
    $user->setEmail('vader@molon.com');
    $user->setPassword($this->encodePassword($user,'darthpass'));
    $manager->persist($user);

    $admin= new User();
    $admin->setUsername('admin');
    $admin->setPassword($this->encodePassword($admin,'admin pass'));
    $admin->setRoles(array('ROLE_ADMIN'));
    //$admin->setIsActive(false);
    $admin->setEmail('vader2@molon.com');
    $manager->persist($admin);

    $manager->flush();
}

    private function encodePassword(User $user, $plainPassword){
        $encoder= $this->container->get('security.encoder_factory')
            ->getEncoder($user);
        return $encoder->encodePassword($plainPassword, $user->getSalt());

    }
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container=$container;
    }
}