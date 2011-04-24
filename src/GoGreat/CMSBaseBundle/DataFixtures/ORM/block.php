<?php

namespace GoGreat\CMSBaseBundle\DataFixtures\ORM;

use Symfony\Component\DependencyInjection\ContainerAware;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\ORM\EntityManager;
use	Doctrine\Common\DataFixtures\FixtureInterface;
use GoGreat\CMSBaseBundle\Entity;


class LoadCMSBasePageData extends ContainerAware implements FixtureInterface
{
	public function load($manager)
	{
		$menuCnt = 0;
		for($p = 0; $p < 10; $p++)
		{
			$page = new Entity\Page();
			$page->setTitle("lôrém tl #{$p}");
			$page->setContent("lorem tl ipsum #{$p}");

			$manager->persist($page);	
			
			if(round(mt_rand(0, 1)) && $menuCnt < 3)
			{
				$item = new Entity\MenuItem();
				$item->setTitle($page->getTitle());
				$item->setRouting('page');
				$item->setArguments(array('slug' => $page->getSlug()));
				$item->setIdentifier($page->getMenuIdentifier());
	
				$manager->getRepository('GoGreat\CMSBaseBundle\Entity\MenuItem')->persist($item);
				$menuCnt++;
			}
					
		}

		$manager->flush();
	}
}


$loader = new Loader();
$loader->addFixture(new LoadCMSBasePageData);