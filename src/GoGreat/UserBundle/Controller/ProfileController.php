<?php

namespace GoGreat\UserBundle\Controller;

use Symfony\Component\Form;

use GoGreat\UserBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProfileController extends Controller
{
	/**
	 * @return GoGreat\UserBundle\Entity\User
	 */
	private function getLoggedInUser()
	{
		$user = ($this->get('security.context')->getToken()) ? $this->get('security.context')->getToken()->getUser() : null;
		if(!is_object($user))
			return null;
		
		return $this->get('doctrine.orm.entity_manager')
					->getRepository('GoGreat\UserBundle\Entity\User')
					->loadUserByUsername($user->getUsername());
	}

	public function showAction()
	{
		$user = $this->getLoggedInUser();

		return $this->render('UserBundle:Profile:show.html.twig', array(
			'user'		=> $user,
		));
	}

	public function editAction()
	{
		$user 		= $this->getLoggedInUser();
		$form 		= $this->get('form.factory')->create(new UserType());
		$form->setData($user);
		$request 	= $this->get('request');
		if ($request->getMethod() == 'POST') {
			$form->bindRequest($request);

			if ($form->isValid()) {
				$this->get('doctrine.orm.entity_manager')
					->getRepository('GoGreat\UserBundle\Entity\User')
					->persist($user);

				return $this->redirect($this->generateUrl('show_profile'));
			}
		}
	
		return $this->render('UserBundle:Profile:edit.html.twig', array(
				'form'		=> $form->createView(),
				'user'		=> $user,
		));
	}
}