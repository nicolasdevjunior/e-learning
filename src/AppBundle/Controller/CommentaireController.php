<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;
use AppBundle\Entity\Publication;
use AppBundle\Entity\Jaime;
use AppBundle\Entity\Commentaire;

use AppBundle\Form\CommentaireType;

class CommentaireController extends Controller
{
    public function indexAction(Request $request, $idcoms)
    {
        
    $doctrine = $this->getDoctrine();
    $session =$this->get('session');
    $current_id = $session->get('id');    
    
    //publication
    $commentaire = new Commentaire();
    $formCommentaire = $this->createForm(CommentaireType::class, $commentaire);
    $formCommentaire->handleRequest($request);
        if($request->isMethod('post') && $formCommentaire->isValid())
        {
            $pub = $formCommentaire->getData();
            $pub->setIdUser($current_id);
            $pub->setIdPublication($idcoms);
            $pub->setCreatedAt(new \DateTime(null));
            $em = $this->getDoctrine()->getManager();
            $em->persist($pub);
            $em->flush();
            return $this->redirectToRoute('profile_homepage');
        }

    $repository = $doctrine->getManager()->getRepository('AppBundle:Publication');
    $commentaires = $repository->find($idcoms);

    return $this->render('AppBundle:Commentaire:commentaire.php.twig',array('formCommentaire'=> $formCommentaire->createView(),'pub' =>$commentaires));
    }

}
