<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\User;
use AppBundle\Entity\Publication;

class PublicationController extends Controller
{
    public function indexAction(Request $request)
    {
       $session =$this->get('session');
       $current_id = $session->get('id'); 
       $em = $this->getDoctrine()->getEntityManager();
        $repository = $this
            ->getDoctrine()
            ->getManager() 
            ->getRepository('AppBundle:User');
        $user = $repository->find($current_id);
            if($request->isXmlHttpRequest()) {
                $content = '';
                $content = $request->get('id');
                $newcreated_at = $request->get('created_at');
                $publication = new Publication();
                $publication->setIdUser($current_id);
                $publication->setIdUserProrietaire($current_id);
                $publication->setJaime(0);
                $publication->setCommentaires(0);
                $publication->setContent($content);
                $publication->setCreated_at(new \DateTime($newcreated_at));
                $em = $this->getDoctrine()->getManager();
                $em->persist($publication);
                $em->flush();
                $nom = $user->getNom();
                $prenom = $user->getPrenom();
                $idNewPub = $publication->getId();
                $created_at = $publication->getCreated_at();
                $response = new JsonResponse();
                $response->setData(array('nom'=>$nom,'prenom'=>$prenom,'content'=>$content,'idPubNew'=>$idNewPub,'created_at'=>$created_at));
                return $response; 
            }
    }

    public function publierSurMurAmisAction(Request $request)
    {
       $session =$this->get('session');
       $current_id = $session->get('id'); 
       $em = $this->getDoctrine()->getEntityManager();
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User');
        $user = $repository->find($current_id);
            if($request->isXmlHttpRequest()) {
                $content = '';
                $content = $request->get('id');
                $idPrioritaire = $request->get('idProrietaire');
                $newcreated_at = $request->get('created_at');
                $publication = new Publication();
                $publication->setIdUser($current_id);
                $publication->setIdUserProrietaire($idPrioritaire);
                $publication->setJaime(0);
                $publication->setCommentaires(0);
                $publication->setContent($content);
                $publication->setCreated_at(new \DateTime($newcreated_at));
            $em = $this->getDoctrine()->getManager();
            $em->persist($publication);
            $em->flush();
                $nom = $user->getNom();
                $prenom = $user->getPrenom();
                $idNewPub = $publication->getId();
                $created_at = $publication->getCreated_at();
                $response = new JsonResponse();
                $response->setData(array('nom'=>$nom,'prenom'=>$prenom,'content'=>$content,'idPubNew'=>$idNewPub,'created_at'=>$created_at));
                return $response; 
            }
    }

    public function affichePubAction($idPub)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Publication');
        $pub = $repository->selectPubById($idPub);
        $page="publication";
        return $this->render('AppBundle:Publication:publication.php.twig',array('pub'=>$pub,'page'=>$page));
    }
}
