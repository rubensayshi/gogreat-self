<?php

namespace GoGreat\UserBundle\Entity;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\EntityRepository;


/**
 * GoGreat\CMSBaseBundle\Entity\UserRepository
 */
class UserRepository extends EntityRepository implements UserProviderInterface
{
	public function loadUserByUsername($username)
	{
		return $this->findOneBy(array('username' => $username));
	}

	public function loadUser(UserInterface $user)
	{
		return $this->loadUserByUsername($user->getUsername());
	}

	function supportsClass($class)
	{
		return $class === $this->getClass();
	}
}