<?php
namespace OC\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse; 
use Symfony\Component\HttpFoundation\Request;

class DoctorController extends Controller {

     public function viewAction($page)
     {
     	if($page<1)
     	{
     	   throw new NotFoundHttpException("Page ".$page." inexistante");
     	}
      $listDoctors = array(
         array('id' => 1, 
                'name' => 'Mateo',
                'specialization' => 'Dentiste'),
         array('id' => 2,
               'name' => 'Jack',
               'specialization' => 'ophtamologue'),
         array('id' => 3,
               'name' => 'Paul',
               'specialization' => 'neurologue')

      ); 
     	return $this->render('OCAdminBundle:Doctor:view.html.twig', array('listDoctors' => $listDoctors));
     }

    public function addAction(Request $request)
    {
    	//si le forumulaire est postulé
    	if($request->isMethod('POST'))
    	{
    		$request->getSession()->getFlashBag('notice','Le Docteur est bien ajouté !');
    		return $this->redirectToRoute('oc_admin_doctor_view');

    	}

        return $this->render('OCAdminBundle:Doctor:add.html.twig');
    }

   public function  editAction(Request $request, $id)
   {
   	  if($request->isMethod('POST'))
   	    {
   	    	$request->getSession()->getFlashBag('Le Docteur est bien modifiée !');
   	    	return $this->redirectToRoute('oc_admin_doctor_view');
   	    }	

   	    return $this->render('OCAdminBundle:Doctor:edit.html.twig');
   } 

   public function deleteAction($id)
   {
      $request->getSession()->getFlashBag('notice','Le Docteur est bien supprimée');
      return $this->render('OCPlatformBundle:Doctor:delete.html.twig');
   }

   public function undeleteAction($id)
   {
   	 return $this->render('OCPlatformBundle:Doctor:undelete.html.twig');
   }

}