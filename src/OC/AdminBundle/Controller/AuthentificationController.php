<?php
namespace OC\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse; 
use Symfony\Component\HttpFoundation\Request;

class AuthentificationController extends Controller{


public function indexAction(Request $request)
{
	//si la requete est en POST, l'administrateur soumit le formulaire
	if($request->isMethod('POST'))
	{
		//on genere le formulaire
		//si le login et le mot de passe sont correctes on passe à la page d'administration

		$request->getSession()->get('admin','admin');
        return $this->renderToRedirect('oc_admin_appoinment_view');
        //sinon on affiche une erreur   
	    $request->getSession()->getFlashBag('notice','Login et/ou mot de passes incorrectes');
	    return $this->render('OCAdminBundle:Authentification:index.html.twig');
	}
	
    //on affiche le formulaire d'authentification
	return $this->render('OCAdminBundle:Authentification:index.html.twig'); 

}


}