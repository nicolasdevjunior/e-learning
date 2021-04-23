<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Inscription;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class LoginController extends Controller
{
    public function indexAction(Request $request)
    {
    	$inscription = new inscription();
    	$vartmp ="";
    	
    	$form = $this->createFormBuilder()
				->add('email',EmailType::class)
				->add('password',PasswordType::class)
				->add('connexion',SubmitType::class)
				->getForm();
        $form->handleRequest($request);
        if($request->isMethod('post') && $form->isValid())
         {
        
           $data = $form->getData();
           $repository = $this->getDoctrine()->getRepository('AppBundle:Inscription');
    	     $user = $repository->findOneBy(array("email"=>$data["email"],'password'=>$data["password"]));
    	   //$user = $repository->findByNom("nicolas");
    	   return $this->redirect($this->generateUrl('profile_homepage',array('id' => $inscription->getId())));
         }
       return $this->render('AppBundle:Login:login.php.twig',array('form'=> $form->createView(),'err'=>$vartmp));
    }


    public function loginAction(Request $request)
    {
    	// Si le visiteur est déjà identifié, on le redirige vers l'accueil
    if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
      return $this->redirectToRoute('profile_homepage');
    }

    // Le service authentication_utils permet de récupérer le nom d'utilisateur
    // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
    // (mauvais mot de passe par exemple)
    $authenticationUtils = $this->get('security.authentication_utils');

    return $this->render('AppBundle:Connexion:connexion.php.twig', array(
      'last_username' => $authenticationUtils->getLastUsername(),
      'error'         => $authenticationUtils->getLastAuthenticationError(),
    ));
    }

    
}
