<?php

namespace GoGreat\CMSBaseBundle\Menu;

use Knplabs\Bundle\MenuBundle\Menu;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;
use Doctrine\ORM\EntityManager;

class MainMenu extends Menu
{
	/**
	 * @param Request	$request
	 * @param Router	$router
	 */
	public function __construct(Request $request, Router $router, EntityManager $em)
	{
		parent::__construct();

		$this->setCurrentUri($request->getRequestUri());

		$menuItems = $em	->getRepository('GoGreat\CMSBaseBundle\Entity\MenuItem')
							->findAll();
							
		foreach($menuItems as $item)
			$this->addChild($item->getTitle(), $router->generate($item->getRouting(), $item->getArguments()));
	}
}