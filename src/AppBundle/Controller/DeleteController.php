<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Inscription;

class DeleteController extends Controller
{
    public function indexAction(Request $request,$id)
    {
    	$doctrine = $this->getDoctrine();
    	$em = $doctrine->getManager();
    	$repository = $doctrine->getRepository('AppBundle:Inscription');

    	$user = $repository->find($id);
    	$em->remove($user);
		$em->flush();
        
        return $this->redirect($this->generateUrl('all_user'));
    }

    
}
