<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\User;
use AppBundle\Entity\Publication;

use AppBundle\Form\UserType;
use AppBundle\Form\PublicationType;

class ProfileAmisController extends Controller
{


    public function indexAction(Request $request,$id)
    {
      $doctrine = $this->getDoctrine();
      $repository = $doctrine->getManager()->getRepository('AppBundle:User');
      $info = $repository->find($id);
      $repository = $doctrine->getManager()->getRepository('AppBundle:User');
      $publications = $repository->selectPub($id); 
      $page="profile_amis";
      return $this->render('AppBundle:Profile:profile_amis.php.twig',array('id'=>$id,'info'=>$info,'publications'=>$publications,'page'=>$page));
    }
  
     public function ifSomeoneWasLikedSomePubAmisAction($idpub,$idP,$page)
    {
        $session =$this->get('session');
        $userManager = $this->get('fos_user.user_manager');
        $user = $this->getUser()->getId();
        $session->set('id',$user);
        $current_id = $session->get('id');
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getManager()->getRepository('AppBundle:Jaime');
        $pub = $idpub;    
        $ifSomeoneWasLikedSomePub =$repository->checkIfPubIsLiked($current_id,$pub);
        if(!empty($ifSomeoneWasLikedSomePub))
        {
            $likedOrNone = 1;
        }else{
            $likedOrNone = 0;
        }
        //var_dump($pub); die;
         return $this->render('AppBundle:Default:jaimeAmis.html.twig',array('pub' =>$pub,'likedOrNone' =>$likedOrNone,'idP'=>$idP,'page'=>$page));
    }
      
}