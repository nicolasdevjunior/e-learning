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

class ProfileController extends Controller
{


    public function indexAction(Request $request)
    {
        if(!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')){
          return $this->redirectToRoute('fos_user_security_login');
        }
    $session =$this->get('session');
    $success_update =""; 
    $message_tmp = "";
    $doctrine = $this->getDoctrine();
        //id user
    $userManager = $this->get('fos_user.user_manager');
    $user = $this->getUser()->getId();
        //var_dump($user); die;
    $session->set('id',$user);
        //var_dump($session->get('id')); die;
    $current_id = $session->get('id');

    $user = new User();
             /*formulaire*/
    $form = $this->createForm(UserType::class, $user);
    //verification dans la bdd
    $repository = $doctrine->getManager()->getRepository('AppBundle:User');
    $info = $repository->checkIfInformationIsUpdated($current_id);
    
    if($info['nom'] =="" || $info['prenom'] =="")
    {
        $success_update = 0;
        
        $form->handleRequest($request);
        if($request->isMethod('post') && $form->isValid())
        {
            $user = $form->getData();
            $repository = $doctrine->getManager()->getRepository('AppBundle:User');
            $info = $repository->updateInfo($current_id,$user->getNom(),$user->getPrenom(),$user->getJour(),$user->getMois(),$user->getAnnee(),$user->getLieuNaissance(),$user->getVille(),$user->getSex(),$user->getCategorie(),$user->getActivite());
            $success_update = 1;
            return $this->redirectToRoute('profile_homepage');
        } 
    }else
    {
            $success_update = 1;
    }
    $publications = $repository->selectPub($current_id);
   

    return $this->render('AppBundle:Profile:profile.php.twig',array('form'=> $form->createView(),'message_tmp'=>$message_tmp,'check_update'=>$success_update,'publications' =>$publications));

    //return $this->render('AppBundle:Profile:profile_sauv.php.twig',array('form'=> $form->createView(),'message_tmp'=>$message_tmp,'check_update'=>$success_update,'publications' =>$publications));
    }
 

     public function ifSomeoneWasLikedSomePubAction($idpub)
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
         return $this->render('AppBundle:Default:jaime.html.twig',array('pub' =>$pub,'likedOrNone' =>$likedOrNone));
    } 

    public function returnAjaxAction($id)
    {
        $session =$this->get('session');
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User');
            $ensembles = $repository->find($id);
        $nom='';
          if($nom == '')
         {
             $nom = $ensembles->getNom();
         }else
         {
             $nom = null;
         }
          $response = new JsonResponse();
          $response->setData(array('nom'=>$nom));
        
          return $response;
    }
      
}