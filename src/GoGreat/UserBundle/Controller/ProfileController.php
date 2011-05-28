<?php

namespace GoGreat\UserBundle\Controller;

use Symfony\Component\Form;

use GoGreat\UserBundle\Form\UserType;
use GoGreat\BaseBundle\Controller\BaseController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProfileController extends BaseController
{
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