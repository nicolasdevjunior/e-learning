<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlusController extends Controller
{
    public function indexAction()
    {
   
     return $this->render('AppBundle:Plus:plus.php.twig');

    }
}
