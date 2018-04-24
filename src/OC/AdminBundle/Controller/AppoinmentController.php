<?php
namespace OC\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse; 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AppoinmentController extends Controller {
    

    public function viewAction($page)
     {
     	if($page<1)
     	{
     	   throw new NotFoundHttpException("Page ".$page." inexistante");
     	}
      $listAppoinments = array(
             array(
                'id' => 1,
                'patientName' => 'Damian',
                'doctorName'  => 'eateaaz',
                'time' => '18H:30',
                'date' => 'Thursday 10/03/2018'
             ),
             array(
                'id' => 2,
                'patientName' => 'Jack',
                'doctorName'  => 'teerzez',
                'time' => '10H:00',
                'date' => 'Monday 11/08/2018'
             ),
             array(
                'id' => 3,
                'patientName' => 'Mateo',
                'doctorName'  => 'kjazaez',
                'time' => '11H:30',
                'date' => 'Friday 17/05/2007'
             )


      );
     	return $this->render('OCAdminBundle:Appoinment:view.html.twig', array('listAppoinments' => $listAppoinments));
     }

    public function addAction(Request $request)
    {
    	//si le forumulaire est postulé
    	if($request->isMethod('POST'))
    	{
    		$request->getSession()->getFlashBag('notice','Le Rendez-vous est bien ajouté !');
    		return $this->redirectToRoute('oc_admin_appoinment_view');

    	}

        return $this->render('OCAdminBundle:Appoinment:add.html.twig');
    }

   public function  editAction(Request $request, $id)
   {
   	  if($request->isMethod('POST'))
   	    {
   	    	$request->getSession()->getFlashBag('Le Rendez-vous est bien modifiée !');
   	    	return $this->redirectToRoute('oc_admin_appoinment_view');
   	    }	

   	    return $this->render('OCAdminBundle:Appoinment:edit.html.twig');
   } 

   public function deleteAction(Request $request, $id)
   {
      $request->getSession()->getFlashBag('notice','Le Rendez-vous est bien supprimée');
      return $this->render('OCAdminBundle:Appoinment:delete.html.twig');
   }

   public function undeleteAction($id)
   {
   	 return $this->render('OCAdminBundle:Appoinment:undelete.html.twig');
   }
}