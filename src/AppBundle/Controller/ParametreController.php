<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\User;
use AppBundle\Form\MessageType;

class ParametreController extends Controller
{
    public function indexAction()
    {
    
      return $this->render('AppBundle:Parametre:parametre.php.twig');

    }
}
