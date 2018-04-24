<?php
namespace OC\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse; 
use Symfony\Component\HttpFoundation\Request;

class PatientController extends Controller {

	 public function viewAction($page)
     {
     	if($page<1)
     	{
     	   throw new NotFoundHttpException("Page ".$page." inexistante");
     	}
      $listPatients = array(
         array('id' => 1,
               'name' => 'Dan',
               'address' => '1301 Kenmore Way',
               'sex' => 'male'),
         array('id' => 2,
               'name' => 'Pedro',
               'address' => '1440 27th Place',
               'sex' => 'male'),
         array('id' => 3,
               'name' => 'Damian',
               'address' => '908 River Lane',
               'sex' => 'male')
    
      );
     	return $this->render('OCAdminBundle:Patient:view.html.twig', array('listPatients' => $listPatients));
     }

    public function addAction(Request $request)
    {
    	//si le forumulaire est postulé
    	if($request->isMethod('POST'))
    	{
    		$request->getSession()->getFlashBag('notice','Le Patient est bien ajouté !');
    		return $this->redirectToRoute('oc_admin_patient_view');

    	}

        return $this->render('OCAdminBundle:Patient:add.html.twig');
    }

   public function  editAction(Request $request, $id)
   {
   	  if($request->isMethod('POST'))
   	    {
   	    	$request->getSession()->getFlashBag('Le Patient est bien modifiée !');
   	    	return $this->redirectToRoute('oc_admin_patient_view');
   	    }	

   	    return $this->render('OCAdminBundle:Patient:edit.html.twig');
   } 

   public function deleteAction($id)
   {
      $request->getSession()->getFlashBag('notice','Le Patient est bien supprimée');
      return $this->render('OCPlatformBundle:Patient:delete.html.twig');
   }

   public function undeleteAction($id)
   {
   	 return $this->render('OCPlatformBundle:Patient:undelete.html.twig');
   }

}