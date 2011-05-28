<?php

namespace GoGreat\UserBundle\Controller;

use GoGreat\BaseBundle\Controller\BaseController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ControlPanelController extends BaseController
{	
	public function indexAction()
	{    	    	
		$user = $this->getLoggedInUser();
		
    	if(!$user)
			throw new NotFoundHttpException('No valid user login found.');	
		
        return $this->render('UserBundle:ControlPanel:index.html.twig', array(
        	'user'		=> $user,
        ));
	}
}
