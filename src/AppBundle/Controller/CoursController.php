<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Cours;
use AppBundle\Form\CoursType;

class CoursController extends Controller
{
    public function indexAction(Request $request)
    {
       $cours = new Cours();
       $session =$this->get('session');
       $userManager = $this->get('fos_user.user_manager');
       $user = $this->getUser()->getId();
             /*formulaire*/
       $form = $this->createForm(CoursType::class, $cours);
        if($request->isMethod('post'))
        {
            $form->handleRequest($request);
            $donnee = $form->getData();
            $cours->setTitre($donnee->getTitre());
            $cours->setContent($donnee->getContent());
            $cours->setFichier($donnee->getFichier());
            $cours->setType($donnee->getType());
            $cours->setIdUser($user);
            $cours->setDate(new \Datetime());

        	// Ici : On traite manuellement le fichier uploadé
        
            $cours->getFichier();
            $cours->upload();
            $em = $this->getDoctrine()->getManager();
			$em->persist($cours);
            $em->flush();
        	return $this->redirectToRoute('cours');
        }
       return $this->render('AppBundle:Cours:cours.php.twig',array('form'=> $form->createView()));
    }

   
    public function sendAction(Request $request)
    {
      $cours = new Cours();
      $session =$this->get('session');
      $userManager = $this->get('fos_user.user_manager');
      $user = $this->getUser()->getId();
      $form = $this->createForm(CoursType::class, $cours);
          if($request->isXmlHttpRequest())
          {
            $form->handleRequest($request);
            $donnee = $form->getData();

            // $titre = $request->get('titre');
            // $type = $request->get('type');
            // $fichier = $request->get('fichier');
            // $content = $request->get('content');
            $cours->setTitre($donnee->getTitre());
            $cours->setContent($donnee->getContent());
            $cours->setFichier($donnee->getFichier());
            $cours->setType($donnee->getType());
            $cours->setIdUser($user);
            $cours->setDate(new \Datetime());
          // Ici : On traite manuellement le fichier uploadé
            $cours->getFichier();
            $cours->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($cours);
            $em->flush();
          //donnee
            $titre = $cours->getTitre();
            $content = $cours->getContent();
            $fichier = $cours->getFichier();
            $type = $cours->getType();
            $date = $cours->getDate();
            $response = new JsonResponse();
            $response->setData(array('titre'=>$titre,'content'=>$content,'fichier'=>$fichier,'type'=>$type,'date'=>$date));
                
            return $response; 
          }
    }
    
}
