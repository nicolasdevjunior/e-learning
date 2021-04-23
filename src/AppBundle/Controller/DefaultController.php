<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        //return $this->render('AppBundle:Default:layout.html.twig');

    if($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')){
            return $this->redirectToRoute('profile_homepage');
        }else{
        return $this->redirectToRoute('fos_user_security_login');
        }
    }

    public function testUserAction()
    {
        //$this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('ExampleRoles/helloword.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    
    public function testAdminAction()
    {
         //$this->denyAccessUnlessGranted('ROLE_ADMIN');
         return $this->render('ExampleRoles/hellowordadmin.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
}
