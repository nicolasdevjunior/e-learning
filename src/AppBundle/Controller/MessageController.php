<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Entity\Message;
use AppBundle\Entity\MemberMessage;
use AppBundle\Form\MessageType;

class MessageController extends Controller
{
    public function indexAction()
    {
      $userManager = $this->get('fos_user.user_manager');
      $user = $this->getUser()->getId();
      $session =$this->get('session');
      $session->set('id',$user);
      $current_id = $session->get('id');
      
      $doctrine = $this->getDoctrine();
      $repository = $doctrine->getManager()->getRepository('AppBundle:Message');
      $mp = $repository->selectlastmpuser($current_id);
   
      return $this->render('AppBundle:Message:message.php.twig',array('mp' =>$mp));

    }

    public function nonluAction($id)
    {
      $session =$this->get('session');
      $current_id = $session->get('id');
      $doctrine = $this->getDoctrine();
      $repository = $doctrine->getManager()->getRepository('AppBundle:Message');
      $allnonlu = $repository->messagenonlu($current_id,$id);
      $nombrenonlu = count($allnonlu);
      return $this->render('AppBundle:Message:msgnonlu.php.twig',array('nombrenonlu' =>$nombrenonlu));
        
    }

    public function one_messageAction(Request $request, $id,$offset,$max,$state)
    {
    
      $session =$this->get('session');
      $current_id = $session->get('id');
      $doctrine = $this->getDoctrine();
      $repositoryuser = $doctrine->getManager()->getRepository('AppBundle:User');
      $user = $repositoryuser->find($id);

      $repository = $doctrine->getManager()->getRepository('AppBundle:Message');
      $all_msg = $repository->select_all_msg($current_id,$id,$offset,$max);
      $all_mp = $repository->select_all_mp($current_id,$id);
      $nombremessages = count($all_mp);
      
      if($state == 1)
      {
        $check = $repository->selectLast($current_id,$id);
        $maxMp =$repository->selectUserByIdMsg($check[0]['idMsg']);
        if($maxMp->getIdRecever()== $current_id)
        {
           $update = $repository->updateState($current_id,$id);
        }
      }

    //inserer le message
    $message = new Message();
    $form = $this->createForm(MessageType::class, $message);
    $form->handleRequest($request);
      if($request->isMethod('post') && $form->isValid())
        {
          $em = $this->getDoctrine()->getManager();
          $msg = $form->getData();
          $newmsg = $msg->getContentMessage();
          $messages = new Message();
          $messages->setContentMessage($newmsg);
          $messages->setIdGroupMessage(0);
          $messages->setCreatedAt(new \DateTime());
          $em->persist($messages);
          $em->flush();
        
          $usermessage = new MemberMessage();
          $usermessage->setIdSender($current_id);
          $usermessage->setIdRecever($id);
          $usermessage->setStateMessage(0);
          $usermessage->setIdMsg($messages->getId());
          $em->persist($usermessage);
          $em->flush();

          return $this->redirectToRoute('one_message',array('id'=>$id,'max'=>$max,'offset'=>$offset,'state'=>0));
          
        }
  
      return $this->render('AppBundle:Message:one_message.php.twig',array('form'=> $form->createView(),'user'=>$user,'allmsg'=>$all_msg,'max'=>$max,'offset'=>$offset,'nombremessages'=>$nombremessages));
    }
}
