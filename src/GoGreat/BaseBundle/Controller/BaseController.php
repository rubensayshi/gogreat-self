<?php

namespace GoGreat\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{	
	/**
	 * @return Request
	 */
	protected function getRequest() { return $this->get('request'); }
	
	/**
	 * @return Doctrine\ORM\EntityManager
	 */
	protected function getEntityManager() { return $this->get('doctrine.orm.entity_manager'); }
	
	/**
	 * @return GoGreat\UserBundle\Entity\User
	 */
	protected function getLoggedInUser()
	{
		$user = ($this->get('security.context')->getToken()) ? $this->get('security.context')->getToken()->getUser() : null;
		if(!is_object($user))
			return null;
		
		return $this->get('doctrine.orm.entity_manager')
					->getRepository('GoGreat\UserBundle\Entity\User')
					->loadUserByUsername($user->getUsername());
	}
}
