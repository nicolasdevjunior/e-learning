<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Projet;
use AppBundle\Entity\Avis;

class ProjetController extends Controller
{

    public function indexAction(Request $request)
    {
        $session =$this->get('session');
        $current_id = $session->get('id');
        $repository = $this->getDoctrine()->getRepository('AppBundle:Projet');
		$allproject = $repository->findAll();
       return $this->render('AppBundle:Projet:projet.php.twig',array('all_project'=>$allproject));
    }
    

    public function projectAction(Request $request,$id)
    {
        $session =$this->get('session');
        $current_id = $session->get('id');
        $lim =5;
        $offset = 0;
        $repository = $this->getDoctrine()->getRepository('AppBundle:Projet');
        $avis = $this->getDoctrine()->getRepository('AppBundle:Avis');
        $infoprojet = $repository->find($id);
        $allavis = $avis->findBy(array('idProjet' =>$id),array('dateAvis' => 'desc'),$lim,$offset);
        $all = $avis->findBy(array('idProjet' =>$id));
       // $offset = $offset + 5;
        $count = count($all);
        return $this->render('AppBundle:Projet:infoprojet.php.twig',array('infoprojet'=>$infoprojet,'avis'=>$allavis,'count'=>$count,'offset'=>$offset));
    }


    public function plusAvisAction(Request $request,$id,$lim,$offset)
    {
        $session =$this->get('session');
        $current_id = $session->get('id');
        $repository = $this->getDoctrine()->getRepository('AppBundle:Projet');
        $avis = $this->getDoctrine()->getRepository('AppBundle:Avis');
        $infoprojet = $repository->find($id);
        $allavis = $avis->findBy(array('idProjet' =>$id),array('dateAvis' => 'desc'),$lim,$offset);
        $all = $avis->findBy(array('idProjet' =>$id));
        $count = count($all);
        return $this->render('AppBundle:Projet:infoprojet.php.twig',array('infoprojet'=>$infoprojet,'avis'=>$allavis,'count'=>$count,'offset'=>$offset));
    }
    

    public function moinsAvisAction(Request $request,$id,$lim,$offset)
    {
        $session =$this->get('session');
        $current_id = $session->get('id');
        $repository = $this->getDoctrine()->getRepository('AppBundle:Projet');
        $avis = $this->getDoctrine()->getRepository('AppBundle:Avis');
        $infoprojet = $repository->find($id);
        $allavis = $avis->findBy(array('idProjet' =>$id),array('dateAvis' => 'desc'),$lim,$offset);
        $all = $avis->findBy(array('idProjet' =>$id));
        $count = count($all);
        return $this->render('AppBundle:Projet:infoprojet.php.twig',array('infoprojet'=>$infoprojet,'avis'=>$allavis,'count'=>$count,'offset'=>$offset));
    }


    public function createAction(Request $request)
    {
    	$session =$this->get('session');
        $userManager = $this->get('fos_user.user_manager');
        $current_id =$this->getUser()->getId();
        $nom = $this->getUser()->getNom();
        $prenom = $this->getUser()->getPrenom();
        $nomFondateur = $nom." ".$prenom;

        if($request->isXmlHttpRequest()) {
        	$nomprojet = $request->get('nomprojet');
        	$descriptionprojet = $request->get('descriptionprojet');
        	$datelimite = $request->get('datelimite');
        	$datestring = str_replace("/","-",$datelimite);
        	$datelimite = strtotime($datestring);
        	$datelimite = new \Datetime($datestring);
        	$date = new \Datetime($request->get('now'));
            $duree=date_diff($datelimite,$date,true);
            $duree = $duree->days;      

        	$projet = new Projet();
        	$projet->setNomProjet($nomprojet);
        	$projet->setDateLimite($datelimite);
        	$projet->setDescription($descriptionprojet);
        	$projet->setFondateur($current_id);
        	$projet->setNomFondateur($nomFondateur);
        	$projet->setDateDebut($date);
        	$projet->setDuree($duree);

        	$em = $this->getDoctrine()->getManager();
            $em->persist($projet);
            $em->flush();
            
            $nom = $projet->getNomProjet();
            $fondateur = $projet->getFondateur();
            $id = $projet->getId();
            $response = new JsonResponse();
            $response->setData(array('nom'=>$nom,'fondateur'=>$fondateur,'id'=>$id));
            return $response;
        }
    }	

    public function avisAction(Request $request)
    {
    	$session =$this->get('session');
        $userManager = $this->get('fos_user.user_manager');
        $current_id =$this->getUser()->getId();
        $nom = $this->getUser()->getNom();
        $prenom = $this->getUser()->getPrenom();
        $nomUser = $nom." ".$prenom;

        if($request->isXmlHttpRequest()) {
        	$content = $request->get('content');
        	$idProjet = $request->get('idProjet');
        	$date  =  new \Datetime($request->get('now'));
        	$avis = new Avis();
        	$avis->setIdUser($current_id);
        	$avis->setNomUser($nomUser);
        	$avis->setAvis($content);
        	$avis->setDateAvis($date);
        	$avis->setIdProjet($idProjet);

        	$em = $this->getDoctrine()->getManager();
            $em->persist($avis);
            $em->flush();

            $current_id = $avis->getIdUser();
        	$nomUser = $avis->getNomUser();
        	$content = $avis->getAvis();
        	$idProjet = $avis->getIdProjet();
        	$date = $avis->getDateAvis();
        	$response = new JsonResponse();
            $response->setData(array('id'=>$current_id,'nomUser'=>$nomUser,'idProjet'=>$idProjet,'date'=>$date,'content'=>$content));
            return $response;
        }
    }


    
}
