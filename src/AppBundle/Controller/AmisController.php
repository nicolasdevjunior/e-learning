<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Entity\Demande;

class AmisController extends Controller
{

    public function indexAction(Request $request)
    {
    	$session =$this->get('session');
    	$userManager = $this->get('fos_user.user_manager');
        $u = $this->getUser()->getId();
        $session->set('id',$u);
        $current_id = $session->get('id');
        $repository = $this->getDoctrine()->getRepository('AppBundle:Demande');
        $all = $repository->getAllAmisUser($current_id);
        $all_amis = count($all);
        $user = $repository->getAmisUser($current_id);
        // var_dump($user);die;
        return $this->render('AppBundle:Amis:amis.php.twig',array('infouser' => $user,'all_amis'=>$all_amis));
    }
       
}
