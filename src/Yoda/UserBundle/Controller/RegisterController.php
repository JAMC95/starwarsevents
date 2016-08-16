<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 15/08/16
 * Time: 16:59
 */

namespace Yoda\UserBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\Compiler\RepeatedPass;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Yoda\UserBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;



class RegisterController extends Controller
{
    /**
     * @Route("/register", name="register_form")
     * @Template()
     */
   public function registerAction(Request $request) {
    $form=$this->createFormBuilder()
        ->add('username', TextType::class)
        ->add('email', EmailType::class)
        ->add('password',RepeatedType::class,array('type'=>PasswordType::class))
        ->add('save', SubmitType::class,array('label'=>'Registrarse','attr'=> array('class'=>'btn btn-primary pull-right')
        ))
        ->getForm();


       $form->handleRequest($request);
       if($form->isValid()){
       $data = $form->getData();

           $user = new User();
           $user->setUsername($data['username']);
           $user->setEmail($data['email']);
           $user->setPassword($this->encodePassword($user,$data['password']));

           $em = $this->getDoctrine()->getManager();
           $em->persist($user);
           $em->flush();

           $this->addFlash(
               'notice',
               'Bienvenido a la estrella de la muerte!'
           );


           return $this->redirectToRoute('event_index');
       }

       return array('form'=>$form->createView());
   }

    private function encodePassword(User $user, $plainPassword)
    {
        $encoder = $this->container->get('security.encoder_factory')
            ->getEncoder($user)
        ;

        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }

}