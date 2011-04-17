<?php

namespace GoGreat\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ControlPanelController extends Controller
{
	/**
	 * @return GoGreat\UserBundle\Entity\User
	 */
	private function getLoggedInUser()
	{    
		$user = ($this->get('security.context')->getToken()) ? $this->get('security.context')->getToken()->getUser() : null;
    	$user = (is_object($user) ? $user : null);
    	
		return $user;
	}
	
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
