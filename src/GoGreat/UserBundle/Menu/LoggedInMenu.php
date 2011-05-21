<?php

namespace GoGreat\UserBundle\Menu;

use Knplabs\Bundle\MenuBundle\Menu;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;
use Doctrine\ORM\EntityManager;

class LoggedInMenu extends Menu
{
	/**
	 * @param Request	$request
	 * @param Router	$router
	 */
	public function __construct(Request $request, Router $router, EntityManager $em)
	{
		parent::__construct();

		$this->setCurrentUri($request->getRequestUri());

		$this->addChild('Logout', $router->generate('_security_logout'));
		$cp = $this->addChild('Control Panel', $router->generate('controlpanel'));
		$cp->addChild('My Profile', $router->generate('show_profile'));
		$cp->addChild('Edit Profile', $router->generate('edit_profile'));
		$cp->addChild('New Site', $router->generate('new_site_wizard'));
	}
}