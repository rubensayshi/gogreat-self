<?php

namespace GoGreat\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends Controller
{
	/**
	 * @return Symfony\Component\HttpFoundation\Request
	 */
	protected function getRequest() { return $this->get('request'); }
	
	public function loginAction()
	{		
		// get the error if any (works with forward and redirect -- see below)
		if ($this->getRequest()->attributes->has(SecurityContext::AUTHENTICATION_ERROR))
		{
			$error = $this->getRequest()->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
		} 
		else 
		{
			$error = $this->getRequest()->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
		}

		return $this->render('UserBundle:Security:login.html.twig', array(
            'last_username' => $this->getRequest()->getSession()->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
		));
	}
}
