<?php

namespace GoGreat\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ControlPanelController extends Controller
{
	/**
	 * @throws NotFoundHttpException
	 * @return GoGreat\UserBundle\Entity\User
	 */
	private function getUser()
	{
    	$user = ($this->get('security.context')->getToken()) ? $this->get('security.context')->getToken()->getUser() : null;
    	$user = (is_object($user) ? $user : null);
    	
    	if(!$user)
			throw new NotFoundHttpException('No valid user login found.');
    		
    	return $user;
	}
	
	public function indexAction()
	{    	    	
        return $this->render('UserBundle:ControlPanel:index.html.php', array(
        	'user'		=> $this->getUser(),
        ));
	}
}
