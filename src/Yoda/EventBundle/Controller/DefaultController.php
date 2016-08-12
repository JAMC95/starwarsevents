<?php

namespace Yoda\EventBundle\Controller;

use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Response;
use Yoda\EventBundle\Entity\Event;

class DefaultController extends Controller
{

    public function indexAction($count, $fistName)
    {
       // var_dump($name, $count); die;
       // return $this->render('EventBundle:Default:index.html.twig', array('name'=> $name));
       //Una forma de declararlo y hacer que salga por el navegador los datos de una forma similar a cuando coges un JSON "A pelo"
        /* $data= array(
            'count'=> $count,
            'name'=> $name,
            'mensaje'=> 'It\'s a trap!'
        );
        $json=json_encode($data);
       $response = new Response($json);
        $response->headers->set('Content-Type', 'application/json');
        return $response;*/

        // Forma estándar mas responsive para añadir los datos al twig
       // $templating = $this -> container -> get('templating');

            $em= $this->container->get('doctrine')->getManager();
        $repo = $em->getRepository('EventBundle:Event');

        $event = $repo->findOneBy(array(
            'name'=>'Darth\'s surprise birthday party'
        ));
        return $this->render (
          'EventBundle:Default:index.html.twig',
            array('name'=>$fistName,
                'count'=>$count,
                'event'=>$event));


    }

    public function createAction(){
        $event = new Event();
        $event->setName('Darth\'s surprise birthday party');
        $event->setLocation('Deathstar');
        $event->setTime( new \DateTime('1990-05-05'));
        $event->setDetails('Ha! Darth HATES surprises!!!!');

        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($event);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new product with id ');
    }


  
}
