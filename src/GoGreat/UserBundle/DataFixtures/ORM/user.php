<?php

namespace GoGreat\UserBundle\DataFixtures\ORM;

use Symfony\Component\DependencyInjection\ContainerAware;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use GoGreat\UserBundle\Entity\User;

class LoadUserData extends ContainerAware implements FixtureInterface
{
	protected $users = array(
		array(
			'username'	=> 'ruben',
			'password'	=> 'ruben',
			'email'		=> 'rubensayshi@gmail.com',
			'roles'		=> array(),
		),
	);
	
	public function load($manager)
	{		
		foreach($this->users as $data)
		{		
			$user = new User();
			$user->setUsername($data['username']);
			$user->setPassword($data['password']);
			$user->setEmail($data['email']);
			//$user->setRoles($data['roles']);

			$manager->getRepository('GoGreat\UserBundle\Entity\User')->persist($user);
		}

		$manager->flush();
	}
}


$loader = new Loader();
$loader->addFixture(new LoadUserData);