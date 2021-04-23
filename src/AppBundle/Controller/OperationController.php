<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Publication;
use AppBundle\Entity\Notifications;
use AppBundle\Entity\Jaime;

class OperationController extends Controller
{
    public function jaimeAction($id)
    {
    	$doctrine = $this->getDoctrine();
        $session =$this->get('session');
        $current_id = $session->get('id');

        $jaime = new Jaime();
        $jaime->setIdUser($current_id);
        $jaime->setIdPublication($id);
        $em = $doctrine->getManager();
        $em->persist($jaime);
        $em->flush();

        $repository = $doctrine->getManager()->getRepository('AppBundle:Publication');
        $supprimer = $repository->updateJaime($id);
      
        return $this->redirectToRoute('profile_homepage');
    }

    public function personnequiaimeAction($idPub)
    {
      $session =$this->get('session');
      $current_id = $session->get('id');

      $doctrine = $this->getDoctrine();
      $repository = $doctrine->getManager()->getRepository('AppBundle:Publication');
      $jaime = $doctrine->getManager()->getRepository('AppBundle:Jaime');
      
      $alluserQuiAime = $repository->selectTroisUserQuiAime($current_id,$idPub);
      $nombre =0;

      if(count($alluserQuiAime)>2)
      {
          $nombre = count($alluserQuiAime) - 2;
      }
      $userQuiAime = $repository->selectUserQuiAime($current_id,$idPub);
      $current_user = $jaime->findBy(array('idUser'=>$current_id,'idPublication'=>$idPub));
       return $this->render('AppBundle:Default:personnequiaime.php.twig',array('idPub'=>$idPub,'userQuiAime'=>$userQuiAime,'nombre'=>$nombre,'current_user'=>$current_user));
    }

    public function insertNotificationAction($session,$idP,$idPub)
    {
        $notifications = new Notifications();
        $notifications->setSubject("jaime");
        $notifications->setStateNotification(0);
        $notifications->setSender($session);
        $notifications->setRecever($idP);
        $notifications->setIdPub($idPub);
        $notifications->setCreatedAt(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $em->persist($notifications);
    }

    public function jaimeAmisAction($id,$idP,$page)
    {
      $doctrine = $this->getDoctrine();
        $session =$this->get('session');
        $current_id = $session->get('id');
        $idP = intval($idP);
        $em = $doctrine->getManager();
        if($current_id != $idP) 
        {
          $this->insertNotificationAction($current_id,$idP,$id);
          $em->flush();
        }else{
          $error = "different";
        }  
        $jaime = new Jaime();
        $jaime->setIdUser($current_id);
        $jaime->setIdPublication($id);
        $em->persist($jaime);
        $em->flush();

          
        $repository = $doctrine->getManager()->getRepository('AppBundle:Publication');
        $supprimer = $repository->updateJaime($id);
        if($page =="profile_amis")
        {
          return $this->redirectToRoute('profile_amis',array('id'=>$idP));
        }
        if($page =="publication")
        {
          return $this->redirectToRoute('affichePub',array('idPub'=>$id));
        }
        
    }

    public function supprimerAction($id)
    {
      $doctrine = $this->getDoctrine();
      $repository = $doctrine->getManager()->getRepository('AppBundle:Publication');
      $supprimer = $repository->deletePub($id);

      $session =$this->get('session');
      $current_id = $session->get('id');
      
      $repository = $doctrine->getManager()->getRepository('AppBundle:Jaime');
      $supprimerJaime = $repository->deletePub($current_id,$id);
       
      return $this->redirectToRoute('profile_homepage');
    }

    public function jenaimeplusAmisAction($id,$idP,$page)
    {
      $doctrine = $this->getDoctrine();
      $session =$this->get('session');
      $current_id = $session->get('id');

      $repositoryPub = $doctrine->getManager()->getRepository('AppBundle:Publication');
      $jenaimeplus = $repositoryPub->reupdateJaime($id);
      $supprimerNotif = $repositoryPub->deletePubNotif($current_id,$id);

      $repository = $doctrine->getManager()->getRepository('AppBundle:Jaime');
      $supprimerJaime = $repository->deletePub($current_id,$id);
      
      
      if($page =="profile_amis")
        {
          return $this->redirectToRoute('profile_amis',array('id'=>$idP));
        }
        if($page =="publication")
        {
          return $this->redirectToRoute('affichePub',array('idPub'=>$id));
        }

    }

    public function jenaimeplusAction($id)
    {
      $doctrine = $this->getDoctrine();
      $session =$this->get('session');
      $current_id = $session->get('id');


      $repository = $doctrine->getManager()->getRepository('AppBundle:Publication');
      $jenaimeplus = $repository->reupdateJaime($id);

      $repository = $doctrine->getManager()->getRepository('AppBundle:Jaime');
      $supprimerJaime = $repository->deletePub($current_id,$id);
      return $this->redirectToRoute('profile_homepage');
    }


    public function commentaireAction($id)
    {
      return $this->redirectToRoute('profile_homepage');
    }
    
}
