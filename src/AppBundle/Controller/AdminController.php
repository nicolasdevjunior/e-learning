<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{

    public function indexAction(Request $request)
    {

    }
    	
    public function getuserAction(Request $request)
    {
    	$repository = $this->getDoctrine()->getRepository('AppBundle:User');
    	$user = $repository->findAll();
    	return $this->render('AppBundle:List:listuser.php.twig',array('infouser' => $user));
    }

    public function getoneuserAction(Request $request,$id)
    {
    	$repository = $this->getDoctrine()->getRepository('AppBundle:User');
    	$user = $repository->find($id);
    	return $this->render('AppBundle:List:oneuser.php.twig',array('infouser' => $user));
    }

    
}
