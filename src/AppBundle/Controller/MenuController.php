<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Entity\Demande;
use AppBundle\Entity\Message;

class MenuController extends Controller
{

    public function indexAction(Request $request)
    {
    	$session =$this->get('session');
    	$userManager = $this->get('fos_user.user_manager');
        $u = $this->getUser()->getId();
        $session->set('id',$u);
        $current_id = $session->get('id');
        $repository = $this->getDoctrine()->getRepository('AppBundle:Demande');
        $notif = $this->getDoctrine()->getRepository('AppBundle:Notifications');

        $allnotifState = $notif->allnotifState($current_id);
        $nbreNotification = count($allnotifState);
        $mp = $this->getDoctrine()->getRepository('AppBundle:Message');
        $user = $repository->verifyIdInTable($current_id);
        $nbreDemande = count($user);
        $message = $mp->selectStateMessage($current_id);
        $nbreMessage =0;
        
        for($i=0;$i<count($message);$i++){
            if($message[$i]['idRecever'] == $current_id)
            {
                $nbreMessage = $nbreMessage+1;
            }
        }
        
        return $this->render('AppBundle:Default:navbar.php.twig',array('nombreDemande'=>$nbreDemande,'nbreMessage'=>$nbreMessage,'nombreNotification'=>$nbreNotification));
    }
       
}
