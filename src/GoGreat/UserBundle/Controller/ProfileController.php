<?php

namespace GoGreat\UserBundle\Controller;

use GoGreat\UserBundle\Form\EditProfileForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProfileController extends Controller
{
	/**
	 * @throws NotFoundHttpException
	 * @return GoGreat\UserBundle\Entity\User
	 */
	private function getLoggedInUser()
	{
		$user = ($this->get('security.context')->getToken()) ? $this->get('security.context')->getToken()->getUser() : null;
		$user = (is_object($user) ? $user : null);
		
		if(!$user)
			throw new NotFoundHttpException('No valid user login found.');
			
		return $user;
	}
	
	public function showAction()
	{				
		$user = $this->getLoggedInUser();
		
		return $this->render('UserBundle:Profile:show.html.php', array(
			'user'		=> $user,
		));
	}
	
	public function editAction()
	{	
        $user = $this->getLoggedInUser();
		
		$form = EditProfileForm::create($this->get('form.context'), 'form_profile_edit');
		$form->bind($this->get('request'), $user);
		
		if ($form->isValid()) 
		{			
			$this->get('doctrine.orm.entity_manager')
        			->getRepository('GoGreat\UserBundle\Entity\User')
        			->persist($user);
		}

		return $this->render('UserBundle:Profile:edit.html.php', array(
			'form'		=> $form,
			'user'		=> $user,
		));
	}
}