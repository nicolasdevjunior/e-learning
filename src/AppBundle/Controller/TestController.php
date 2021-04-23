<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Inscription;
//use AppBundle\Entity\InscriptionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use AppBundle\Entity\Projet;
use AppBundle\Entity\Avis;

class TestController extends Controller
{

    public function indexAction(Request $request)
    {
        $avis = $this->getDoctrine()->getRepository('AppBundle:Avis');
        $all = $avis->findBy(array('idProjet' =>3));
        $count = count($all);
        var_dump($all);
       
        die;  
       //return $this->render('AppBundle:Default:test.php.twig');
    }

    public function logAction(Request $request)
    {
       return $this->render('AppBundle:Login:log.php.twig');
    }
    	


    
}
