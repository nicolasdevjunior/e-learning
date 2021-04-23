<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\User;
use AppBundle\Form\MessageType;

class MaintenanceController extends Controller
{
    public function indexAction()
    {
    
      return $this->render('AppBundle:Default:maintenance.php.twig');

    }
}