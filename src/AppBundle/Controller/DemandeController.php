<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Demande;
use AppBundle\Entity\Bloquer;

class DemandeController extends Controller
{

    public function indexAction()
    {
    	$session =$this->get('session');
        $current_id = $session->get('id');

        // $page=explode('/',$_SERVER['REQUEST_URI']);
        // $url = array_pop($page);
        // if($url = "demande")
        // {
        //   return $this->redirectToRoute('demande');
        // }
        // if($url = "suggestion")
        // {

    	 $repository = $this->getDoctrine()->getRepository('AppBundle:Demande');
        $user = $repository->getDemandeUser($current_id);
         return $this->render('AppBundle:Demande:demande.php.twig',array('infouser' => $user));
    }

    public function ajouterAmisAction($id)
    {
    	$session =$this->get('session');
    	$current_id = $session->get('id');
      $doctrine = $this->getDoctrine();

      $repository = $doctrine->getManager()->getRepository('AppBundle:Demande');
      $check = $repository->idPresentAnnuler($current_id,$id);
      if(empty($check))
      {
        $ajouterAmis = new Demande();
        $ajouterAmis->setIdUserRecever($id);
        $ajouterAmis->setIdUserSender($current_id);
        $ajouterAmis->setStateRequest(0);

        $em = $this->getDoctrine()->getManager();
        $em->persist($ajouterAmis);
        $em->flush();
      }
        
        return $this->redirectToRoute('suggestion');
    }

    public function confirmerDemandeAction($id)
    {
        $session =$this->get('session');
        $current_id = $session->get('id');
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getManager()->getRepository('AppBundle:Demande');

        $check = $repository->idPresentConfirmer($current_id,$id);
        if(!empty($check))
        {
             $user = $repository->confirmerDemande($current_id,$id);
        }
        return $this->redirectToRoute('suggestion');
      
    }

    public function confirmerDemandeUserAction($id)
    {
        $session =$this->get('session');
        $current_id = $session->get('id');
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getManager()->getRepository('AppBundle:Demande');

        $check = $repository->idPresentConfirmer($current_id,$id);
        if(!empty($check))
        {
             $user = $repository->confirmerDemande($current_id,$id);
        }
        return $this->redirectToRoute('demande');
      
    }

    public function retirerAmisAction($id,$url)
    {
        $session =$this->get('session');
        $current_id = $session->get('id');

        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getManager()->getRepository('AppBundle:Demande');
        $check = $repository->idPresentAccept($current_id,$id);
        if(!empty($check))
        {
           $user = $repository->deleteRequestSent($current_id,$id);
        }
        // $page=explode('/',$_SERVER['REQUEST_URI']);
        // $url = array_pop($page);
        if($url == "amis")
        {
          return $this->redirectToRoute('amis');
        }
        if($url == "suggestion")
        {
          return $this->redirectToRoute('suggestion');
        }
    }

    public function annulerDemandeUserAction($id)
    {
        $session =$this->get('session');
        $current_id = $session->get('id');

        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getManager()->getRepository('AppBundle:Demande');
        $check = $repository->idPresentAnnuler($current_id,$id);
        if(!empty($check))
        {
           $user = $repository->deleteRequestSent($current_id,$id);
        }
        return $this->redirectToRoute('demande');
    }


    public function annulerDemandeAction($id)
    {
        $session =$this->get('session');
        $current_id = $session->get('id');

        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getManager()->getRepository('AppBundle:Demande');

        $check = $repository->idPresentAnnuler($current_id,$id);
        if(!empty($check))
        {
        $user = $repository->deleteRequestSent($current_id,$id);
        }
        return $this->redirectToRoute('suggestion');
    }

    public function bloquerAction($id)
    {
       $session =$this->get('session');
       $current_id = $session->get('id');
       $doctrine = $this->getDoctrine();
       $repository = $doctrine->getManager()->getRepository('AppBundle:Bloquer');
       $bloquer = new Bloquer();
       $bloquer->setIdUser($current_id);
       $bloquer->setIdBloque($id);
       $bloquer->setStateRequest(0);

       $em = $doctrine->getManager();
       $em->persist($bloquer);
       $em->flush();

       return $this->redirectToRoute('suggestion');
    }
    
}
