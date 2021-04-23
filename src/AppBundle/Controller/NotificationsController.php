<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Entity\Notifications;

class NotificationsController extends Controller
{
    public function indexAction()
    {
      $userManager = $this->get('fos_user.user_manager');
      $user = $this->getUser()->getId();
      $session =$this->get('session');
      $session->set('id',$user);
      $current_id = $session->get('id');
      
      $em = $this->getDoctrine()->getManager();
      $doctrine = $this->getDoctrine();
      $repository = $doctrine->getManager()->getRepository('AppBundle:Notifications');
      $notifications = $repository->findByRecever($current_id); 
      $allnotifications =$repository->selectAllNotif($current_id);
      $notification = $repository->setStateNotif($current_id);
  
      return $this->render('AppBundle:Notifications:notifications.php.twig',array('notifications'=>$notifications,'allnotifications'=>$allnotifications));

    }

  
}
