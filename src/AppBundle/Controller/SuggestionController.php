<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Entity\Demande;

class SuggestionController extends Controller
{

    public function indexAction(Request $request)
    {
    	$session =$this->get('session');
    	$userManager = $this->get('fos_user.user_manager');
        $u = $this->getUser()->getId();
        $session->set('id',$u);
        $current_id = $session->get('id');
        $repository = $this->getDoctrine()->getRepository('AppBundle:User');

		$user = $repository->searchOtherId($current_id);
        return $this->render('AppBundle:Suggestion:suggestion.php.twig',array('infouser' => $user));
    }
     
    public function checkIfUserWasSendrequestAction($idOther)
    {
    	$session =$this->get('session');
    	$current_id = $session->get('id');
    	$repository = $this->getDoctrine()->getRepository('AppBundle:Demande');
		$user = $repository->checkIfUserHasSentRequest($current_id,$idOther);
		if(!empty($user))
		{
			if($user[0]['idUserSender'] == $current_id AND $user[0]['stateRequest'] ==0)
			{
			   return $this->render('AppBundle:Suggestion:annuler.php.twig',array('idOther'=>$idOther));
			}

			if($user[0]['idUserRecever'] == $current_id AND $user[0]['stateRequest'] ==0)
			{
		       return $this->render('AppBundle:Suggestion:confirmer.php.twig',array('idOther'=>$idOther));
			}

            if($user[0]['idUserRecever'] == $current_id AND $user[0]['idUserSender'] == $idOther AND $user[0]['stateRequest'] ==1)
            {
               return $this->render('AppBundle:Suggestion:retirer.php.twig',array('idOther'=>$idOther));
            }

            if(($user[0]['idUserRecever'] == $idOther AND $user[0]['idUserSender'] == $current_id AND $user[0]['stateRequest'] ==1))
            {
               return $this->render('AppBundle:Suggestion:retirer.php.twig',array('idOther'=>$idOther));
            }

		}else{
			return $this->render('AppBundle:Suggestion:ajouter.php.twig',array('idOther'=>$idOther));
		}
        
    }
    
}
