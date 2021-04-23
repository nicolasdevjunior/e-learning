<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LogoutController extends Controller
{
    public function indexAction()
    {
      //session_start(); 
      session_destroy();
      $_SESSION=array();
      $_SESSION=array();
      return $this->redirectToRoute('fos_user_security_login');
    }

    
}
