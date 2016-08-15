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

class RegisterController extends Controller
{
    /**
     * @Route("/register", name="register_form")
     * @Template()
     */
   public function registerAction() {
    $form=$this->createFormBuilder()
        ->add('username','Symfony\Component\Form\Extension\Core\Type\TextType')
        ->add('email','Symfony\Component\Form\Extension\Core\Type\TextType')
        ->add('password','Symfony\Component\Form\Extension\Core\Type\PasswordType')
        ->getForm();
       return array('form'=>$form->createView());
   }

}